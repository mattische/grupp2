<?php
foreach($posts as $row) {
	echo "<p><b><a href='index.php?c=post&pid=".$row['pid']."'>" . $row['title']  . "</a></b>" . $row['pid'] . " " . $row['posted'] . " <a href='index.php?c='>" . $row['username'] . "</a><br />";
	echo $row['message'] . "</p>";
}

?>