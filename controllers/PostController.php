<?php

class PostController 
{
	private $pm;
	function __construct() {
		$this->pm = new PostModel();
	}


	function getPost($postId) {
		$post = $this->pm->getOne($postId);

		require_once("controllers/CommentController.php");
		require_once("models/CommentModel.php");
		$cc = new CommentController();
		$comments = $cc->getComments($postId);
		
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