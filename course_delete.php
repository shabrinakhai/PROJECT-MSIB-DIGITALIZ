<?php
include 'db.php';

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    $stmt = $conn->prepare("DELETE FROM courses WHERE course_id = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $stmt->close();

    header('Location: index.php');
    exit();
}
?>