<?php
require_once "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM kegiatan WHERE id_kegiatan='$id'";
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
            $query = "INSERT INTO kegiatan (judul, deskripsi, foto, tanggal) VALUES ('$judul', '$deskripsi', '$uploadPath', '$tanggal')";
            $result = $conn->query($query);

            if ($result) {
                echo "Data berhasil ditambahkan";
            } else {
                echo "Gagal menambahkan data: " . $conn->error;
            }
        } elseif ($action === 'edit') {
            $id_kegiatan = $_POST['id_kegiatan'];
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
            $query = "UPDATE kegiatan SET judul='$judul', deskripsi='$deskripsi', foto='$uploadPath', tanggal='$tanggal' WHERE id_kegiatan='$id_kegiatan'";
            $result = $conn->query($query);

            if ($result) {
                echo "Data berhasil diperbarui";
            } else {
                echo "Gagal memperbarui data: " . $conn->error;
            }
        }
    }
}

$query = "SELECT * FROM kegiatan";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD kegiatan</title>
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
        <h1>KEGIATAN</h1>
    </header>
    <main>
        <div class="button-container">
            <a href="add_kegiatan.php" class="to-button">Tambah kegiatan</a>
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
                      <a class='to-button' href='?action=edit&id=" . $row['id_kegiatan'] . "'>Edit</a>
                      <a class='back-button' href='?action=delete&id=" . $row['id_kegiatan'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                  </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'add') {
        ?>
            <form id="pengumumanForm" action="" method="post" enctype="multipart/form-data">
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul">

                <label for="foto">Foto:</label>
                <input type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png">

                <label for="deskripsi">Deskripsi:</label>
                <input type="text" id="deskripsi" name="deskripsi">

                <label for="tanggal">Tanggal:</label>
                <input type="text" id="tanggal" name="tanggal">

                <button type="submit" name="action" value="add">Tambah kegiatan</button>
            </form>
            <?php
        } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
            $id_kegiatan = $_GET['id'];
            $editQuery = "SELECT * FROM kegiatan WHERE id_kegiatan=?";
            $stmt = $conn->prepare($editQuery);
            $stmt->bind_param("i", $id_kegiatan);
            $stmt->execute();
            $editResult = $stmt->get_result();
            $stmt->close();

            if ($editResult->num_rows > 0) {
                $editRow = $editResult->fetch_assoc();
            ?>
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <style>
                        header {
                            background-color: #333;
                            color: white;
                            text-align: center;
                            padding: 1em 0;
                        }

                        main .coba {
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
                            display: block;
                            height: 100px;
                            padding: 8px;
                            margin-bottom: 16px;
                            word-wrap: break-word;
                            overflow-y: auto;
                        }

                        button {
                            padding: 10px;
                            background-color: #333;
                            color: white;
                            border: none;
                            cursor: pointer;
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

                    <main class="coba">
                        <?php if (!empty($notification)) : ?>
                            <div style="color: green; margin-bottom: 10px;"><?php echo $notification; ?></div>
                        <?php endif; ?>
                        <form id="editForm" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id_kegiatan" value="<?php echo $editRow['id_kegiatan']; ?>">

                            <label for="judul">Judul:</label>
                            <input type="text" id="judul" name="judul" value="<?php echo $editRow['judul']; ?>">

                            <label for="foto">Foto:</label>
                            <img src="<?php echo $editRow['foto']; ?>" alt="Foto" style="max-width: 100px; max-height: 100px;">
                            <input type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png">

                            <label for="deskripsi">Deskripsi:</label>
                            <textarea id="deskripsi" name="deskripsi"><?php echo $editRow['deskripsi']; ?></textarea>

                            <label for="tanggal">Tanggal:</label>
                            <input type="text" id="tanggal" name="tanggal" value="<?php echo $editRow['tanggal']; ?>">

                            <button type="submit" name="action" value="edit">Simpan Perubahan</button>
                        </form>
                    </main>
                </body>

                </html>
        <?php
            }
        }
        ?>
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