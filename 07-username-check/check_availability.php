<?php
	$con =mysqli_connect('localhost','root','','sample5');
	if(!$con){
       die("Failed to connect:" . mysqli_connect_error());
    } 
	if(isset($_POST['type']) == 1){
		$username =$_POST['username'];
		 $query ="SELECT * FROM crud where name ='".$username."' ";
		$result =mysqli_query($con, $query);
		$rowcount=mysqli_num_rows($result);
		if($rowcount >0){
			echo "<span class='status-not-available'> Username Not Available.</span>";
		}else{
			 echo "<span class='status-available'> Username Available.</span>";
		}
	}
?>