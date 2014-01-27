<?php
session_start();
echo "<!DOCTYPE html>
      <html>
      <head>
      <title>" . $title . "</title>
      </head>
      <body>";
if(!isset($_SESSION['usr'])) {
	echo "<form method='post' action='login.php'>
	 <input type='text' name='usr' placeholder='Username' required />
	 <input type='password' name='pass' placeholder='password' required />
	 <input type='submit' value='Login' /></form><br />
	 <a href=register.php>register</a>";
}
else
	echo "<a href=logout.php>logout</a>";
?>