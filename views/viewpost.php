<?php
foreach($post as $row) {
	echo "<p><b>" . $row['title']  . "</b>" . $row['posted'] . "<br />";
	echo $row['message'] . "</p>";
}

//create comment form
?>