<?php
include "select.php";

class Insert
{
				public static function post($title, $body, $author, $tagid)
				{
								$connection = select::connect();

								if (!($stmt = $connection->prepare("INSERT INTO blog_posts (postTitle, postBody, username, tagID) VALUES (?, ?, ?, ?)"))) {
												die("Prepare failed:" . $mysqli->error);
								}

								if (!($stmt->bind_param("sssi", $title, $body, $author, $tagid))) {
												die("Binding params failed: " . $mysqli->error);
								}


								if (!($stmt->execute())) {
												die("Execute failed: " . $stmt->error);
								}

								return true;
				}
				public static function user($uname, $email, $upass)
				{
								$connection = select::connect();

								if (!($stmt = $connection->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)"))) {
												die("Prepare failed:" . $mysqli->error);
								}

								if (!($stmt->bind_param("sss", $uname, $email, $upass))) {
											?>
												<meta http-equiv="refresh" content="0;url=505.php">
											<?php
									die($stmt->error);
								}


								if (!($stmt->execute())) {
									?>
							<meta http-equiv="refresh" content="0;url=505.php">
									<?php
									die($stmt->error);
								}
								return true;
				}
}
?>
