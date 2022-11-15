<?php 

// Incluyo la base de datos

include ('../databases/db.php');

//Valido si se esta usando el save_user que viene desde el create_user

if (isset($_POST['save_user'])){

//Creo las variables que van a almacenar los valores ingresados en los formularios correspondientes

    $name = $_POST['name'];
    $type_document = $_POST['type_document'];
    $number_document = $_POST['number_document'];
    $region = $_POST['region'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $passsword = $_POST['password'];
    $role = $_POST['role'];

    if($role == ""){
        header('Location: ../pages/create_user.php');
        echo '<div class="alert-login"> Usuario o Contraseña incorrectos</div>';
        
}else{

    


//Hago la consulta en la base de datos, busco la tabla y los valores que quiero insertar

    $query = "INSERT INTO users(name,type_document,number_document,region,date_of_birth, gender, email, contact, password, role)
    VALUES ('$name', '$type_document','$number_document','$region','$date_of_birth','$gender','$email','$contact','$passsword','$role')";

    $result = mysqli_query($conn,$query);

    mysqli_close($conn);

//Si se insertaron los datos correctamente, envio el administrador a la pagina de usuarios

    $_SESSION['message'] = 'Usuario creado correctamente';
    header("Location: ../pages/users.php");
}

}

?>