<?php
$title = "BlOg";
require("template/header.php");



echo "<h1>WELCOME";
if(isset($_SESSION['usr']))
	echo " ".$_SESSION['usr'];
echo "</h1>";

require("classes/DBHandler.php");
$db = new DBHandler();

$res = $db->query("SELECT users.username, posts.title, posts.posted, posts.message 
	FROM posts, users, users_posts 
	WHERE posts.id = users_posts.posts_id 
	AND users_posts.user_id = users.id 
	ORDER BY posts.posted DESC");

unset($db);

foreach ($res as $key) {
	echo $key['title'] ."<br />";
	echo $key['message'] . "<br />";
	echo $key['posted'] . " <a href=homepage.php?usr=" . $key['username'] . ">".$key['username']."</a><br /><br />";
}  


require("template/footer.php");
?>