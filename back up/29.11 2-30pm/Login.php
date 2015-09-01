
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Log-in</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <h1>Log-in</h1><br>
  <form action='check_login.php' method='POST'>
    <input type="text" name="User_Id" placeholder="Username">
    <input type="password" name="Password" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>

  <div class="login-help">
    <a href="Registration.html">Register</a> • <a href="#">Forgot Password</a>
  </div>
</div>

</body>

</html>