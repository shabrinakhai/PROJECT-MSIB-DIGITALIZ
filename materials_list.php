<?php
include 'db.php';

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    $result = $conn->query("SELECT * FROM materials WHERE course_id = $course_id");

    include 'templates/header.php';

    echo "<h2>Materi</h2>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='material'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p>Embed Link: <a href='" . $row['embed_link'] . "' target='_blank'>" . $row['embed_link'] . "</a></p>";
            echo "<a href='material_edit.php?materials_id=" . $row['materials_id'] . "&course_id=" . $row['course_id'] . "'>Edit</a> | ";
            echo "<a href='material_delete.php?materials_id=" . $row['materials_id'] . "&course_id=" . $row['course_id'] . "'>Delete</a>";
            echo "</div>";
        }
    } else {
        echo "<p>Tidak ada materi yang tersedia.</p>";
    }

    include 'templates/footer.php';
}
?>