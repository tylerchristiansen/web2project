<?php
$title = "All Posts";
include "nav.php";
include "header.php";
include "select.php";
include "connect.php";

$result = select::allPosts();

?>

<div class="section group">
    <div class="col span_1_of_3"></div>
    <div class="col span_1_of_3">
        <h1 align="center">Now Viewing All Posts:</h1>
    </div>
    <div class="col span_1_of_3"></div>
</div>
<div class="section group">
    <div class="col span_1_of_3"></div>
    <div class="col span_1_of_3">
        <h3 align="center">Search All Posts By Username:</h3>
        <form class="search" role="search" action="postsByUsername.php" method="GET">
            <div align="center">
                <input type="text" name="username" class="form-control" placeholder="Posts By Username">
                    <button type="submit" class="btn btn-default">
                      Search
                    </button>
            </div>
    </div>
            <div class="col span_1_of_3"></div>
</div>
 <?php
//Loop through and create all Posts
if (is_object($result) && $result->num_rows > 0) {
				//Create posts
				while ($row = $result->fetch_assoc()) {
?>
    <div class="section group">
      <div class="col span_1_of_3">

      </div>
      <div class="col span_1_of_3">
      <fieldset align="center">
        <fieldset>
            <h2><?php echo $row["postTitle"];?>
            </h2>
        </fieldset>
      <h3>
        Posted by: <?php echo $row["username"];?>
      </h3>
          <p>
            <?php echo $row["postBody"];?>...
              <a href="full-post.php?id= <?php echo $row["postID"];?>">Continue reading...
              </a>
          </p>
      </fieldset>
      </div>
      <br>
      <br>
    </div>
    <?php
				}
} else {
				echo "<h1 align='center'> No Posts to show</h1>";
}
include "footer.php";
?>
