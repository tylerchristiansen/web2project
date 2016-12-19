<?php
session_start();
$title = $post["postTitle"];
include "select.php";
include "nav.php";
include "header.php";
 ?>
<?php

//Super Global Variable
$post=select::postById($_GET["id"]);
//Passed by... /full-post.php?id=1
// ?id=1 is a parameter sent to the var_dump function
?>
<div class="section group">
  <div class="col span_3_of_3">
  </div>
</div>

<div class="section group">
  <div class="col span_3_of_3">
  </div>
</div>

<div class="section group">
  <div class="col span_3_of_3">
  </div>
</div>

<div class="section group">
  <div class="col span_3_of_3">
  </div>
</div>

<div class="section group">
  <div class="col span_1_of_3">
  </div>
  <div class="col span_1_of_3">
    <fieldset align="center">
    <h1>
    <fieldset><?php echo $post["postTitle"] ?></fieldset>
    </h1>
        <h3>
        By: <?php echo $post["username"] ?>
      </h3>
    <?php echo $post["postBody"] ?>
            </fieldset>
  </div>
</div>
