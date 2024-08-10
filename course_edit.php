<?php
include 'db.php';

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];

        $stmt = $conn->prepare("UPDATE courses SET title = ?, description = ?, duration = ? WHERE course_id = ?");
        $stmt->bind_param("sssi", $title, $description, $duration, $course_id);
        $stmt->execute();
        $stmt->close();

        header('Location: index.php');
        exit();
    }

    $result = $conn->query("SELECT * FROM courses WHERE course_id = $course_id");
    $course = $result->fetch_assoc();
    
}

include 'templates/header.php';
?>

<h2>Edit Kursus</h2>
<form method="POST">
    <input type="text" name="title" value="<?php echo $course['title']; ?>" required>
    <textarea name="description" required><?php echo $course['description']; ?></textarea>
    <input type="text" name="duration" value="<?php echo $course['duration']; ?>" required>
    <button type="submit">Update</button>
</form>

<?php
include 'templates/footer.php';
?>