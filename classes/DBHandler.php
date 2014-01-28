<?php
class DBHandler 
{
	private $pdo;

	function __construct() {
		$this->pdo = new PDO('mysql:host=localhost;dbname=blog_group2', "", "");
	}

	function query($sql) {
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function lastInsertId() {
		return $this->pdo->lastInsertId();
	}


	function __destruct() {
		$this->pdo = null;
	}
}
?>