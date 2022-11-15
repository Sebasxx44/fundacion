<?php 
include('../databases/db.php');



if(!isset($_POST['busqueda'])){

    $_POST['busqueda'] = '';
}

if ($_POST['busqueda'] == ''){
    $_POST['busqueda'] = ' ';
}

$keyword = explode(" ", $_POST['busqueda']);

if ($_POST['busqueda'] == ''){

    $query = 'SELECT * FROM users';

}else{
    $query = 'SELECT * FROM users';
    if($_POST['busqueda'] != ''){
        $query .= "WHERE (name LIKE LOWER('%".$keyword[0]."%')";
    }

}

$sql = $conn-> query($query);

$numrows = mysqli_num_rows($sql);






?>
