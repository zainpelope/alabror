<?php
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM struktur WHERE id='$id'";
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
            $strukturName = $_POST['strukturName'];
            $strukturDeskripsi = $_POST['strukturDeskripsi'];

            $fileName = '';
            if (isset($_FILES['strukturFile']) && $_FILES['strukturFile']['error'] === UPLOAD_ERR_OK) {
                $strukturFile = $_FILES['strukturFile'];
                $fileName = $strukturFile['name'];
                $tmpName = $strukturFile['tmp_name'];
                $fileType = $strukturFile['type'];

                $allowedTypes = array("image/jpeg", "image/jpg", "image/png");

                if (!in_array($fileType, $allowedTypes)) {
                    echo "Jenis file tidak didukung. Hanya file JPEG, JPG, dan PNG yang diizinkan.";
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

            $query = "INSERT INTO struktur (nama, file, jabatan) VALUES ('$strukturName', '$uploadPath', '$strukturDeskripsi')";
            $result = $conn->query($query);

            if ($result) {
                echo "Data berhasil ditambahkan";
            } else {
                echo "Gagal menambahkan data: " . $conn->error;
            }
        } elseif ($action === 'edit') {
            $strukturId = $_POST['strukturId'];
            $strukturName = $_POST['strukturName'];
            $strukturDeskripsi = $_POST['strukturDeskripsi'];

            $fileName = '';
            if (isset($_FILES['strukturFile']) && $_FILES['strukturFile']['error'] === UPLOAD_ERR_OK) {
                $strukturFile = $_FILES['strukturFile'];
                $fileName = $strukturFile['name'];
                $tmpName = $strukturFile['tmp_name'];
                $fileType = $strukturFile['type'];

                $allowedTypes = array("image/jpeg", "image/jpg", "image/png");

                if (!in_array($fileType, $allowedTypes)) {
                    echo "Jenis file tidak didukung. Hanya file JPEG, JPG, dan PNG yang diizinkan.";
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

            $query = "UPDATE struktur SET nama='$strukturName', file='$uploadPath', jabatan='$strukturDeskripsi' WHERE id='$strukturId'";
            $result = $conn->query($query);

            if ($result) {
                echo "Data berhasil diperbarui";
            } else {
                echo "Gagal memperbarui data: " . $conn->error;
            }
        }
    }
}

$query = "SELECT * FROM struktur";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Struktur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="templatetabel/css/style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <style>
    main {}

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        text-align: center;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 10px;
    }

    .back-button {
        background-color: #f44336;
        border: 1px solid #f44336;
    }
    </style>
</head>

<body>
    <header>
        <h1>STRUKTUR</h1>
    </header>
    <main>
        <div class="button-container">
            <a href="add_struktur.php" class="to-button">Tambah Struktur</a>
            <a href="admin.php" class="back-button">Kembali</a>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap">
        <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
    $rowNumber = 1; 

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $rowNumber++ . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td style='border-right: 1px solid #000;'><img src='" . $row['file'] . "' alt='Foto' style='max-width: 100px; max-height: 100px;'></td>";
        echo "<td style='border-right: 1px solid #000;'>" . $row['jabatan'] . "</td>";
        echo "<td>
                  <a class='to-button' href='?action=edit&id=" . $row['id'] . "'>Edit</a> |
                  <a class='back-button' href='?action=delete&id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
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
        <form id="strukturForm" action="" method="post" enctype="multipart/form-data">
            <label for="strukturName">Nama:</label>
            <input type="text" id="strukturName" name="strukturName">

            <label for="strukturFile">Foto:</label>
            <input type="file" id="strukturFile" name="strukturFile" accept=".jpg, .jpeg, .png">

            <label for="strukturDeskripsi">Jabtan:</label>
            <input type="text" id="strukturDeskripsi" name="strukturDeskripsi">

            <button type="submit" name="action" value="add">Tambah Struktur</button>
        </form>

    </main>
    <?php
        } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $editQuery = "SELECT * FROM struktur WHERE id=?";
            $stmt = $conn->prepare($editQuery);
            $stmt->bind_param("i", $id);
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

        #strukturDeskripsi {
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
                <input type="hidden" name="strukturId" value="<?php echo $editRow['id']; ?>">

                <label for="strukturName">Nama:</label>
                <input type="text" id="strukturName" name="strukturName" value="<?php echo $editRow['nama']; ?>">

                <label for="strukturFile">Foto:</label>
                <img src="<?php echo $editRow['file']; ?>" alt="Foto" style="max-width: 100px; max-height: 100px;">
                <input type="file" id="strukturFile" name="strukturFile" accept=".jpg, .jpeg, .png">

                <label for="strukturDeskripsi">Jabatan:</label>

                <textarea id="strukturDeskripsi" name="strukturDeskripsi"><?php echo $editRow['jabatan']; ?></textarea>

                <button type="submit" name="action" value="edit">Simpan Perubahan</button>
            </form>
        </main>
    </body>

    </html>
    <?php
            }
        }
        ?>

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