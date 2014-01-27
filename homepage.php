<?php
$title = "homepage";
require_once("template/header.php");

require_once("classes/DBHandler.php");

$db = new DBHandler();

$usr = "";
if(isset($_GET['usr']))
	$usr = $_GET['usr'];


$res = $db->query("SELECT users.username, posts.title, posts.posted, posts.message, posts.id 
	FROM posts, users, users_posts 
	WHERE posts.id = users_posts.posts_id 
	AND users_posts.user_id = users.id 
	AND users.username = '".$usr."'ORDER BY posts.posted DESC");
unset($db);

foreach ($res as $key) {
	echo $key['title'] ."<br />";
	echo $key['message'] . "<br />";
	echo $key['posted'] . " " . $key['username'] . "<br />";
	if(isset($_SESSION['usr']))
		if($_SESSION['usr'] == $key['username'])
			echo "<a href=edit.php>edit</a> | <a href=delete.php?pid=".$key['id']."&usr=".$key['username'].">delete</a><br />";
	echo "<br />";
}  


require("template/footer.php");
?>