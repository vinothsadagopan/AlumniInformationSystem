<?php/*
session_start();
echo $_SESSION['sess_user_id'];
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_username']) || (trim($_SESSION['sess_username']) == '')) {
	header("location: login.php");
	exit();
}*/
?>

<!DOCTYPE>
<html>

<head>
	<meta charset="utf-8" />
	<title>UNCC Alumni</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/alumni.css">
	<div class="wrapper">
		<img class="banner" src="images/bannerWithLogo.png" alt="UNCC Banner">
	</div>
</head>

<body>
<nav class="wrapper">
		<div id="sidebar">
			<ul>
				<li><a href="facultyhome.php">Home</a></li>
				<li><a href="#">News</a></li>
				<li><a href="#">Events</a></li>
			</ul>
		</div>
	</nav>
	<h1>Welcome Faculty</h1>
	<nav class="wrapper">
		<div id="logout">
		<form action="logout.php">
			<input class="buttom" name="submit" id="submit" tabindex="5" value="Logout" type="submit"> 
		</form>
		</div>
	</nav>

	<section>
		<div class="wrapper">
			<div id="main">
				<form action="SearchAction.php">
					Search: <input type="text" />
					<select name="selectCategory" id="">
						<option value="student">Student</option>
					</select>
				</form>
				<br>
				<br>
				<table>
					<tr id="header">
						<td>Name</td>
						<td>Age</td>
						<td>Something</td>
						<td>Something</td>
					</tr>
					<tr>
						<td>Tom Hanks</td>
						<td>50</td>
						<td>blah</td>
						<td>blah</td>
					</tr>
					<tr>
						<td>Tom Cruise</td>
						<td>48</td>
						<td>blah</td>
						<td>blah</td>
					</tr>
				</table>
					
			</div>
		</div>
	</section>

	<div id="footer">
		<footer> 
            <p>&copy; UNCC</p>
        </footer>
	</div>
</body>

</html>