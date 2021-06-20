<!doctype html>
<html>
<head lang="en">
<meta charset="utf-8">
<title>Ajax File Upload with jQuery and PHP</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">

<div class="col-md-8">

<h1><a href="#" target="_blank">Ajax File Uploading with Database MySql</a></h1>
<hr> 
<input id="uploadImage" type="file" accept="image/*" name="image" class="uploadimg"/>
<input id="uploadImage1" type="file" accept="image/*" name="image1" class="uploadimg" />

<div id="err"></div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
    $('.uploadimg').on('change', function() {
        console.log("test");
    var file_data = $(this).prop('files')[0];   
    var form_data = new FormData();
    var ext = $(this).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png','jpg','jpeg']) == -1)   {
        alert("only jpg and png images allowed");
        return;
    }  
    var picsize = (file_data.size);
    console.log(picsize); /*in byte*/
    if(picsize > 2097152) /* 2mb*/
        {
            alert("Image allowd less than 2 mb")
            return;
        }
    form_data.append('file', file_data);   
    $.ajax({
        url: 'upload.php', /*point to server-side PHP script */
        dataType: 'text',  /* what to expect back from the PHP script, if anything*/
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(res){
           console.log(res);
        }
     });
});
})

</script>
</body></html>
    