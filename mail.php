<?php
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pesan = mysqli_real_escape_string($conn, $_POST["message"]);

    $sql = "INSERT INTO pesan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        echo "Pesan berhasil dikirim!";

        echo "<script>
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 2000);
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
