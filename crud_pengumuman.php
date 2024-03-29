<?php
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM pengumuman WHERE id_pengumuman='$id'";
    $result = $conn->query($query);

    if ($result) {
        echo "Data berhasil dihapus";
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'add') {
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
                    echo "Jenis file tidak didukung. Hanya file JPEG, JPG, PNG, dan PDF yang diizinkan.";
                    exit;
                }

                $uploadDir = "uploads/";

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $uploadPath = $uploadDir . $fileName;

                if (!move_uploaded_file($tmpName, $uploadPath)) {
                    echo "Gagal mengunggah file.";
                    exit;
                }
            }
            $query = "INSERT INTO pengumuman (judul, deskripsi, foto, tanggal) VALUES ('$judul', '$deskripsi', '$uploadPath', '$tanggal')";
            $result = $conn->query($query);

            if ($result) {
                echo "Data berhasil ditambahkan";
            } else {
                echo "Gagal menambahkan data: " . $conn->error;
            }
        } elseif ($action === 'edit') {
            $id_pengumuman = $_POST['id_pengumuman'];
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
                    echo "Jenis file tidak didukung. Hanya file JPEG, JPG, PNG, dan PDF yang diizinkan.";
                    exit;
                }

                $uploadDir = "uploads/";

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $uploadPath = $uploadDir . $fileName;

                if (!move_uploaded_file($tmpName, $uploadPath)) {
                    echo "Gagal mengunggah file.";
                    exit;
                }
            }
            $query = "UPDATE pengumuman SET judul='$judul', deskripsi='$deskripsi', foto='$uploadPath', tanggal='$tanggal' WHERE id_pengumuman='$id_pengumuman'";
            $result = $conn->query($query);

            if ($result) {
                echo "Data berhasil diperbarui";
            } else {
                echo "Gagal memperbarui data: " . $conn->error;
            }
        }
    }
}

$query = "SELECT * FROM pengumuman";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pengumuman</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="templatetabel/css/style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>

<body>
    <header>
        <h1>PENGUMUMAN</h1>
    </header>
    <main>
        <div class="button-container">
            <a href="add_pengumuman.php" class="to-button">Tambah Pengumuman</a>
            <a href="admin.php" class="back-button">Kembali</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table id="example" class="table table-striped nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rowNumber = 1;

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $rowNumber++ . "</td>";
                                echo "<td>" . $row['judul'] . "</td>";
                                echo "<td style='border-right: 1px solid #000;'>";


                                if (pathinfo($row['foto'], PATHINFO_EXTENSION) === 'pdf') {
                                    echo "<img src='images/pdf.png' alt='PDF' style='max-width: 100px; max-height: 100px;'>";
                                } else {
                                    echo "<img src='" . $row['foto'] . "' alt='Foto' style='max-width: 100px; max-height: 100px;'>";
                                }

                                echo "</td>";
                                echo "<td style='border-right: 1px solid #000;'>" . $row['deskripsi'] . "</td>";
                                echo "<td style='border-right: 1px solid #000;'>" . $row['tanggal'] . "</td>";
                                echo "<td>
                      <a class='to-button' href='?action=edit&id=" . $row['id_pengumuman'] . "'>Edit</a>
                      <a class='back-button' href='?action=delete&id=" . $row['id_pengumuman'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                  </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script>
    new DataTable('#example', {
        responsive: true
    });
</script>

</html>