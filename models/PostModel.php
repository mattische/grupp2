<?php
class PostModel
{
	private $db;

	function __construct() {
		$this->db = new DBHandler();
	}


	function getOne($postId) {
		$res = $this->db->query("SELECT title, posted, message FROM posts WHERE id=".$postId);
		return $res;
	}

	function getAll() {
		$res = $this->db->query("SELECT P.id AS pid, P.title, P.message, P.posted, U.username 
			FROM USERS U JOIN users_posts UP ON U.id=UP.user_id 
			JOIN posts P ON UP.posts_id=P.id");
		return $res;
	}

	function create($userId, $username, $postBody, $title = "") {

	}

	function delete($postId) {
		//delete a post
	}

	function edit($postId, $userId, $username, $postBody, $title = "") {
		//edit a specific post
	}

}
?>