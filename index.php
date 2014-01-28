<?php
$title = "BlOg";
require("template/header.php");



echo "<h1>WELCOME";
if(isset($_SESSION['usr']))
	echo " ".$_SESSION['usr'];
echo "</h1>";

require("classes/DBHandler.php");
require("classes/PostHandler.php");

$ph = new PostHandler();
$res = $ph->showPosts();

foreach ($res as $key) {
	echo $key['title'] ."<br />";
	echo $key['message'] . "<br />";
	echo $key['posted'] . " <a href=homepage.php?usr=" . $key['username'] . ">".$key['username']."</a><br /><br />";
}  


require("template/footer.php");
?>