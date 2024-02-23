<?php
require_once "koneksi.php";

$notification = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = $_POST['tanggal'];

        $fileName = '';
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto = $_FILES['foto'];
            $fileName = $foto['name'];
            $tmpName = $foto['tmp_name'];
            $fileType = $foto['type'];

            $allowedTypes = array("image/jpeg", "image/jpg", "image/png", "application/pdf");

            if (!in_array($fileType, $allowedTypes)) {
                $notification = "Jenis file tidak didukung. Hanya file JPEG, JPG, PNG, atau PDF yang diizinkan.";
            } else {
                $uploadDir = "uploads/";

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $uploadPath = $uploadDir . $fileName;

                if (move_uploaded_file($tmpName, $uploadPath)) {
                    $query = "INSERT INTO kegiatan (id_kegiatan, judul, deskripsi, foto, tanggal) VALUES (NULL, '$judul', '$deskripsi', '$uploadPath', '$tanggal')";

                    $result = $conn->query($query);

                    if ($result) {
                        $notification = "Data berhasil ditambahkan";
                        echo "<script>
                                setTimeout(function() {
                                    window.location.href = 'crud_kegiatan.php'; // Redirect after 3 seconds
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
    <title>Tambah Pengumuman</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

        #deskripsi {
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

        .kembali {
            padding: 10px;
            background-color: #808080;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            margin-top: 6px;
        }
    </style>
    <script>
        $(function() {
            $("#tanggal").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
</head>

<body>
    <header>
        <h1>Tambah Kegiatan</h1>
    </header>
    <main>
        <?php if (!empty($notification)) : ?>
            <div style="color: green; margin-bottom: 10px;"><?php echo $notification; ?></div>
        <?php endif; ?>
        <form id="pengumumanForm" action="" method="post" enctype="multipart/form-data">
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul">

            <label for="foto">Foto / pdf:</label>
            <input type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png, .pdf">


            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi"></textarea>

            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" required>

            <button type="submit" name="action" value="add">Tambah Kegiatan</button>
            <a href="admin.php" class="kembali">Kembali</a>
        </form>
    </main>
</body>

</html>