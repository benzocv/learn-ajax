<?php
	session_start();
	error_reporting(0);
	include 'database.php';
	if($_POST["type"]==2){
		    $phone=$_POST['phone'];
			$result = mysqli_query($connection,"SELECT * FROM otp WHERE phone='$phone'");
			$row  = mysqli_fetch_array($result);
			if(is_array($row)){
				$authKey = "53ApW6gJgEr5a019b18";
				$mobileNumber = $phone;
				$senderId = "ABCDEF";
				$rndno=rand(100000, 999999);
				$message = urlencode("otp number.".$rndno);
				$route = "route=4";
				$postData = array(
					'authkey' => $authKey,
					'mobiles' => $mobileNumber,
					'message' => $message,
					'sender' => $senderId,
					'route' => $route
				);
				$url="https://control.msg91.com/api/sendhttp.php";
				/* init the resource */
				$ch = curl_init();
				curl_setopt_array($ch, array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => $postData
					/*,CURLOPT_FOLLOWLOCATION => true */
				));
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				/* get response */
				$output = curl_exec($ch);
				/* Print error if any */
				if(curl_errno($ch))
				{
					echo 'error:' . curl_error($ch);
				}
				curl_close($ch);
				$_SESSION['otp']=$rndno;
				echo json_encode(array("statusCode"=>200));
			}
			else{ 
				echo "Mobile number not exist !";
			}
	}
	if($_POST["type"]==3){
		if($_POST["otp"]==$_SESSION['otp']){
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
	}
?>