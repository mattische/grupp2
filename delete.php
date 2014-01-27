<?php
session_start();
if(isset($_GET['pid']) && isset($_GET['usr']) && isset($_SESSION['usr']))
{
	if($_GET['usr'] == $_SESSION['usr']) {
		require_once("classes/DBHandler.php");
		$db = new DBHandler();
		$db->query("DELETE FROM posts WHERE id=".$_GET['pid']);
		header("Location: homepage.php?usr=".$_SESSION['usr']);
	}

}
?>