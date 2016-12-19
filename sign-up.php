<?php
session_start();
$title = "Sign Up";
include "nav.php";
include "header.php";
include "insert.php";

if (isset($_SESSION['user']) != "") {
?>
  <script type="text/javascript">
  alert("Whoops! You're already logged in. Redirecting...");
  </script>
  <meta http-equiv="refresh" content="0;url=home.php");
<?php
}
include_once 'connect.php';

if (isset($_POST['btn-signup'])) {
				$uname = mysql_real_escape_string($_POST['uname']);
				$email = mysql_real_escape_string($_POST['email']);
				$upass = md5(mysql_real_escape_string($_POST['pass']));

				if (Insert::user($uname, $email, $upass)) {
?>
        <script>alert('successfully registered ');</script>
        <meta http-equiv="refresh" content="0;url=sign-in.php");
        <?php
				} else {
?>
        <meta http-equiv="refresh" content="0;url=505.php")>
        <?php
				}
}
?>

</head>
<body>
    <!--spacing-->
    <div class="section group">
        <div class="col span_3_of_3">
        </div>
    </div>
    <div class="section group">
        <div class="col span_1_of_3">
        </div>
        <div class="col span_1_of_3" align="center">
            <h1>Register Below</h1>
        </div>
    </div>
    <div class="section group">
        <div class="col span_1_of_3">
        </div>
        <div class="col span_1_of_3" align="center">
            <fieldset>
                <div id="login-form">
                    <form method="post">
                        <table width="30%" border="0">
                            <tr>
                                <td>
                                    <input type="text" name="uname" placeholder="User Name" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="email" name="email" placeholder="Your Email" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" name="pass" placeholder="Your Password" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="btn-signup">Sign Me Up</button>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="sign-in.php">Sign In Here</a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </fieldset>
        </div>
    </div>
</body>

</html>
  <?php
include "footer.php";
?>
