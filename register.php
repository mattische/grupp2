<?php
echo "<form method='post' action=''>
	 <input type='text' name='usr' placeholder='Enter desired username' required />
	 <input type='text' name='email' placeholder='Enter email' required /><br />
	 <input type='password' name='pass1' placeholder='enter password' required />
	 <input type='password' name='pass2' placeholder='confirm password' required /><br />
	 <input type='submit' value='register' /></form><br />";




if(isset($_POST['usr']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['email']))
{
	echo "inne";
	if($_POST['pass1'] == $_POST['pass2'])
	{
		require("classes/DBHandler.php");
		$db = new DBHandler();

		$res = $db->query("SELECT username FROM users WHERE username='".$_POST['usr']."'");
		if(count($res) == 0) {
			$res = $db->query("INSERT INTO users (username, pass, email) VALUES('".$_POST['usr']."', '".$_POST['pass1']."', '".$_POST['email']."')");
			$_SESSION['usr'] = $_POST['usr'];
			header("Location: homepage.php?usr=".$_POST['usr']);
		}	
		else {
		 	echo "Username already taken.";
		 } 
		
	}
	else
		echo "Please enter exact passwords.";
}
?>