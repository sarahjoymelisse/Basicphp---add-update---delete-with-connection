<?php include('connection.php'); ?>
<?php 
	if (isset($_GET['id'])) 
	{
		$id = $_GET['id'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tutorial</title>
</head>
<body>
	<form method="post" action="#">
	<?php 
		$ret = mysqli_query($con,"SELECT * from tblproject where id ='$id'");
		$fetch = mysqli_fetch_array($ret);
	 ?>
	Firstname: <input type="text" name="fname" value='<?php echo $fetch['fname']; ?>'><br>
	Lastname: <input type="text" name="lname" value="<?php echo $fetch['lname']; ?>">
	<input type="submit" name="update">
</form>
</body>
</html>

<?php 
	if (isset($_POST['update'])) 
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];

		$update = mysqli_query($con,"UPDATE tblproject set fname='$fname', lname='$lname' where id = '$id'");
		if ($update) 
		{
			header('location:index.php');
		}
	}
}
 ?>
