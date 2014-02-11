<?php
foreach($post as $row) {
	echo "<p><b>" . $row['title']  . "</b>" . $row['posted'] . "<br />";
	echo $row['message'] . "</p>";
}

echo "<p>";
foreach($comments as $row) {
	echo "posted: " . $row['posted'] . "<br />" . $row['message'] . "<br /><br />";
} 
echo "</p>";

echo  "<form action='index.php?c=comment&f=addComment' method='post'>
	  Comment:<br /><textarea name='comment' rows=10 cols=20 required></textarea>
	  <br />
	  <input type='hidden' name='pid' value='".$postId."' />
	  <input type=submit value='Add comment'></form>";
?>