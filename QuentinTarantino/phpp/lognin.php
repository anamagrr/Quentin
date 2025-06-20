<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUser = trim($_POST["username"]);
    $inputPass = $_POST["password"];

    $lines = file("users.txt", FILE_IGNORE_NEW_LINES);

    foreach ($lines as $line) {
        list($user, $passHash) = explode("|", $line);
        if ($user == $inputUser && password_verify($inputPass, $passHash)) {
            $_SESSION["username"] = $user;
            setcookie("lastLogin", date("Y-m-d H:i:s"), time() + 3600);
            header("Location: dashboard.php");
            exit;
        }
    }
    echo "შეცდომა ავტორიზაციაში";
}
?>

<form method="post" action="">
    <label>მომხმარებელი:</label>
    <input type="text" name="username" required>
    <label>პაროლი:</label>
    <input type="password" name="password" required>
    <button type="submit">შესვლა</button>
</form>
<a href="registration.php">რეგისტრაცია</a>
