<?php
include 'connect.php';
if(isset($_POST['sub'])){
	$f=$_POST['fname'];
	$l=$_POST['lname'];
	$e=$_POST['mail'];
	$c=$_POST['city'];
 
	//code for image uploading
	if($_FILES['f1']['name']){
		move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']);
		$img="image/".$_FILES['f1']['name'];
	}
 
	$i="insert into register(firstname,lastname,email,city,image)values('$f','$l','$e','$c','$img')";
		if(mysqli_query($conn, $i)){
		echo "inserted successfully..!";
	}
}
?>

<html>
	<head>
	<meta charset="UTF-8">
	<title>User Registration Form</title>
	</head>
	<body>
	<link rel="stylesheet" href="style.css">
		<form method="POST" enctype="multipart/form-data">
            <h1>User Registration Form</h1>
			<table>
				<tr>
					<td>
						Firstname
						<input type="text" name="fname">
					</td>
				</tr>
				<tr>
					<td>
						Lastname
						<input type="text" name="lname">
					</td>
				</tr>
				<tr>
					<td>
						email
						<input type="text" name="mail">
					</td>
				</tr>
				<tr>
					<td>
					city
						<select name="city">
							<option value="">Select</option>
							<option value="kanpur">kanpur</option>
							<option value="lucknow">lucknow</option>
							<option value="pune">pune</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Image
						<input type="file" name="f1">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="submit" name="sub">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>