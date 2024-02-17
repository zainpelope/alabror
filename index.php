<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LPI AL-ABROR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <style>
        .navbar-brand {
            font-size: 28px;
        }
    </style>


</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand fw-bold" href="#">LPI AL-ABROR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#about">Sejarah</a></li>
                            <li><a class="dropdown-item" href="#visi">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="#tujuan">Tujuan</a></li>
                            <li><a class="dropdown-item" href="#struktur">Struktur</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pengumuman.php">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="kegiatan.php">Kegiatan</a>
                    </li>
                </ul>
                <button class="btn btn-outline-success" type="submit" onclick="redirectLogin()">Login</button>
            </div>
        </div>
    </nav>

    <script>
        function redirectLogin() {
            window.location.href = "login.php";
        }
    </script>

    <!-- Navbar End -->

    <!-- Corousel Start  -->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="h-100 w-100" src="images/1.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-block">
                    <h2> <span>Kegiatan</span> Pramuka</h2>
                    <p>Menyaksikan keceriaan dan semangat dalam kegiatan pramuka di Lembaga Pendidikan Islam Al-Abror
                        Bujur Timur. Siswa kami belajar keterampilan outdoor sambil membangun karakter, tanggung jawab,
                        dan kerjasama.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="h-100 w-100" src="images/2.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-block">
                    <h2> <span>Kegiatan</span> Upacara</h2>
                    <p>Merayakan kebersamaan dan patriotisme melalui upacara berkala di Lembaga Pendidikan Islam
                        Al-Abror Bujur Timur. Kami bangga menjadi bagian dari komunitas yang mendukung nilai-nilai luhur
                        dan semangat nasionalisme.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="h-100 w-100" src="images/3.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-block">
                    <h2> <span>Proses</span> Belajar di Kelas</h2>
                    <p>Menggali ilmu di ruang kelas yang penuh inspirasi. Guru-guru kami berkomitmen menciptakan
                        lingkungan belajar yang mendukung, memotivasi, dan merangsang rasa ingin tahu, membantu siswa
                        tumbuh menjadi pemimpin berpengetahuan luas dan berbudi luhur.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Corousel End -->

    <!-- About Start -->
    <main id="about" class="p-4">
        <div class="about mt-5 mb-5">
            <div class="">
                <h2 class="h2-responsive fw-bold text-center my-2">
                    Sejarah
                </h2>
                <h5 class="text-center w-responsive mx-auto mb-1">Yayasan As-Shalihin yang berlokasi di Dusun Songlesong
                    Desa Bujur Timur kecamatan Batumarmar Kabupaten Pamekasan sudah lama berdiri dan melaksanakan
                    pendidikan non formal mulai dari asuhan mengaji, madrasah diniyah dan sosial kemasyarakatan. Yayasan
                    ini diasuh oleh K. Sholehoddin Rosyadi.</h5>
                <div class="row pt-5">
                    <div class="col-md-6 align-items-stret">
                        <img class="img-fluid" src="images/4.jpeg" class="rounded float-start" alt="">
                    </div>
                    <div class="col-md-6">
                        <h5 class="lh-base">Pada tahun 1998 , Madrasah ini berdiri, menempati gedung baru yang terdiri
                            atas 6 ruang kelas, satu ruang kantor dan empat KM/WC, lokasi ini beralamat di Desa Bujur
                            Timur Kecamatan Batu Marmar Kabupaten Pamekasan yang berjarak dari kota 33 Km.</h5>
                        <h5 class="lh-base">Beberapa kali yayasan ini mengususlkan untuk menjadi Madrasah Ibtidaiyah
                            formal dengan pertimbangan adanya dampak terhadap kehidupan madrasah baik ditinjau dari segi
                            sosiologis, poedogogis maupun dari kacamata orang awam. Usul ini kemudian direspon dengan
                            baik oleh Kementerian Agama dan berdirilah MI dengan nama Madrasaah Ibtidaiyah Al-Abror
                            mualai tahun 1998. Tanah yang ditempati mempunyai luas 2.842,57 m2. Pada tahun 2020 saat ini
                            mudah-mudahan bisa lebih memadai dan semakin baik meskipun sumbernya hanya dari dana swadaya
                            masyarakat.</h5>
                        <a href="profile.pdf" class="btn btn-primary px-2 pl-2 mt-5" target="_blank">Lihat
                            Selengkapnya</a>

                    </div>
                </div>
            </div>

        </div>
    </main>
    <!-- About End -->


    <!-- Sejarah End-->

    <!-- visimisi Start -->
    <section class="p-4">
        <div class="visi">
            <div class="" id="visi">
                <h2 class="h2-responsive fw-bold text-center my-2">
                    Visi dan Misi
                </h2>
                <h5 class="text-center w-responsive mx-auto mb-1">Dengan penuh kebanggaan dan semangat, kami
                    mempersembahkan lembaga pendidikan kami, Al-Abror Bujur Timur, sebagai wadah pengembangan ilmu dan
                    nilai-nilai keislaman. Sebagai lembaga yang berkomitmen tinggi untuk memberikan pendidikan terbaik,
                    Al-Abror Bujur Timur didirikan dengan tujuan utama membentuk generasi penerus yang berakhlak mulia,
                    berilmu tinggi, dan mampu berkontribusi positif dalam membangun masyarakat.</h5>
            </div>
            <div class="column">
                <h2>Visi</h2>
                <h5>“TERWUJUDNYA AKHLAKUL KARIMAH, PRESTASI, BERWAWASAN GELOBAL YANG DILANDASI NILAI-NILAI BUDAYA LUHUR
                    SESUAI DENGAN AJARAN ISLAM ”
                </h5>
            </div>

            <div class="column">
                <h2>Misi</h2>
                <h5>
                    1. Menanamkan Aqidah/Keyakinan melalui pengalaman Ajaran Agama Islam<br>
                    2. Mengoptimalkan Proses belajar dan Bimbingan<br>
                    3. Mengembangkan pengabdian di bidang Iptek,bahasa,olahraga,dan seni budaya,sesuai dengan bakat
                    minat siswa<br>
                    4. Memberi pemahaman kepada siswa tentang pentingnya ilmu agama, pengetahuan dan tekhnologi<br>
                    5. Menjalin kerja sama antara warga sekitar yang harmonis serta Memotofasi siswa agarselalu
                    berkreasi
                </h5>
            </div>
    </section>

    <!-- visimisi End-->

    <!-- Tujuan Start -->
    <main class="mt-5 p-4">
        <div class="" id="tujuan">
            <h2 class="h2-responsive fw-bold text-center my-2">
                Tujuan
            </h2>
            <h4>Dengan visi dan misi yang telah ditetapkan dalam kurun waktu yang telah ditetapkan, tujuan umum yang
                diharapkan tercapai oleh madrasah adalah:<br></h4>
            <h5>
                1. Mampu secara aktif menjadikan madrasah sebagai pusat mengamalkan ilmu yang telah diraih menuju Ulil
                Albab, Ulil, Abshor, dan Ulin Nuha.<br>
                2. Berakhlak mulia (Akhlakul Karimah)<br>
                3. Mampu secara aktif melaksanakan ibadah yaumiyah dengan benar dan tertib.<br>
                4. Khatam Alqur'an Juz 30, Juz 1 – 10 dengan tartil.<br>
                5. Hafal juz 30 (Juz Amma).<br>
                6. Mampu berbicara menggunakan bahasa Indonesia dengan baik dan benar.<br>
                7. Dapat bersaing dan tidak kalah dengan para siswa dari Madrasah yang lain dalam bidang ilmu
                pengetahuan<br>
                8. Berkepribadian, berpola hidup sehat, serta peduli pada lingkungan.
            </h5>
        </div>
    </main>
    <!-- Tujuan End-->

    <!-- Struktur Start -->

    <?php
    include 'koneksi.php';

    $query = "SELECT id, nama, file, jabatan FROM struktur";
    $result = $conn->query($query);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Struktur</title>

    </head>

    <body>
        <main class="mt-5 p-4">
            <div id="struktur">
                <h2 class="h2-responsive fw-bold text-center my-2">
                    Struktur
                </h2>
                <h5 class="text-center w-responsive mx-auto mb-1">Lembaga Pendidikan Islam Al-Abror Bujur Timur didesain
                    dengan struktur yang kokoh dan terorganisir, memastikan kelancaran pelaksanaan kegiatan pendidikan.
                    Berikut adalah komponen struktur utama lembaga:</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">NOMOR</th>
                        <th scope="col" class="text-center">FOTO</th>
                        <th scope="col" class="text-center">NAMA</th>
                        <th scope="col" class="text-center">JABATAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sequenceNumber = 1;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='text-center'>" . $sequenceNumber . "</td>";
                            echo "<td class='text-center'><img src='" . $row['file'] . "' width='55' height='55' alt=''></td>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['jabatan'] . "</td>";
                            echo "</tr>";
                            $sequenceNumber++;
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </body>

    </html>

    <!-- Struktur End-->

    <!-- kontak start -->
    <?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = mysqli_real_escape_string($conn, $_POST["name"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $pesan = mysqli_real_escape_string($conn, $_POST["message"]);

        $sql = "INSERT INTO pesan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

        if ($conn->query($sql) === TRUE) {
            echo "Pesan berhasil dikirim!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Form</title>
    </head>

    <body>
        <!-- kontak start -->
        <main class="mt-5 p-4">
            <div class="">
                <h2 class="h2-responsive fw-bold text-center my-2">
                    Kontak
                </h2>
                <h5 class="text-center w-responsive mx-auto mb-1">Jika Anda memiliki pertanyaan lebih lanjut atau ingin
                    mendapatkan informasi lebih lanjut mengenai Lembaga Pendidikan Islam Al-Abror Bujur Timur, silakan
                    hubungi kami melalui:</h5>
                <div class="row mt-5">
                    <div class="col-md-5 mb-md-0 mb-5">
                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                            <div class="row">
                                <div class="col-md-12 pt-3">
                                    <div class="md-form mb-0">
                                        <label for="name" class="">Nama</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama Anda">
                                    </div>
                                </div>
                                <div class="col-md-12 pt-3">
                                    <div class="md-form mb-0">
                                        <label for="email" class="">Email</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan Email Anda">
                                    </div>
                                </div>
                                <div class="col-md-12 pt-3">
                                    <div class="md-form">
                                        <label for="message">Pesan</label>
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="Masukkan Pesan Anda"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-3">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </div>
                        </form>
                        <div class="status"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2689262256763!2d113.5259107738885!3d-6.977562968323871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9cf3560d3c923%3A0xe1e4b756932c3490!2sMIS%20AL-ABROR!5e0!3m2!1sid!2sid!4v1705731395365!5m2!1sid!2sid" width="750" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>

    </html>
    <!-- kontak end -->

    <!-- Footer Start -->
    <footer class="bg-primary text-white text-center text-lg-start">
        <div class="">
            <div class="row">
                <div class="col-lg-6 py-3 mb-4 p-4">
                    <h5 class="text-uppercase">LPI AL-ABROR BUJUR TIMUR</h5>
                    <p>
                        Bujur Timur, Pamekasan, Jawa Timur, Indonesia
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0 py-3">
                    <h5 class="text-uppercase mb-0">Kontak</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-white">Email : alabror@gmail.com</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Whatsapp : +62 1245-67875-3465</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Telepon : +62 1245-67875-3465</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Copyright:
            <a class="text-white" href="#">Al-Abror</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer End -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>