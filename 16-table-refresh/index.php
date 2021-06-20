<!DOCTYPE html>
<html>
<title>Ajax Without Refresh</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style>
table, th, td {
 border: 1px solid black;
 border-collapse: collapse;
}
</style>
<body>

<button class="refresher">Refresh table</button>
<table id="table-to-refresh">
<thead>
<tr>
<th>First Name</th>
<th>Last Name</th>
</tr>
</thead>
<tbody>
<tr>
<td>John</td>
<td>Deo</td>
</tr>
</tbody>
</table>

<script type="text/javascript">
$(document).ready(function () {
$(document).on('click', '.refresher', function () {
$.ajax({
url: 'get_table.php',
method: "GET",
dataType: 'json',
success: function(response) {
   $('#table-to-refresh').html(response);
}
});
});
});
</script>
</body>
</html>