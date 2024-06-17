<?php
    include("config.php");

    $a = $_POST['nama'];
    $b = $_POST['nip'];
    $c = $_POST['gender'];
    $e = $_POST['status'];
    $f = $_POST['level'];

    $d = date('Y-m-d'); // Untuk mengambil tanggal sesuai hari absen
    $g = date('H:i:s'); // untuk mengambil jam sesuai jam absen

    // Periksa apakah sudah ada absen untuk NIP dan tanggal yang sama
    $checkQuery = "SELECT * FROM absen WHERE nip='$b' AND tanggal='$d'";
    $result = mysqli_query($koneksi, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Jika sudah ada absen untuk hari ini
        echo "<script>alert('Kamu sudah absen hari ini!'); window.location.href='index.php';</script>";
    } else {
        // Jika belum ada absen, simpan data baru
        $simpan = "INSERT INTO absen(nama, nip, gender, tanggal, status, level, start) 
                VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g')";

        if (mysqli_query($koneksi, $simpan)) {
            header("location:index.php");
        } else {
            echo "Gagal simpan: " . mysqli_error($koneksi);
        }
    }

    mysqli_close($koneksi);
?>
