<?php
session_start();
$title = "Add Post";
include "nav.php";
include "header.php";
include "connect.php";



if (!isset($_SESSION['user'])) {
				header("Location: index.php");
}
$res     = mysql_query("SELECT * FROM users WHERE user_id=" . $_SESSION['user']);
$userRow = mysql_fetch_array($res);
?>


<div class="section group">
    <div class="col span_3_of_3"></div>
</div>
<div class="section group">
    <div class="col span_1_of_3"></div>
    <div class="col span_1_of_3" align="center">
        <h1>Add New Post</h1>
    </div>
</div>
<div class="section group">
    <div class="col span_1_of_3"></div>
    <div class="col span_1_of_3">
        <fieldset align="center">
            <form class="add-post" action="create-post.php" method="post">
                <table class="clean">
                    <tbody>
                        <tr>
                            <td>Title:</td>
                            <td>
                                <input name="title" type="text" >
                                </td>
                            </tr>
                            <tr>
                                <td>Author:
                                    <?php
echo $userRow['username'];
?>
                                </td>
                            </tr>
                            <tr>
                                <td>Body:</td>
                                <td>
                                    <textarea name="body"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Tag:</td>
                                <td>
                  							News
                                    <input type="radio" name="radio" value=1 />
                                    <br />
                   							Academics
                                    <input type="radio" name="radio" value=2  />
                                    <br />
                   							Random
                                    <input type="radio" name="radio" value=3  />
                                    <br />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="submit" action="create-post.php">Add Post</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </fieldset>
        </div>
    </div>
<?php
include "footer.php";
?>
