<?php  include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h1 class="text-center my-3">CRUD with Procedure</h1>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
<?php
	if(isset($_GET['id']))
	{ 
		$id=$_GET['id'];
		$sql="SELECT * FROM user WHERE id='$id'";
		$query=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($query);
		?>
		<!-- update form -->
		<form method="POST" action="update.php">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<input type="" name="name" placeholder="Enter Username" class="form-control" value="<?php echo $row['name']; ?>"><br>
			<input type="" name="email" placeholder="Enter Email" class="form-control" value="<?php echo $row['email']; ?>"><br>
			<button class="btn btn-dark">UPDATE</button>
		</form>

	<?php }else{ ?>
		<!-- insert form -->
		<form method="POST" action="insert.php">
			<input type="" name="name" placeholder="Enter Username" class="form-control"><br>
			<input type="" name="email" placeholder="Enter Email" class="form-control"><br>
			<button class="btn btn-dark">INSERT</button>
		</form>
	<?php } ?>

			
		</div>
	</div>
	<div class="row mt-2">
		<table class="table table-bordered table-striped"> 
			<tr class="bg bg-dark text-white">
				<th>ID</th>
				<th>Username</th>
				<th>Email</th>
				<th>Created_Data</th>
				<th>Modified Date</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
<?php
	$sql="SELECT * FROM user";
	$query=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($query))
	{ ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['created_date']; ?></td>
			<td><?php echo $row['modified_date']; ?></td>
			<td><a href="?id=<?php echo $row['id']; ?>" class="btn btn-danger">Edit</a></td>
			<td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-dark">Delete</a></td>
		</tr>
<?php } ?>
			
		</table>
	</div>
</div>
</body>
</html>