<?php
session_start();
include "insert.php";
include "connect.php";

$res     = mysql_query("SELECT * FROM users WHERE user_id=" . $_SESSION['user']);
$userRow = mysql_fetch_array($res);

$title  = $_POST['title'];
$body   = $_POST['body'];
$author = $userRow['username'];
$tagid  = $_POST['radio'];


if (Insert::post($title, $body, $author, $tagid)) {
				//redirect to home page
				header('Location:http://localhost:8000/');
} else {
				echo "Something happened...";
}
?>
