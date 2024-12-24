<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $conn->query("INSERT INTO students (name, class, address, contact) VALUES ('$name', '$class', '$address', '$contact')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Siswa</title>
    <style>
        button {
            background-color: #007bff; /* Warna latar belakang biru */
            color: white; /* Warna teks putih */
            border: none; /* Menghapus border default */
            padding: 10px 20px; /* Menambahkan padding */
            text-align: center; /* Menyelaraskan teks ke tengah */
            text-decoration: none; /* Menghapus dekorasi teks */
            display: inline-block; /* Menampilkan sebagai inline-block */
            font-size: 16px; /* Ukuran font */
            margin: 4px 2px; /* Margin */
            cursor: pointer; /* Menunjukkan kursor pointer saat hover */
            border-radius: 4px; /* Sudut membulat */
        }

        button:hover {
            background-color: #0056b3; /* Warna latar belakang saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Siswa</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Nama" required>
            <input type="text" name="class" placeholder="Kelas" required>
            <textarea name="address" placeholder="Alamat" required></textarea>
            <input type="text" name="contact" placeholder="Kontak" required>
            <button type="submit" name="add">Tambah</button>
        </form>
    </div>
</body>
</html>