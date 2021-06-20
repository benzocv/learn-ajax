<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div id="frmCheckUsername">
			<label>Check Username:</label>
			<input name="username" type="text" id="username" class="demoInputBox" onBlur="checkAvailability()"><span id="user-availability-status"></span>    
		</div>
		<p><img src="loder.gif" id="loaderIcon" style="display:none" /></p>
	</div>
</div>

<script type="text/javascript">
function checkAvailability(){
	$("#loaderIcon").show();
	
	$.ajax({
		type:"POST",
		url:"check_availability.php",
		cache:false,
		data:{
			type:1,
			username:$("#username").val(),
		},
		success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide(1000);
		}
	});
}
</script>
</body>
</html>