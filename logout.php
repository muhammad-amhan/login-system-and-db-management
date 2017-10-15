<?php

session_start();

if($_SESSION['loggedin'] == true) {
	
	session_destroy();
	session_unset();
}

header('Location: loginForm.html');

?>