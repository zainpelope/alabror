<?php

include('koneksi.php');


$query = "SELECT * FROM kegiatan";
$result = $conn->query($query);


if (!$result) {
    die("Query error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Daftar Kegiatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;

        }

        body {
            justify-content: center;
        }

        .kegiatan-card {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            margin: 5px;
            padding: 5px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 600px) {
            .kegiatan-card {
                width: 100%;

            }
        }

        header {
            background-color: #333;
            color: white;
            padding: 1em;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #2980b9;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <h1>Daftar Kegiatan</h1>
    </header>
    <a class='back-button' href="index.php">Kembali</a>
    <div class="container">
        <?php

        while ($row = $result->fetch_assoc()) {
            echo "<div class='kegiatan-card'>";
            echo "<h3 style='text-align: center;'>" . $row['judul'] . "</h3>";
            if (pathinfo($row['foto'], PATHINFO_EXTENSION) === 'pdf') {
                echo "<img src='images/pdf.png' alt='PDF' style='max-width: 100px; max-height: 100px;'>";
            } else {
                echo "<img src='" . $row['foto'] . "' alt='Foto' style='max-width: 100px; max-height: 100px;'>";
            }
            echo "<p style='max-height: 3em; overflow: hidden;'>" . $row['deskripsi'] . "</p>";
            echo "<p style='font-style: italic; color: #777; font-size: 14px;'>Tanggal: " . $row['tanggal'] . "</p>";


            echo "<a href='detail_kegiatan.php?id=" . $row['id_kegiatan'] . "' class='button'>Lihat Detail</a>";

            echo "</div>";
        }
        ?>
    </div>

</body>

</html>

<?php

$conn->close();
?>