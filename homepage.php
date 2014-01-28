<?php
$title = "homepage";
require_once("template/header.php");

require_once("classes/DBHandler.php");
require_once("classes/PostHandler.php");
$ph = new PostHandler();

$usr = "";
if(isset($_GET['usr']))
	$usr = $_GET['usr'];

if(isset($_SESSION['usr']) && isset($_GET['usr']) && $_SESSION['usr'] == $_GET['usr'])
{
	echo "<form action='homepage.php?usr=".$_SESSION['usr']."' method='post'>
		Title<input type='text' name='title' /><br />
		<textarea rows=15 cols=25 name='msg' required></textarea><br />
		<input type='submit' value='create' /></form>";

	if(isset($_POST['msg']))
	{
		if(!isset($_POST['title']))
			$ph->createPost($_SESSION['usr'], $_POST['msg']);
		else
			$ph->createPost($_SESSION['usr'], $_POST['msg'], $_POST['title']);
	}
}


$res = $ph->showUserPosts($usr);




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