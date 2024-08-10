<?php
include 'db.php';

if (isset($_GET['materials_id'])) {
    $materials_id = $_GET['materials_id'];
    $course_id = $_GET['course_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $embed_link = $_POST['embed_link'];

        $stmt = $conn->prepare("UPDATE materials SET title = ?, description = ?, embed_link = ? WHERE materials_id = ?");
        $stmt->bind_param("sssi", $title, $description, $embed_link, $materials_id);
        $stmt->execute();
        $stmt->close();

        header("Location: materials_list.php?course_id=$course_id");
        exit();
    }

    $result = $conn->query("SELECT * FROM materials WHERE materials_id = $materials_id");
    $material = $result->fetch_assoc();
}

include 'templates/header.php';
?>

<h2>Edit Material</h2>
<form method="POST">
    <input type="text" name="title" value="<?php echo $material['title']; ?>" required>
    <textarea name="description" required><?php echo $material['description']; ?></textarea>
    <input type="text" name="embed_link" value="<?php echo $material['embed_link']; ?>" required>
    <button type="submit">Update Material</button>
</form>

<?php
include 'templates/footer.php';
?>