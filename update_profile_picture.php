<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: index.php");
    exit();
}

$adminId = $_SESSION["admin_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "uploads/";  // Specify your upload directory
    $uploadFile = $uploadDir . basename($_FILES["profilePicture"]["name"]);

    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $uploadFile)) {
        $query = "UPDATE admin SET foto='$uploadFile' WHERE id_admin=$adminId";
        $result = $conn->query($query);

        if ($result) {
            header("Location: admin.php"); // Redirect to the admin dashboard after successful update
            exit();
        } else {
            echo "Error updating profile picture.";
        }
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>
