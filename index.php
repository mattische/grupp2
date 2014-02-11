<?php
$title = "BlOg";
require("templates/header.php");
require("lib/DBHandler.php");
require("controllers/PostController.php");
require("models/PostModel.php");

require("routes.php");
echo "<h1>WELCOME</h1>";



if(isset($_GET['c'])) {

	$ctrl = "nothing";
	if(array_key_exists($_GET['c'], $routes))
	{
		$ctrl = $routes[$_GET['c']];
		require_once("controllers/".$ctrl.".php");
		require_once("models/".$models[$_GET['c']].".php");
	}
	

	$obj = new $ctrl();
	

	if(isset($_GET['f'])) {
		$methods = get_class_methods($ctrl);
		if(in_array($_GET['f'], $methods))
		{
			$func = $_GET['f'];
			if(isset($_GET['args']))
			{
				$arguments = "";
				for($i=0; $i < count($_GET['args']); $i++) {
					$arguments .= $_GET['args'][$i];
					if($i < count($_GET['args']) - 1)
						$arguments .= ",";
				}
				$obj->$func($arguments);
			}
			else
				$obj->$func();
		}
	}

}
else {
	$pc = new PostController();
	$pc->getAllPosts();

}



require("templates/footer.php");
?>