
<?php
include './header.php';
include './footer.php';
include './sidebar.php';
?>

<html>
<head>
<link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/alumni.css">
</head>
<body>
     <div class="container-fluid" style=" margin-left: 10%; margin-right: 40%;">      
            <form action="./submit_comments.php" method="post" enctype="multipart/form-data">
       <textarea name ="textmsg" rows = "3" cols = "30" placeholder = "Write something"></textarea>
</br>

        <div class="form-group" style="margin-right: 45%;">
<input name="userfile" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">		   
        </div>
      <div class="form-group" >
	  </br>
            <input  type="submit" class="btn btn-primary" name="upload" value="upload" >
        </div>
    </form>           
        </div>       
    </body>       
</html>
 
 