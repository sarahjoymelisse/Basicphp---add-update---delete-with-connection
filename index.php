<?php include('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tutorial</title>
</head>
<body>
<form method="post" action="index.php">
	Firstname: <input type="text" name="fname"><br>
	Lastname: <input type="text" name="lname">
	<button name="add" type="submit">Add</button><br><br>

	<input type="text" name="que"><button type="submit" name="search">Search</button>
</form>
<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th colspan="2">Action</th>
		</tr>
	</head>
	<body>
		<?php 
			if (isset($_POST['search'])) 
			{
				$que = $_POST['que'];
				$search = mysqli_query($con,"SELECT * from tblproject where fname LIKE '%$que%' or lname LIKE '%$que%'");
				while ($fetchsearch = mysqli_fetch_array($search)) 
				{
					$id = $fetchsearch['id'];
					?>
					<tr>
					<td><?php echo $fetchsearch['id']; ?></td>
					<td><?php echo $fetchsearch['fname']; ?></td>
					<td><?php echo $fetchsearch['lname']; ?></td>
					<td><a href="update.php?id=<?php echo $id; ?>">Update</a></td>
					<td><a href="delete.php?id=<?php echo $id; ?>">Delete</a></td>
				</tr>
					<?php
				}
			}else
			{
			$retrieve = mysqli_query($con,"SELECT * from tblproject");
			while ($fetch = mysqli_fetch_array($retrieve)) 
			{
				$id = $fetch['id'];
		 ?>
		<tr>
			<td><?php echo $fetch['id']; ?></td>
			<td><?php echo $fetch['fname']; ?></td>
			<td><?php echo $fetch['lname']; ?></td>
			<td><a href="update.php?id=<?php echo $id; ?>">Update</a></td>
			<td><a href="delete.php?id=<?php echo $id; ?>">Delete</a></td>
		</tr>
	<?php }
			}
		 ?>
	</tbody>
</table>
</body>
</html>

<?php 
	if (isset($_POST['add']))
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];

		$insert = mysqli_query($con,"INSERT into tblproject(fname,lname) values('$fname','$lname')");
		if ($insert) 
		{
			?>
			<script type="text/javascript">alert('Insert Success!')</script>
			<?php
			header('location:index.php');
		}
	}
 ?>
