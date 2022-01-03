<?php

	session_start();
	include('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DockerApp</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
</head>
<body>

<div class="container">

	<h1> WELCOME TO DOCKER APP </h1>

	<?php
		if (isset($_SESSION['success']) && $_SESSION['success'] !='')
		{
		echo '<div class="alert alert-success" role="alert">
		'.$_SESSION['success'].'</div>';
		unset($_SESSION['success']);
		}

		if (isset($_SESSION['failed']) && $_SESSION['failed'] !='')
		{
		echo '<div class="alert alert-danger" role="alert"> '.$_SESSION['failed'].'</div>';
		unset($_SESSION['failed']);
		}
	?>

	<div class="col-4">
      <input type="hidden" name="">
    </div>
    <div class="col-4">
			<form action="crud.php" method="POST">
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Complete Name: </label>
					<input type="text" class="form-control" id="name" name="name">
				</div>
				<button type="submit" class="btn btn-primary" name ="submit">Submit</button>
		</form>
    </div>
	<div class="col-4">
		<input type="hidden" name="">
    </div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID </th>
				<th>Name </th>
				<th>Action </th>
			</tr>
		</thead>

		<tbody>

		<?php
			$query = "SELECT * FROM name";
			$query_run = mysqli_query($connection,$query);
		?>


		<?php
			if (mysqli_num_rows($query_run) > 0){

				while($row = mysqli_fetch_assoc($query_run)){
		?>


		<tr style="text-transform: capitalize;">
			<td><?php echo htmlspecialchars($row['id']); ?> </td>
			<td><?php echo htmlspecialchars($row['name']); ?> </td>
			<td width="2%">
				<form action ="edit.php" method="post">
					<input  type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
					<button type="submit" name="edit_btn" class="btn btn-success btn-circle"> Edit </button>
				</form>  	
		    </td>
			<td width="2%">
				<form action ="crud.php" method="post">
					<input  type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
					<button type="submit" name="delete_btn" class="btn btn-danger btn-circle"> Delete </button>
				</form>   
            </td>
        </tr>

        <?php
				}
       		}
		?>

		</tbody>

	</table>	
  
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>
</html>

