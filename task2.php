<!DOCTYPE html>

<html>

<head>
	<link rel = "stylesheet" type = "text/css" href = "css/listTheme.css">
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
	$sql = "SELECT name, COUNT(team.tid) AS teamTotal FROM
	team JOIN club ON team.clubID = club.cid GROUP by club.name HAVING COUNT(team.tid) >= '3'";

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
			<h1>TASK 2</h1>
		</div>
		
		<div class = "navBar">
			<hr id = "hr1">
			<input class = "menuBtn" type = "button" value = "Menu" onclick="window.location='menu.php';" />
			<input class = "logoutBtn" type = "button" value = "Logout" onclick="window.location='loginForm.html';" />
			</br>
		</div>
		
		<div class = "content"></br></br></br>
			<p><strong>Clubs that have 3 or more teams, <em>(note: hover to highlight the record needed)</em>:</strong>
			<?php
				// Printing the name, total number of teams in the clubs.
				foreach ($results as $row) {
					echo "<ul>
						 <li>Club Name: ".$row['name'].
						 " | Number of Teams: ".$row['teamTotal']."</li>
						 </ul>";
				}   
			?>
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
	
	
	
	