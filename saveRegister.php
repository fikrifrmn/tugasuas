<?php
    include("config.php");

    // Mendapatkan data dari form
    $a = $_POST['nama'];
    $b = $_POST['nip'];
    $c = $_POST['email'];
    $d = $_POST['gender'];
    $e = $_POST['nohp'];
    $f = $_POST['alamat'];
    $h = $_POST['status'];
    $i = $_POST['password'];

    // Direktori untuk menyimpan file yang di-upload
    $target_dir = "assets/avatars/";
    $target_file = $target_dir . basename($_FILES["photo_profile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Memeriksa apakah file yang di-upload adalah gambar
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo_profile"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Memeriksa apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Membatasi ukuran file
    if ($_FILES["photo_profile"]["size"] > 1000000) { // Limit to 500KB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Mengizinkan format file tertentu
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Memeriksa apakah $uploadOk bernilai 0 karena error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // Jika semua pemeriksaan terlewati, coba untuk meng-upload file
    } else {
        if (move_uploaded_file($_FILES["photo_profile"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["photo_profile"]["name"])) . " has been uploaded.";

            // Menyimpan path file ke database
            $photo_profile_path = $target_file;

            // Insert into database
            $simpan = "INSERT INTO user (nama, nip, email, gender, nohp, alamat, photo_profile, status, password) 
            VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$photo_profile_path', '$h', '$i')";

            if (mysqli_query($koneksi, $simpan)) {
                header("Location: index.php");
            } else {
                echo "Error: " . $simpan . "<br>" . mysqli_error($koneksi);
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    mysqli_close($koneksi);
?>
