<?php
include 'db.php';
include 'templates/header.php';

$result = $conn->query("SELECT * FROM courses");

echo "<h2>List Kursus</h2>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='course'>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<p>Durasi: " . $row['duration'] . "</p>";
        echo "<a href='course_edit.php?course_id=" . $row['course_id'] . "'>Edit</a> | ";
        echo "<a href='course_delete.php?course_id=" . $row['course_id'] . "'>Delete</a> | ";
        echo "<a href='material_add.php?course_id=" . $row['course_id'] . "'>Tambah Materi</a> | ";
        echo "<a href='materials_list.php?course_id=" . $row['course_id'] . "'>List Materi</a>";
        echo "</div>";
    }
} else {
    echo "<p>Tidak ada kursus yang tersedia.</p>";
}

include 'templates/footer.php';
?>