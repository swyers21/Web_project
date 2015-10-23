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
		
		if(isset($_POST['submitReservation']))
		{
			$userFirst = $_POST['firstName'];
			$userLast = $_POST['lastName'];
			$room = $_POST['roomType'];
			$cid = $_POST['checkIn'];
			$cod = $_POST['checkOut'];
			$confNum = rand();
			
			$statement = "INSERT INTO reservation (confNum, firstName, lastName, roomType, checkIn, checkOut) 
						  VALUES ('$confNum', '$userFirst', '$userLast', '$room', '$cid', '$cod')";
		
			//checking query
			
			if(mysqli_query($conn, $statement))
			{
				echo "Your conformation number is: $confNum";
		
			} 
					else
				{
					echo "There was a problem saving your data.";
		
				}
		}	
	
	
	if (isset($_POST['cancelReservation']))
	{  
		$confNumber = $_POST['conformation'];
	
		$sql = "DELETE FROM reservation WHERE confNum= '$confNumber'";
		$result = mysqli_query($conn, $sql);

		if($result)
		{			
			echo "Reservation Cancelled";	
		}
		else{
				echo  "Nothing was deleted.";
			}
	}
	
	if (isset($_POST['changeReservation']))
	{
		$confNum2 = $_POST['conformation2'];
		$changeCID = $_POST['checkIn2'];
		$changeCOD = $_POST['checkOut2'];
		$changeRT = $_POST['roomType2'];
		
		$changeSql = "UPDATE reservation SET roomType = '$changeRT',
											 checkIn = '$changeCID',
											 checkOut = '$changeCOD'
					WHERE confNum = '$confNum2'";
		$change = mysqli_query($conn, $changeSql);
		
		if($change)
		{
			echo "Reservation Changed";
		}
			else
			{
				echo "Nothing was changed";
			}
	
	}

?>
</body>
</html>


	

