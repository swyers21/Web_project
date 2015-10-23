<!doctype html>
<!-- Class Project -->
<!-- Jeremy Swyers -->
<!-- CISS298 Web Programming -->
<!-- May 16 2015 -->

<html>
<meta charset = "utf-8">
<head><title>Reservations</title></head>
<body>
<?php
// set up connection with the database
    $conn = mysqli_connect('localhost', 'root', '', 'cougarinn');
    if (!$conn) // if connection failed
    {
		die ("Unable to connect to database: ".mysqli_connect_error());
    }
		//submit reservation button submitting data into database
		
		if(isset($_POST['checkReservation']))
		{
			$statement = "SELECT * FROM reservation";
			$result = mysqli_query($conn, $statement);
		
			//checking query
			
			if($result)
			{
				echo "<table border = '2'>";
				while($row = mysqli_fetch_object($result))
				{
					echo"<tr>";
					echo"<td>$row->confNum</td>";
					echo"<td>$row->firstName</td>";
					echo"<td>$row->lastName</td>";
					echo"<td>$row->roomType</td>";
					echo"<td>$row->checkIn</td>";
					echo"<td>$row->checkOut</td>";
					echo "</tr>";
				}
				echo "</table>";
			} 
					else
				{
					echo "There was a problem pulling up the Reservations.";
		
				}
		}	
	mysqli_close($conn);
	
	

?>
</body>
</html>