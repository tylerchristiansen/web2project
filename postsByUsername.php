<?php
include "header.php";
include "nav.php";
include "select.php";

//Super Global Variable
$posts = select::postSearch($_GET["username"]);
//Passed by... /full-post.php ?id=1
// ?id=1 is a parameter sent to the var_dump function
?>

<div class="section group">
  <div class="col span_3_of_3">
  </div>
</div>


<div class="section group">
  <div class="col span_1_of_3">
  </div>
  <div class="col span_1_of_3">
    <h3 align="center">Search All Posts By Username:</h3><form class="search" role="search" action="postsByUsername.php" method="GET">
      <div align="center">
        <input type="text" name="username" class="form-control" placeholder="Posts By Username">
    <button type="submit" class="btn btn-default">Search</button>
          </div>
</div>
  <div class="col span_1_of_3">
  </div>
</div>

  <?php
while ($post = $posts->fetch_assoc()) {
?>
    <div class="section group">
      <div class="col span_1_of_3">
      </div>
      <div class="col span_1_of_3">
        <fieldset align="center">
          <fieldset>
        <h1>
          <?php
				echo $post["postTitle"];
?>
        </h1>
      </fieldset>

        <p>
          <?php
				echo $post["postBody"];
?> </fieldset>
        </p>
      </div>
      </div>
  <?php
}
;
?>

</div>
