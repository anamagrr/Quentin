<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameToDelete = trim($_POST["username"]);
    $lines = file("users.txt", FILE_IGNORE_NEW_LINES);
    $newLines = [];

    foreach ($lines as $line) {
        if (strpos($line, $usernameToDelete . "|") !== 0) {
            $newLines[] = $line;
        }
    }

    file_put_contents("users.txt", implode("\n", $newLines) . "\n");
    echo "მომხმარებელი წაიშალა.";
}
?>

<form method="post" action="">
    <label>წასაშლელი მომხმარებელი:</label>
    <input type="text" name="username" required>
    <button type="submit">წაშლა</button>
</form>
