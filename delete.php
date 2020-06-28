<?php include('connection.php');
	if (isset($_GET['id'])) 
	{
		$id = $_GET['id'];

		$delete = mysqli_query($con,"DELETE from tblproject where id='$id'");
		if ($delete) 
		{
			header('location:index.php');
		}
	}
 ?>
