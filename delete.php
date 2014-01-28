<?php
session_start();
if(isset($_GET['pid']) && isset($_GET['usr']) && isset($_SESSION['usr']))
{
	if($_GET['usr'] == $_SESSION['usr']) {
		require_once("classes/DBHandler.php");
		require_once("classes/PostHandler.php");
		$ph = new PostHandler();
		$ph->deletePost($_GET['pid']);

		header("Location: homepage.php?usr=".$_SESSION['usr']);
	}

}
?>