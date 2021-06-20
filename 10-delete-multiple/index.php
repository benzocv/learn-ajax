<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>View data</h2>
	<table class="table table-bordered table-sm" >
    <thead>
      <tr>
		<th><input type="checkbox" id="select_all"> Select </th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
		<th>City</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody id="table">
      
    </tbody>
  </table>
	<div class="row">
		<div class="col-md-2 well">
		<span class="rows_selected" id="select_count">0 Selected</span>
		<a type="button" id="delete_records" class="btn btn-primary pull-right">Delete</a>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	$.ajax({
		url: "view.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
			$('#table').html(dataResult); 
		}
	});
	/* delete selected records*/
	$('#delete_records').on('click', function(e) {
		var employee = [];
		$(".emp_checkbox:checked").each(function() {
			employee.push($(this).data('emp-id'));
		});
		if(employee.length <=0) {
			alert("Please select records."); 
		} 
		else { 
			WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";
			var checked = confirm(WRN_PROFILE_DELETE);
			if(checked == true) {
				var selected_values = employee.join(",");
				$.ajax({
					type: "POST",
					url: "delete_ajax.php",
					cache:false,
					data: 'id='+selected_values,
					success: function(response) {
						/* remove deleted employee rows*/
						var ids = response.split(",");
						for (var i=0; i < ids.length; i++ ) {	
							$("#"+ids[i]).remove(); 
						}	
					} 
				});
			} 
		} 
	});
});	
$(document).on('click', '#select_all', function() {
	$(".emp_checkbox").prop("checked", this.checked);
	$("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
});
$(document).on('click', '.emp_checkbox', function() {
	if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) {
	$('#select_all').prop('checked', true);
	} else {
	$('#select_all').prop('checked', false);
	}
	$("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
});
</script>
</body>
</html>
