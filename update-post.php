<?php
include "select.php";
// Take title and body, along with ID
// $_POST["title"]
// $_POST["body"]
// $_GET["id"]
$conn      = select::connect();
// prepare
$statement = $conn->prepare("UPDATE blog_posts SET postTitle = ?, postBody = ? WHERE postID = ?");
if (!$statement) {
				die('Prepare failed: ' . $conn->error);
}
// bind
$bindCheck = $statement->bind_param("ssi", $_POST["title"], $_POST["body"], $_GET["id"]);
if (!$bindCheck) {
				die('Bind failed: ' . $statement->error);
}
// execute
if (!$statement->execute()) {
				die('Execute error: ' . $statement->error);
}
// redirect to author.php
header('Location: http://localhost:8000/home.php');
// echo var_dump($_POST);
// echo var_dump($_GET);
?>
