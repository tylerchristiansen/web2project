<?php
// Access test db on local machine
if (!mysql_connect("127.0.0.1", "root", "")) {
				die('oops connection problem ! --> ' . mysql_error());
}
if (!mysql_select_db("dbtest")) {
				die('oops database selection problem ! --> ' . mysql_error());
}
?>
