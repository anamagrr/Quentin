<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $uploadDir = "uploads/";
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetPath)) {
        $log = "ატვირთა: " . $fileName . " - კომენტარი: " . $_POST["comment"] . "\n";
        file_put_contents("upload_log.txt", $log, FILE_APPEND);
        echo "ფაილი აიტვირთა წარმატებით!";
    } else {
        echo "შეცდომა ფაილის ატვირთვისას.";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" required>
    <input type="text" name="comment" placeholder="კომენტარი">
    <button type="submit">ატვირთე</button>
</form>
