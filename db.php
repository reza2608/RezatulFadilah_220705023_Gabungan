<?php
$host = 'localhost';
$db = 'sekolah_db';
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>