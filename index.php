<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Siswa</title>
    <style>
        .header-buttons {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .header-buttons a {
            margin-left: 15px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .header-buttons a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Siswa</h2>
        <div class="header-buttons">
            <a href="add_student.php">Tambah Siswa</a>
            <a href="logout.php">Logout</a>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['class']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td>
                    <a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_student.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>