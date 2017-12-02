<?php

include_once('./database.php');

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Fail on pilt - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Ainult pildi failid on lubatud.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sama nimega pilt on juba olemas.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["img"]["size"] > 5000000) {
    echo "Pildi fail on liiga suur.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Pildid võivad ainult olla JPG, JPEG, PNG & GIF formaatides.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  die();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "<meta http-equiv='refresh' content='0; url=success.php' />";
    } else {
        echo "Tekkis viga.";
        die();
    }
}


$file = $target_dir . $_FILES["img"]["name"];

$stmt = $conn->prepare("INSERT INTO canvas_img (`text_value`, `textX`, `textY`, `canvas_text_size`, `img_file`) VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param('sddds', $_POST['canvas-textValue'], $_POST['canvas-textX'], $_POST['canvas-textY'], $_POST['canvas-canvas_text_size'], $file);

/* execute prepared statement */
$stmt->execute();

/* close statement and connection */
$stmt->close();

/* close connection */
$conn->close();


?>