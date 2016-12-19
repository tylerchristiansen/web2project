<?php
include "select.php";
$connection = select::connect();

$id = $_GET['id'];

$stmt = $connection->prepare("DELETE FROM blog_posts
      WHERE postID = ? ");
if (!($stmt)) {
				die('Prepare failed: ' . $conn->error);
}

$bind = $stmt->bind_param("i", $id);
if (!$bind) {
				die('Bind failed: ' . $conn->error);
}

if (!$stmt->execute()) {
				die('Execute failed: ' . $conn->error);
} else {
				header("Location: http://localhost:8000/home.php");
}
?>
