<!doctype html>
<!-- Assignment11a -->
<!-- Jeremy Swyers -->
<!-- CISS298 Web Programming -->
<!-- May 2 2015 -->

<?php
$conn = mysqli_connect("localhost","root","");
// If connection fails
if (!$conn)
  {
  die('Can not connect: ' . mysqli_connect_error($conn));
  }
// Create a database called student.
$statement = mysqli_query($conn, "CREATE DATABASE cougarinn");
if ($statement)
  echo "Database created successfully";
 

// connect to the student database
$conn = mysqli_connect("localhost","root","", "cougarinn");
if (!$conn)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
// Create table in the student database
mysqli_select_db($conn, "cougarinn");
$statement = "CREATE TABLE reservation 
(
confNum INT NOT NULL,
checkIn VARCHAR(32) NOT NULL,
checkOut VARCHAR(32) NOT NULL,
firstName VARCHAR(32) NOT NULL,
lastName VARCHAR(32) NOT NULL,
roomType ENUM('Standard Non-smoking', 'Double Nonsmoking', 'Standard Smoking', 'Double Smoking'),
PRIMARY KEY (confNum)
)";
$myquery = mysqli_query($conn, $statement);
if ($myquery)
{
  echo "Table created successfully.";
}
else
{
  echo "Error: ".mysqli_error($conn);
}
mysqli_close($conn);
?>


