<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];

    $stmt = $conn->prepare("INSERT INTO courses (title, description, duration) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $duration);
    $stmt->execute();
    $stmt->close();

    header('Location: index.php');
    exit();
}

include 'templates/header.php';
?>

<h2>Tambah Kursus Baru</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Nama Kursus" required>
    <textarea name="description" placeholder="Deskripsi" required></textarea>
    <input type="text" name="duration" placeholder="Durasi" required>
    <button type="submit">Tambah</button>
</form>

<?php
include 'templates/footer.php';
?>