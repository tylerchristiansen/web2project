<head>
  <link rel="stylesheet" href="style.css">
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

  <meta charset="utf-8">
  <?php
if (isset($title)) {
				$title = " | " . $title;
} else {
				$title = "";
}
?>
  <title>FSS<?php
echo $title;
?></title>

<script>
  // Polling update for new posts
  var lastPostId;
  setInterval(function () {
    $.get('mostrecent.php')
      .success(function (id) {
        if(lastPostId < id) {
          alert('New Post: ');
        }
        lastPostId = id;
      }).error(alert);
  }, 5000);
  </script>
</head>
