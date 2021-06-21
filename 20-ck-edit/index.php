<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>
$(document).ready(function(){
  $("#save").click(function(){
    var Content = CKEDITOR.instances['Content'].getData();
            $.ajax({
url: "save.php",
type: "POST",
data: {
Content: Content
},
cache: false,
success: function(dataResult){
var dataResult = JSON.parse(dataResult);
if(dataResult.statusCode==200){

$('#success').html('Data Saved successfully !');
}
else if(dataResult.statusCode==201){
  alert("Error occured !");
}

}
});
  });
  CKEDITOR.replace('Content');
});
</script>
</head>
<body>
<textarea name="content" id="Content" placeholder="Required, at least 4 characters"></textarea><br>
<button type="button" id="save">Save</button>
</body>
</html>


  