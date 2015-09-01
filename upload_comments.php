

<html>
<head>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/alumni.css"></head>
<?php
include './header.php';

include './sidebar.php';
?>

  <body>
    <section>
      <div class="wrapper">
        <form action="./submit_comments.php" method="post" enctype="multipart/form-data">
         <textarea name ="textmsg" rows = "3" cols = "50" placeholder = "Write something"></textarea>
       </br>

       <input name="userfile" type="file" multiple="true" data-show-upload="false" data-show-caption="true" >		   
     </br>
     <input  type="submit" name="upload" value="upload" class = "button" >
   </form>           
 </div> 
</div>  
</section>    
</body> 
<?php
include './footer.php';
?>      
</html>

