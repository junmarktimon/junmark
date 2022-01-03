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

	<h1> Update Name </h1>


	<div class="col-4">
      <input type="hidden" name="">
    </div>
    <div class="col-4">

    <?php

        if(isset($_POST['edit_btn'])){

            $id = mysqli_real_escape_string($connection, $_POST['edit_id']);

            $query = "SELECT * FROM name WHERE id ='$id' LIMIT 1";
                $query_run = mysqli_query($connection,$query);

                foreach ($query_run as $row) {
    ?>
			<form action="crud.php" method="POST">
                <input type="hidden" name ="edit_id" value="<?php echo $row['id']; ?>">
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Complete Name: </label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
				</div>
				<button type="submit" class="btn btn-primary" name ="update">Update</button>
		</form>

        <?php
                }
            }
        ?>
    </div>
	<div class="col-4">
		<input type="hidden" name="">
    </div>

	
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>
</html>

