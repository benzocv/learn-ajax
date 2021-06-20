<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
$(document).on('click','#save',function(e) {
    var data = $("#form-search").serialize();
    $.ajax({
         data: data,
         type: "post",
         url: "save.php",
         success: function(data){
              alert(data);
         }
	});
});
</script>
</head>
<body>
	<form action="" id="form-search">
	  First name: <input type="text" name="FirstName" value="Mickey"><br>
	  Last name: <input type="text" name="LastName" value="Mouse"><br>
	</form>
	<button id="save" name="save">Serialize form values</button>
</body>
</html>
  