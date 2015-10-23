<!doctype html>
<!-- Assignment11a -->
<!-- Jeremy Swyers -->
<!-- CISS298 Web Programming -->
<!-- May 2 2015 -->


<?php

$userPass = $_POST['password'];
$userName = $_POST['userName'];

$fileName = 'c:\data\student.txt';

if(isset($_POST["submitButton"]))
{
	$myFile = file_get_contents($fileName);
	
		if((strpos($myFile, $userName) !==False) && (strpos($myFile, $userPass) !==False)){
			setCookie("login", "$userName", time()+ 600);
			header("Location: admin.html");
		}
			else
				header("Location: cougarinn.html");
		
		
}
?>