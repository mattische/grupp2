<?php
session_start();
if(isset($_POST['usr']) && isset($_POST['pass']) || !isset($_SESSION['usr']))
{
	require("classes/DBHandler.php");
	$db = new DBHandler();

	$res = $db->query("SELECT username, pass FROM users WHERE username='" .$_POST['usr']. "' AND pass='" . $_POST['pass'] . "'");
	if($_POST['usr'] == $res[0]['username'] && $_POST['pass'] == $res[0]['pass']) {
		$_SESSION['usr'] = $_POST['usr'];
		header("Location: homepage.php?usr=".$_POST['usr']);
	}
}
else
	header("Location: index.php");


?>