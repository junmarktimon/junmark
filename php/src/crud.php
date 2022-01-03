<?php

session_start();

include('config.php'); 



if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($connection, $_POST['name']);




    $query = "INSERT INTO name (name) VALUES ('$name')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)

    {

    $_SESSION['success'] = "Added Successfully";
    header('Location: index.php');

    }else{

    $_SESSION['failed'] = "Error Adding Data!";
    header('Location: index.php');
    }
}


//code for deleting customer data
if(isset($_POST['delete_btn'])){

    $rid = $_POST['delete_id'];
    

    $query = "DELETE FROM name WHERE id ='$rid' LIMIT 1";


    $query_run = mysqli_query($connection,$query);

    if($query_run){
           
        $_SESSION['success'] = "Data Deleted Successfully";
        header("Location: index.php");

    }else{
        $_SESSION['failed'] = "Error Deleting Data";
        header("Location: index.php");
    }
}





//code for updating resident data
if(isset($_POST['update'])){

    $id = $_POST['edit_id'];
    
    $name = mysqli_real_escape_string($connection,$_POST['name']);

    if(!empty($name)){


        $query = "UPDATE name SET name='$name' WHERE id ='$id' LIMIT 1";

        $query_run = mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['success'] = "Data Updated Successfully";
            header('Location: index.php');
        }
        else
        {
            $_SESSION['failed'] = "Error Updating Data";
            header('Location: index.php');

        }   
    }
}



?>