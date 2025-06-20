<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $line = $username . "|" . $password . "\n";
    file_put_contents("users.txt", $line, FILE_APPEND);
    echo "დარეგისტრირდით წარმატებით!";
}
?>

<form method="post" action="">
    <label>მომხმარებელი:</label>
    <input type="text" name="username" required>
    <label>პაროლი:</label>
    <input type="password" name="password" required>
    <button type="submit">რეგისტრაცია</button>
</form>
<a href="login.php">შესვლა</a>
