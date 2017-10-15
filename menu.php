<!DOCTYPE html>

<html>

<head>
	<link rel = "stylesheet" type = "text/css" href = "css/menuTheme.css">
	<?php
		session_start();

		if($_SESSION['loggedin'] == false) {
			header('Location: loginForm.html');
		}
	?>
	
	<style>
	
		.footer {
			border: 0px solid black;
			text-align: center;
			font-style: italic;
			font-size: 12px;
			color: #696969;
			float: bottom;
			margin: auto;
		}
		
		#hr2 {				
			margin-left: 7em;
			margin-right: 7em;
		}
		
	</style>
	
</head>

<body>
	<?php
		echo '
		<ul>
			<li><a href="task1.php">Task 1</a></li>
			<li><a href="task2.php">Task 2</a></li>
			<li><a href="task3.php">Task 3</a></li>
			<li><a href="task4.php">Task 4</a></li>
			<li class = "logout"><a class = "aLogout" href="logout.php">Log Out</a></li>
		</ul>';
	?>
	
	<div class = "description">
		<h3>(Description)</h3>
		<p><strong>Taks 1:</strong> Displays forenames, surnames and dates of birth of all female members in the club ‘C01’.
		<p><strong>Task 2:</strong> Displays in an unordered list the club name and the total number of teams (3 or more) in each club.
		<p><strong>Task 3:</strong> Displays a dropdown list input with club details that retrieves the selected team matches details.
		<p><strong>Task 4:</strong> Displays the selected team from task 3 dropdown list and retrieves all its matches details.
	</div>
	
	<div class = "footer">
			<hr id = "hr2">
			<footer>
				Database Management
			</footer>
		</div>
</body>

</html>


