<!DOCTYPE html>

<html>

<head>
	<link rel = "stylesheet" type = "text/css" href = "css/tableTheme.css">
	<link rel = "stylesheet" type = "text/css" href = "css/buttonTheme.css">
	
	<?php

	session_start();

	if($_SESSION['loggedin'] == false) {
		header('Location: loginForm.html');
	}

	$servername = "dragon.kent.ac.uk";
	$username = "co323";
	$password = "pa33word";
	$dbname = "co323";

	try {
		$dbhandle = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	}

	catch (PDOException $e) {
		// The PDO constructor throws an exception if it fails
		die('Error Connecting to Database: ' . $e -> getMessage());
	}

	// Run the SQL query, and print error message if it fails.
	$sql = "SELECT forename, surname, dob FROM member WHERE clubID = 'C01' AND gender = 'F' ORDER BY surname";
	//
	$query = $dbhandle -> prepare($sql);

	if ( $query -> execute() === FALSE ) {
		die('Error Running Query: ' . implode($query -> errorInfo(),' ')); 
	}
			
	// Put the results into a nice big associative array
	$results = $query -> fetchAll()

	?> 
</head>


<body>
	<div class = "container">
		<div class = "header">
			<h1>TASK 1</h1>
		</div>
		
		<div class = "navBar">
			<hr id = "hr1">
			<input class = "menuBtn" type = "button" value = "Menu" onclick="window.location='menu.php';" />
			<input class = "logoutBtn" type = "button" value = "Logout" onclick="window.location='loginForm.html';" />
		</div>
		
		<div class = "content">
			<table>
				<tr>
					<th>Forename</th>
					<th>Surname</th>
					<th>Date of Birth</th>
				</tr>
				<?php
					   
				// Printing the forenames, surnames and dates of birth of all female members in the club C01 from array results.   
				foreach ($results as $row) {
					echo "<tr>
							<td>".$row['forename']."</td>
							<td>".$row['surname']."</td>
							<td>".$row['dob']."</td>
						 </tr>";
				   }   
				?>
			</table>
		</div>
		
		<div class = "bottomNav">
			<input type = "button" value = "Back" class = "backBtn" onclick="window.location='menu.php';" />
		</div>
		<div class = "footer">
			<hr id = "hr2">
			<footer>
				Database Management
			</footer>
		</div>
	</div>
</body>


</html>




