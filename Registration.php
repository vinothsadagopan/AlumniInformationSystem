
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>UNCC Alumni</title>
	<link rel="stylesheet" href="css/alumni.css">
		<link rel="stylesheet" href="css/main.css">
</head>

<body>
<?php include 'header.php'; ?>

	<div class="wrapper">
				<div id="head">
				<h1 style="color: #006435"> UNC Charlotte Alumni Registration</h1>	
				</div>			
			<div id="registration">
    		<form action="sucessfull.php" method="POST"> 
    			<input name="Reg_flag" type="hidden" value="0" />
    			<table id="regtable">
    			<tr><td><label for="first name">First Name</label> </td>
    			<td><input id="first name" name="F_Name" placeholder="First name" required="" type="text"> </td>	</tr>
				
				<tr><td><label for="middle name">Middle Name</label> </td>
    			<td><input id="middle name" name="M_Init" placeholder="Middle name" required="" type="text"> </td>	</tr>

    			<tr><td><label for="name">Last Name</label> </td>
    			<td><input id="last name" name="L_Name" placeholder="Last name" required="" type="text"> </td>	</tr>
    			
				<tr><td><label for="email">Email</label> </td>
    			<td><input id="email" name="Email_Id" placeholder="example@domain.com" required="" type="email"> </td>	</tr>
		
				<tr><td><label for="username">Create a Username</label> </td>
    			<td><input id="username" name="User_Id" placeholder="Username" required="" type="text"> </td>	</tr>
    			 
                <tr><td><label for="password">Create a Password</label> </td>
    			<td><input type="password" id="Password" name="Password" placeholder="Password" required=""> </td>	</tr>
				
                <tr><td><label for="repassword">Confirm your Password</label> </td>
    			<td><input type="password" id="password" name="repassword" placeholder="Re-enter Password" required=""></td>	</tr>
				
				</table>
				<br><input class="buttom" name="submit" id="submit" value="Sign up!" type="submit"> 	 

				
			</form> 
			</div>	      
      
	</div>
</body>
</html>
