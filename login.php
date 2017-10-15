<?php

session_start();

$username = "t5c";
$password = "just4fun";
$_SESSION['loggedin'] = false;

if (($_POST['username'] == $username) && ($_POST['password'] == $password)) {
	
	$_SESSION['loggedin'] = true;
	header('Location: menu.php');
}
else {
	
	header('Location: loginForm.html');
	return;
} 

?>