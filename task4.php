<!DOCTYPE html>

<html>

<head>
	
	<link rel="stylesheet" type="text/css" href="css/tableTheme.css">
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

	// Run the SQL query, and print error message if it fails
	$sql = "SELECT * FROM fixture JOIN team ON team.tid = fixture.homeTeam WHERE homeTeam = :n OR awayTeam = :n ORDER BY fixture.homeTeam";

	$query = $dbhandle -> prepare($sql);

	if($_GET['dropDown'] != '') {
		if ( $query -> execute(array(":n" => $_GET['dropDown'])) === FALSE ) {
		  die('Error Running Query: ' . implode($query->errorInfo(),' ')); 
	   }
	}

	// Put the results into a nice big associative array
	$results = $query -> fetchAll()
		   
	?>
	
</head>


<body>
	<div class = "container">
		<div class = "header">
			<h1>TASK 4</h1>
		</div>
		
		<div class = "navBar">
			<hr id = "hr1">
			<input class = "menuBtn" type = "button" value = "Menu" onclick="window.location='menu.php';" />
			<input class = "logoutBtn" type = "button" value = "Logout" onclick="window.location='loginForm.html';" />
		</div>
		
		<div class = "content">
			<table>
				<tr>
					<th>Home Team</th>
					<th>Away Team</th>
					<th>Home Team Score</th>
					<th>Away Team Score</th>
					<th>Date</th>
				</tr>
				<?php
				// printing all match details of a certain club from array $results.
					foreach ($results as $row) { 		
						echo "<tr>
						<td>".$row['homeTeam']."</td>
						<td>".$row['awayTeam']."</td>
						<td>".$row['homeTeamScore']."</td>
						<td>".$row['awayTeamScore']."</td>
						<td>".$row['onDate']."</td>
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








