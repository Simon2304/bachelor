<?php
session_start();

$target_dir = "../../../../uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir . $_SESSION['userfname'] . "-" . rand(10,100) . "." . $imageFileType;

// Check if file already exists
if (file_exists($target_file)) {
    echo json_encode(['error' => 1, 'message' => 'Sorry, die bestandsnaam bestaat al. Mijn fout, probeer het opnieuw.']);
    return;
}

// Check file size
if ($_FILES["file"]["size"] > 500000) {
    echo json_encode(['error' => 1, 'message' => 'That\'s to big (that is what she said).']);
    return;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo json_encode(['error' => 1, 'message' => 'Dat is geen foto, of wel dan? Graag JPG, JPEG, PNG of GIF uploaden.']);
    return;
}

// Upload the file
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo json_encode(['success' => 1, 'message' => "The file ". basename( $_FILES["file"]["name"]). " has been uploaded."]);
    return;
}

echo json_encode(['error' => 1, 'message' => "Sorry, there was an error uploading your file."]);
return;
