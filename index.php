<!DOCTYPE html>
<html>
<head>
	<title>MySQL Table Viewer</title>
</head>
<body>
	<h1>MySQL Table Viewer</h1>
	<?php
		// Define database connection variables
		$servername = "mysqlserverprj2.mysql.database.azure.com";
		$username = "myappadmin";
		$password = "LqNJ3625*";
		$dbname = "employees";
		$dbport = "3306";

		// Create database connection
		$conn = mysqli_connect($servername, $username, $password, $dbname, $dbport);

		// Check connection
		if ($conn->connect_error) {
			echo "Game Over";
			die("Connection failed: " . $conn->connect_error);
		}
		echo "Connection successfull";
		// Query database for all rows in the table
		$sql = "SELECT * FROM employees";
		//$result = $conn->query($sql);
		if ($result=mysqli_query($con,$sql)){
			if ($result->num_rows > 0) {
				// Display table headers
				echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
				// Loop through results and display each row in the table
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["emp_no"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["email_id"] . "</td></tr>";
				}
				echo "</table>";
			} else {
				echo "0 results";
			}
		} else {
			echo "No Rows";
		}
		
			
		// Close database connection
		$conn->close();
	?>
</body>
</html>
