<?php

class PostController 
{
	private $pm;
	function __construct() {
		$this->pm = new PostModel();
	}


	function getPost($postId) {
		$post = $this->pm->getOne($postId);
		include("views/viewpost.php");
	}

	function getAllPosts() {
		$posts = $this->pm->getAll();
		include("views/viewposts.php");
	}

	function createPost($userId, $username, $postBody, $title = "") {

	}

	function deletePost($postId) {
		//delete a post
	}

	function editPost($postId, $userId, $username, $postBody, $title = "") {
		//edit a specific post
	}

}

?>