<?php

class PostHandler
{
	private $db;

	function __construct() {
		$this->db = new DBHandler();

	}


	function showPosts() {
		return $this->db->query("SELECT users.username, posts.title, posts.posted, posts.message 
								FROM posts, users, users_posts 
								WHERE posts.id = users_posts.posts_id 
								AND users_posts.user_id = users.id 
								ORDER BY posts.posted DESC");
	}


	function showUserPosts($usr) {
		return $this->db->query("SELECT users.username, posts.title, posts.posted, posts.message, posts.id 
								FROM posts, users, users_posts 
								WHERE posts.id = users_posts.posts_id 
								AND users_posts.user_id = users.id 
								AND users.username = '".$usr."'ORDER BY posts.posted DESC");
	}

	function deletePost($pid){
		$this->db->query("DELETE FROM posts WHERE id=".$pid);
	}

	function createPost($username, $message, $title = "") {
		$row = $this->db->query("SELECT id FROM users WHERE username='".$username."'");
		$uid = $row[0]["id"];

		$sql = "";
		if(!empty($title))
			$sql = "INSERT INTO posts (title, message) VALUES('".$title."', '".$message."')";
		else
			$sql = "INSERT INTO posts (message) VALUES('".$message."')";

		$this->db->query($sql);
		$lid = $this->db->lastInsertId();
		$this->db->query("INSERT INTO users_posts VALUES(".$uid.",".$lid.")"); 
	}
}
?>