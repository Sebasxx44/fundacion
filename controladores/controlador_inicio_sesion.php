<?php 

include_once('databases/db.php');

session_start();

if(!empty($_POST["btn-login"])){

    if (!empty($_POST["name"]) and (!empty($_POST['password'])));

    $name = $_POST['name'];
    $password = $_POST['password'];

    $query = "select * from users where name = '$name' and password = '$password'";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_fetch_array($result);

    $sql = $conn -> query("select * from users where name = '$name' and password = '$password'");

    if ($datos = $sql ->fetch_object()){

        $_SESSION['id'] = $datos -> id;
        $_SESSION['email'] = $datos -> email;
        $_SESSION['name'] = $datos ->name;
        $_SESSION['type_document'] = $datos ->type_document;
        $_SESSION['number_document'] = $datos ->number_document;
        $_SESSION['region'] = $datos ->region;
        $_SESSION['gender'] = $datos ->gender;
        $_SESSION['contact'] = $datos ->contact;
        $_SESSION['date_of_birth'] = $datos ->date_of_birth;


        if($rows['role'] == 1){
            header('Location: index.php');

        }else if($rows['role']== 2){
            header('Location: index-talleristas.php');
        }
        
    }else{

        echo '<div class="alert-login"> Usuario o Contraseña incorrectos</div>';
        session_destroy();
    }
    
    
}else{
}




?>
