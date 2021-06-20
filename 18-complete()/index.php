<!DOCTYPE html>
<html>
 
<head>
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
   
    <script>
        $(document).ready(function() {
            $(document).ajaxComplete(function() {
                alert(" AJAX request completes.");
            });
            $("button").click(function() {
                $("#paragraph").load("demo.txt");
            });
        });
    </script>
   
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
 
<body>
    <div id="div_content">
        <h1 style="color: green;">
          Students Tutorial
      </h1>
        <p id="paragraph"
           style="font-size: 20px;">
            A Web Tutorial for students
        </p>
    </div>
    <button>Change Content</button>
</body>
 
</html>