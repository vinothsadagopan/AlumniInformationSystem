<?php include 'dbconnect.php'?>
<?php
session_start();
?>

<html>

<head>
	<meta charset="utf-8" />
	<title>UNCC Alumni</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/alumni.css">
</head>

<body>
<div class="wrapper">
	<img class="banner" src="images/bannerWithLogo.png" alt="UNCC Banner">
</div>
<nav class="wrapper">
		<div id="sidebar">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Alumni</a></li>
				<li><a href="#">News</a></li>
				<li><a href="#">Events</a></li>
				<li><a href="#">Donate</a></li>
			</ul>
		</div>
	</nav>

	<section>
		<div class="wrapper">
			<div id="main">
				<form  name="approveregistration" action="staffhome.php" method="POST">
					<input type="hidden" id  ="$firstname" name="$firstname"/>
					<input type="hidden" id="$lastname" name="$lastname"/>
					<table>
					<tbody>
					<tr id="header">
						<td>FirstName,LastName</td>
						<td>Status</td>
						<?php
						
							$sql = "SELECT F_Name,L_Name, Reg_flag FROM Person where Reg_flag=0"; 
							$q = mysql_query ( $sql); 	
							while($row = mysql_fetch_array($q))
							{
								$firstname = $row['F_Name'];
								$lastname = $row['L_Name'];
								$flag=$row['Reg_flag'];
								$str=$firstname.$lastname;
								//echo $str;
								//echo $flag;
								if($flag == 0)
								{
						?>
									<tr>
										<td><?php echo $firstname,$lastname; ?></td>
										<td><input type="submit" name="<?php echo $str; ?>" value="accept" onclick="document.getElementById('$firstname').value='<?php echo $firstname; ?>';document.getElementById('$lastname').value='<?php echo $lastname; ?>';"></td>
									</tr>
						<?php 
								}
								if(isset($_POST['$firstname']))
								{

									$sql = "UPDATE Person SET Reg_flag=1 where F_Name='".$_POST['$firstname']."' and L_Name='".$_POST['$lastname']."'";
									echo $sql;
									$r = mysql_query ($sql);
								}
							}
 						
 						?> 
						
					
						
						</tbody>
					</table>
					
				</form>
			</div>
		</div>
	</section>
</body>
</html>