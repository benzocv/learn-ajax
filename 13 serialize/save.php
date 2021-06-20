<?php
	include 'database.php';
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
if(isset($_POST['save'])){
	$sql = "INSERT INTO `crud`( `FirstName`, `LastName`) 
	VALUES ('$FirstName','$LastName')";
	if (mysqli_query($conn, $sql)) {
		echo "Succeess !";
	} 
	else {
	    echo "Error !";
	}
	mysqli_close($conn);
}
?>