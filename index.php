<?php
$title = "BlOg";
require("templates/header.php");
require("lib/DBHandler.php");
require("controllers/PostController.php");
require("models/PostModel.php");


echo "<h1>WELCOME</h1>";



if(isset($_GET['c'])) {

	switch ($_GET['c']) {
		case 'post':
			$pc = new PostController();
			echo "POSTS";
			if(isset($_GET['pid'])) {
				$pid = $_GET['pid'];
				$pc->getPost($pid);
			}
			break;
		
		default:
			# code...
			break;
	}
}
else {
	$pc = new PostController();
	$pc->getAllPosts();

}



require("templates/footer.php");
?>