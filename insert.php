<?php
include('db.php');
if(isset($_POST['name']) && isset($_POST['email']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	// echo $name."<br>";
	// echo $email;
	$sql="INSERT INTO user(name,email,created_date,modified_date) VALUES ('$name','$email',now(),now())";
	mysqli_query($conn,$sql);
	header("location:index.php");
}
?>