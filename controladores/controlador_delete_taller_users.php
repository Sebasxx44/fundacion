<?php  
include_once('../databases/db.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM talleres WHERE id = $id";
    $result = mysqli_query($conn,$query);

    if (!$result){
        die('Query Failed');
    }

    header("Location: ../index-talleristas.php");
}


?>