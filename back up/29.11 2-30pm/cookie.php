<?php
session_start();

if(!$_SESSION['is_registration']){
    
$con=mysqli_connect("localhost","root","","charlottexchange");

$username = $_REQUEST['username'];
$query_uname_result = mysqli_query($con,"SELECT * FROM users WHERE username='$username'") or die(mysqli_error($con));
$query_uname = mysqli_fetch_array($query_uname_result);

$password = $_REQUEST['password'];
$hashed_pass =  password_hash($password, PASSWORD_DEFAULT);
$query_pwd_result = mysqli_query($con,"SELECT pwd FROM users WHERE username='$username'") or die(mysqli_error($con));
$query_pwd = mysqli_fetch_array($query_pwd_result);

echo $password;
if($password == $query_pwd['pwd'])
{
    $_SESSION['login_success'] = TRUE ;
        //include './dashboard.php';

    $_cookie_expiry_time = time()+600;
    setcookie( "userlogin", $username, $_cookie_expiry_time);

}
else{
    exit('Usename/Password combination not found');
}

}

if($_SESSION['login_success'] && ( $username=='administrator' || $username=='Administrator') ){
            header("Location: ./admin.php");
}

else if ($_SESSION['login_success'] && $_SESSION['is_registration']) {
    echo 'Registration success';
    $file = fopen("debug.txt", "a");
    fwrite($file, "Registration success : ");
    fclose($file);
        header("Location: ./index.php");


} else if ($_SESSION['login_success'] && !$_SESSION['is_registration']) {
    //echo 'Login success';
    $file = fopen("debug.txt", "a");
    fwrite($file, "redirecting to /dashboard.php : ");
    fclose($file);
    header("Location: ./dashboard.php");
    exit(0);
    
} else if (!$_SESSION['login_success'] && $_SESSION['is_registration']) {
    echo 'Registration Failed, User exists already ?';
      $file = fopen("debug.txt", "a");
    fwrite($file, "Registration Failed, User exists already ?");
    fclose($file);
} else if (!$_SESSION['login_success'] && !$_SESSION['is_registration']) {
      $file = fopen("debug.txt", "a");
    fwrite($file, "Login Failed");
    fclose($file);
    echo 'Login Failed';
    
}
