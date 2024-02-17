<?php
require_once "koneksi.php";

$notification = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $photoName = $_POST['photoName'];
        $photoDeskripsi = $_POST['photoDeskripsi'];

        $fileName = '';
        if (isset($_FILES['photoFile']) && $_FILES['photoFile']['error'] === UPLOAD_ERR_OK) {
            $photoFile = $_FILES['photoFile'];
            $fileName = $photoFile['name'];
            $tmpName = $photoFile['tmp_name'];
            $fileType = $photoFile['type'];

            $allowedTypes = array("image/jpeg", "image/jpg", "image/png");

            if (!in_array($fileType, $allowedTypes)) {
                $notification = "Jenis file tidak didukung. Hanya file JPEG, JPG, dan PNG yang diizinkan.";
            } else {
                $uploadDir = "uploads/";

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $uploadPath = $uploadDir . $fileName;

                if (move_uploaded_file($tmpName, $uploadPath)) {
                    $query = "INSERT INTO struktur (nama, file, jabatan) VALUES ('$photoName', '$uploadPath', '$photoDeskripsi')";
                    $result = $conn->query($query);

                    if ($result) {
                        $notification = "Data berhasil ditambahkan";
                        echo "<script>
                                setTimeout(function() {
                                    window.location.href = 'crud_struktur.php'; // Redirect after 3 seconds
                                }, 1000);
                              </script>";
                    } else {
                        $notification = "Gagal menambahkan data: " . $conn->error;
                    }
                } else {
                    $notification = "Gagal mengunggah file.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Struktur</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    header {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 1em 0;
    }

    main {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 8px;
    }

    input {
        padding: 8px;
        margin-bottom: 16px;
    }

    #photoDeskripsi {
        height: 100px;
        resize: vertical;
        padding: 8px;
        margin-bottom: 16px;
    }

    button {
        padding: 10px;
        background-color: #333;
        color: white;
        border: none;
        cursor: pointer;
    }

    footer {
        text-align: center;
        padding: 1em 0;
        background-color: #333;
        color: white;
    }
    </style>
</head>

<body>
    <header>
        <h1>Tambah Struktur</h1>
    </header>
    <main>
        <?php if (!empty($notification)) : ?>
        <div style="color: green; margin-bottom: 10px;"><?php echo $notification; ?></div>
        <?php endif; ?>
        <form id="photoForm" action="" method="post" enctype="multipart/form-data">
            <label for="photoName">Nama:</label>
            <input type="text" id="photoName" name="photoName">

            <label for="photoFile">Foto:</label>
            <input type="file" id="photoFile" name="photoFile" accept=".jpg, .jpeg, .png">
            <label for="photoDeskripsi">Jabatan:</label>
            <textarea id="photoDeskripsi" name="photoDeskripsi"></textarea>

            <button type="submit" name="action" value="add">Tambah Struktur</button>
            <a href="admin.php" class="kembali">Kembali</a>
        </form>
    </main>

</body>

</html>