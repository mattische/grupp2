<?php
class CommentController
{

	private $cm;
	function __construct() {
		$this->cm = new CommentModel();
	}

	function addComment() {


		if(isset($_POST['pid']) && isset($_POST['comment']))
		{
			$this->cm->addComment($_POST['pid'], $_POST['comment']);
			header("Location: index.php?c=post&f=getPost&args[]=".$_POST['pid']);
		}
	}

	function getComments($pid) {
		$result = $this->cm->getComments($pid);
		return $result;
	}
}

?>