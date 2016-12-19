<?php
include "header.php";
include "nav.php";
include "select.php";
$post = select::postById($_GET["id"]);
?>


<!--spacing-->
<div class="section group">
    <div class="col span_3_of_3"></div>
</div>
<div class="section group">
    <div class="col span_1_of_3">
    </div>
        <div class="col span_1_of_3" align="center">
            <h1>Edit Post</h1>
        </div>
</div>
<div class="section group">
    <div class="col span_1_of_3">
    </div>
      <div class="col span_1_of_3" align="center">
    <form class="form" action="update-post.php?id= <?php echo $_GET["id"];?>" method="post">
        <fieldset class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="<?php echo $post["postTitle"]; ?>" class="form-control">
            </fieldset>
            <fieldset class="form-group">
                <label for="body">Body</label>
                <textarea name="body" rows="8" cols="40" value=""><?php echo $post["postBody"];?>
                </textarea>
            </fieldset>
            <button type="submit" name="submit" class="pull-right btn btn-success">Save</button>
        </form>
      </div>
</div>
<?php
include "footer.php";
?>
