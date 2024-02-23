<?php

include('koneksi.php');


if (isset($_GET['id'])) {

    $id_pengumuman = $_GET['id'];


    $query = "SELECT * FROM pengumuman WHERE id_pengumuman = $id_pengumuman";
    $result = $conn->query($query);


    if (!$result) {
        die("Query error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $pengumuman = $result->fetch_assoc();
    } else {

        header("Location: tampil_pengumuman.php");
        exit();
    }
} else {

    header("Location: tampil_pengumuman.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengumuman</title>

    <style>
        header {
            background-color: #333;
            color: white;
            padding: 1em;
            text-align: center;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #3498db;
        }

        p {
            line-height: 1.6;
        }

        img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
        }

        embed {
            width: 100%;
            height: 500px;
            border-radius: 10px;
            margin-top: 20px;
        }

        p.date {
            font-style: italic;
            color: #777;
            margin-top: 20px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 8px 10px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            transition: background-color 0.3s;
        }


        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

    <header>
        <h1>Detail Pengumuman</h1>
    </header>
    <div class="container">
        <h3><?php echo $pengumuman['judul']; ?></h3>
        <?php
        $file_extension = pathinfo($pengumuman['foto'], PATHINFO_EXTENSION);
        if ($file_extension === 'pdf') {
            echo "<embed src='" . $pengumuman['foto'] . "' type='application/pdf'>";
        } else {
            echo "<img src='" . $pengumuman['foto'] . "' alt='Foto pengumuman'>";
        }
        ?>
        <p><?php echo $pengumuman['deskripsi']; ?></p>
        <p class="date">Tanggal: <?php echo $pengumuman['tanggal']; ?></p>
        <a href="pengumuman.php">Kembali</a>
    </div>
</body>

</html>

<?php
$conn->close();
?>