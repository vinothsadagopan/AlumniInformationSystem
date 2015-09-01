<!doctype HTML>
<html>
<head>
	<meta charset="utf-8" />
	<title>UNCC Alumni</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/alumni.css">
</head>

<body>
	
	<?php include 'header.php'; ?>

	<?php include 'sidebar.php'; ?>

	<section>
		<div class="wrapper">
			<div id="main">
				<form action="SearchAction.php">
					Search: <input type="text" />
					<select name="selectCategory" id="">
						<option value="student">Student</option>
						<option value="faculty">Faculty</option>
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

	<footer>
		<div class="wrapper"></div>
	</footer>


</body>

</html>