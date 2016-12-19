<?php
session_start();
$title = "Profile";
include "nav.php";
include "header.php";
include_once 'connect.php';
include "select.php";

if (!isset($_SESSION['user'])) {
?>
 <script type="text/javascript">
   alert("Whoops you need to sign in to see this page!")
 </script>
 <meta http-equiv="refresh" content="0;url=sign-in.php")>
<?php
				;
}
// Get Username
$res      = mysql_query("SELECT * FROM users WHERE user_id=" . $_SESSION['user']);
$userRow  = mysql_fetch_array($res);
$username = $userRow['username'];

// Get Posts by Username
$result = select::postsByUser($username);

$res     = mysql_query("SELECT * FROM blog_posts WHERE username= '$username'");
$userRow = mysql_fetch_array($res);

?>

<div class="section group">
  <div class="col span_1_of_3">
  </div>
    <div class="col span_1_of_3">
      <h2 align="center">Welcome - <?php echo $username;?></h2>
    </div>
</div>

    <br>
      <div class="section group">
           <div class="col span_1_of_3">
           </div>
              <div class="col span_1_of_3" align="center">
                 <a href="add-post.php">Add New Post</a>
                 <a href="logout.php?logout">Sign Out</a>
              </div>
      </div>
    <br>
    <br>

<?php
$id = $userRow["postID"];
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
              <h2>
                <?php echo $row["postTitle"]; ?>
              </h2>
            </fieldset>
              <p>
                <?php echo $row["postBody"]; ?>... <a href="full-post.php?id=<?php echo $id;?>">Continue reading...</a>
              </p>
                <br>

            <form action="edit-post.php?id=<?php echo $id;?>" method="post">
                <button type="submit" name="edit">Edit Post</button>
            </form>
            <form class="" action="delete-post.php?id=<?php echo $id; ?>" method="post">
                <button type="submit" name="delete">Delete Post</button>
            </form>
            </fieldset>
            </div>
</div>
          <?php
				}
} else {
				echo "<h1 align='center'> No Posts to show</h1>";
}
?>
<?php
include "footer.php";
?>
</body>
