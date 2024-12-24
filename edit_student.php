<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id = $id");
$student = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $conn->query("UPDATE students SET name='$name', class='$class', address='$address', contact='$contact' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Siswa</title>
</head>
<body>
    <div class="container">
        <h2>Edit Siswa</h2>
        <form method="POST">
            <input type="text" name="name" value="<?php echo $student['name']; ?>" required>
            <input type="text" name="class" value="<?php echo $student['class']; ?>" required>
            <textarea name="address" required><?php echo $student['address']; ?></textarea>
            <input type="text" name="contact" value="<?php echo $student['contact']; ?>" required>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>