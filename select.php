<?php
class select
{
				public static function connect()
				{
								//return connection
								// dummy info for testdb
								$mysql_host     = "127.0.0.1";
								$mysql_database = "dbtest";
								$mysql_user     = "root";
								$mysql_password = "";

								// Create connection
								$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

								// Check connection
								if ($conn->connect_error) {
												die("Connection failed: " . $conn->connect_error);
								} else {
												return $conn;
								}
				}
				public static function recentPosts()
				{
								//Return posts
								//conect to db
								$conn  = select::connect();
								//build query
								$sql   = "SELECT postID, postTitle, username, substr(postBody, 1, 250) AS postBody FROM blog_posts ORDER BY postID DESC LIMIT 5";
								//query
								$posts = $conn->query($sql);
								//close connection
								$conn->close();
								//return $posts
								return $posts;
				}
				public static function allPosts()
				{
								//Return posts
								//conect to db
								$conn  = select::connect();
								//build query
								$sql   = "SELECT postID, postTitle, username, substr(postBody, 1, 250) AS postBody FROM blog_posts
   ORDER BY postID DESC";
								//query
								$posts = $conn->query($sql);
								//close connection
								$conn->close();
								//return $posts
								return $posts;
				}
				public static function postsByUser($username)
				{
								//connect to db
								$conn  = select::connect();
								//build query
								$sql   = "SELECT * FROM blog_posts WHERE username = '$username'
       ORDER BY postID DESC";
								//query
								$posts = $conn->query($sql);
								//close connection
								$conn->close();
								//return $posts
								return $posts;
				}

				public static function postById($id)
				{
								$conn = select::connect();
								$post = $conn->query("SELECT postTitle, postBody, username
      					FROM blog_posts
      					WHERE postID = '$id'
      															");
								$post = $post->fetch_assoc();
								$conn->close();
								return $post;

				}
				public static function deletePost($id)
				{
								$conn = select::connect();
								$post = $conn->query("DELETE * FROM blog_posts WHERE postID = '$id'");
								$conn->close();
				}
				public static function recentPost()
				{
						return select::connect()->query("SELECT MAX(postID) AS id FROM blog_posts")->fetch_assoc()["id"];
				}

				public static function postSearch($author)
				{
								$conn  = select::connect();
								$posts = $conn->query("SELECT *
  FROM blog_posts
  WHERE username LIKE '%$author%'
  ");
								return $posts;
								$conn - close();
				}

}
