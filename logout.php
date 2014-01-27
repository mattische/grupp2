<?php
session_start();
unset($_SESSION['usr']);
session_destroy();

header("Location: index.php");
?>