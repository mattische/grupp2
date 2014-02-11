<?php
class CommentModel
{

	private $db;

	function __construct() {
		$this->db = new DBHandler();
	}


	function addComment($postId, $comment) {
		
		$this->db->query("INSERT INTO comments (message, posts_id) VALUES('".nl2br($comment)."', '".$postId."')");
	}

	function getComments($postId) {
		return $this->db->query("SELECT * FROM comments WHERE posts_id=".$postId);
	}
}

?>