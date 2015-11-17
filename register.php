<html>
<head>
	<title>Register
	</title>
	<style>
	body{
		background-color:lightblue;
	}
	h1{
		color:brown;
		font-style:Verdana;
		
	}
	table{
		border:1px black dashed;
	}
	</style>
</head>

<?php
require('config.php');
?>

<?php
if(isset($_POST['submit'])){
	//perform the form verification
	$name=$_POST['name'];
	$password=$_POST['password'];
	
	$name  = mysql_escape_string($_POST['name']);
	$password  = mysql_escape_string($password);
	
	
	$sql = "SELECT * from login where user_name = '$name'";
	// Perform Query
	$res = mysql_query($sql);
	if (!$res) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $sql;
		die($message);
	}
	if(mysql_num_rows($res)>0){
		echo "<h1 align=center>Sorry, Username already exists!</h1>";
		exit();
	}
	 $query = mysql_query("INSERT INTO login (user_name,password) VALUES ('$name','$password')");
	if($query){
		echo "<h1 align=center>You have successfully registered.<br/>Thank you.</h1><br />";
	}
       
	
}else{?>
<body>
<h1 align=center>Register Here</h1>
	<form action="register.php" method="POST">
	<table align=center><tr><td>
	Name:</td><td><input type="text" name="name" required /></td></tr>
	
	<tr><td>Password:</td><td><input type="password" name="password" required /></td></tr>
	<tr>
	<tr><td><button type="submit" name="submit">Register</button></td> 
	<td align="right"><a href="user_login_session.php"><u>Already Registered?</u></a></td></tr></table>        
	</form>
</body>
<?php }
?>