<?php

include_once('./database.php');

$target_dir = "img/";
$path_parts = pathinfo($_FILES["img"]["name"]);
$target_file = $target_dir . $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Fail on pilt - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<meta http-equiv='refresh' content='0; url=error' />";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<meta http-equiv='refresh' content='0; url=error' />";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["img"]["size"] > 5000000) {
    echo "<meta http-equiv='refresh' content='0; url=error' />";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<meta http-equiv='refresh' content='0; url=error' />";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  die();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "<meta http-equiv='refresh' content='0; url=success' />";
    } else {
        echo "<meta http-equiv='refresh' content='0; url=error' />";
        die();
    }
}


$stmt = $conn->prepare("INSERT INTO canvas_img (`text_value`, `textX`, `textY`, `canvas_text_size`, `img_file`) VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param('sddds', $_POST['canvas-textValue'], $_POST['canvas-textX'], $_POST['canvas-textY'], $_POST['canvas-canvas_text_size'], $target_file);

/* execute prepared statement */
$stmt->execute();

/* close statement and connection */
$stmt->close();

/* close connection */
$conn->close();


?>