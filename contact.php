<?php
include "nav.php";
include "header.php";
if (isset($_POST['submit'])) {
				$to         = "tylernathanchristiansen@gmail.com"; // send to my email
				$from       = $_POST['email']; // sender's email
				$first_name = $_POST['first_name'];
				$last_name  = $_POST['last_name'];
				$subject    = "Form submission";
				$subject2   = "Copy of your form submission";
				$message    = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
				$message2   = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

				$headers  = "From:" . $from;
				$headers2 = "From:" . $to;
				mail($to, $subject, $message, $headers);
				mail($from, $subject2, $message2, $headers2); // sends a copy of the message to the sender
?> <h1><?php
				echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
?></h1>
  <meta http-equiv="refresh" content="3;url=index.php");
  <?php
}
?>

<!DOCTYPE html>
<head>
    <title>Form submission</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="section group">
            <div align="center" class="col span_3_of_3">
                <h1> Your opinion is important to us.</h1>
            </div>
        </div>
        <div class="section group">
            <div class="col span_1_of_3"></div>
            <div class="col span_1_of_3">
                <fieldset align="center">
                    <form action="" method="post">
    									<label for="first_name">First Name:</label>
                        <input type="text" name="first_name">
                            <br>
      												<label for="last_name">Last Name:</label>
                                <input type="text" name="last_name">
                                    <br>
      																<label for="email">Email:</label>
                                        <input type="text" name="email">
                                            <br>
      																				<label for="message">Message</label><br>
                                                    <textarea rows="5" name="message" cols="30"></textarea>
                                                    <br>
                                                        <input type="submit" name="submit" value="Submit">
                                                        </form>
                                                    </fieldset>
                                                </body>
                                            </html>
                                        </div>
                                    </div>

  <?php include "footer.php"; ?>
