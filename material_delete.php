<?php
include 'db.php';

if (isset($_GET['course_id']) && isset($_GET['course_id'])) {
    $materials_id = $_GET['materials_id'];
    $course_id = $_GET['course_id'];

    $stmt = $conn->prepare("DELETE FROM materials WHERE materials_id = ?");
    $stmt->bind_param("i", $materials_id);
    $stmt->execute();
    $stmt->close();

    header("Location: materials_list.php?course_id=$course_id");
    exit();
}
?>