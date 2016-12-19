<?php
session_start();
$title = "Sign in";
include_once "connect.php";

if (isset($_SESSION['user']) != "") {
				header("Location: home.php");
}
include "nav.php";
if (isset($_POST['btn-login'])) {
				$email = mysql_real_escape_string($_POST['email']);
				$upass = mysql_real_escape_string($_POST['pass']);
				$res   = mysql_query("SELECT * FROM users WHERE email='$email'");
				$row   = mysql_fetch_array($res);
				if ($row['password'] == md5($upass)) {
								$_SESSION['user']   = $row['user_id'];
								$_SESSION['author'] = $row['username'];
?><meta http-equiv="refresh" content="0;url=home.php");><?php
				} else {
?>
        <script>alert('wrong details');</script>
        <?php
				}

}
?>
		<head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <!--spacing-->
        <div class="section group">
            <div class="col span_3_of_3"></div>
        </div>
        <div class="section group">
            <div class="col span_1_of_3"></div>
            <div class="col span_1_of_3" align="center">
                <h1>Please Sign In</h1>
            </div>
        </div>
        <div class="section group">
            <div class="col span_1_of_3"></div>
            <div class="col span_1_of_3" align="center">
                <fieldset>
                    <div id="login-form">
                        <form method="post">
                            <table align="center" width="30%" border="0">
                                <tr>
                                    <td>
                                        <input type="text" name="email" placeholder="Your Email" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="password" name="pass" placeholder="Your Password" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" name="btn-login">Sign In</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="register.php">Sign Up Here</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </fieldset>
            </body>
    </div>
</div>

  <?php
include "footer.php";
?>
