<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>

<h2>მოგესალმებით, <?= htmlspecialchars($_SESSION["username"]) ?></h2>
<p>ბოლო ვიზიტი: <?= $_COOKIE["lastLogin"] ?? "უცნობია" ?></p>

<ul>
    <li><a href="upload.php">ფაილის ატვირთვა</a></li>
    <li><a href="delete.php">მომხმარებლის წაშლა</a></li>
    <li><a href="logout.php">გასვლა</a></li>
</ul>
