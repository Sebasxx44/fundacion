<?php 

// Incluyo la base de datos

include_once ('../databases/db.php');




                                                //CONTROLADOR SAVE USER

if (isset($_POST['save_user'])){


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
        echo '<div class="alert-login"> Faltan campos por llenar</div>';
        
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

//-----------------------------------------------------------------------------------------------------------------------------------------

                                                //CONTROLADOR SAVE TALLER

if (isset($_POST['save_taller'])){


     $name = $_POST['name_taller'];

     $created_for = $_POST['created_for'];
     $region = $_POST['region'];
     $participantes = $_POST['participantes'];
     $description = $_POST['description'];


    if (isset($_FILES['report'])){
    move_uploaded_file($_FILES['report']['tmp_name'], '../public/reports/'.$_FILES['report']['name']);
    $report = '../public/reports/'.$_FILES['report']['name'];
    }

    if (isset($_FILES['attendance'])){
        move_uploaded_file($_FILES['attendance']['tmp_name'], '../public/attendance/'.$_FILES['attendance']['name']);
        $attendance = '../public/attendance/'.$_FILES['attendance']['name'];
    }

    if (isset($_FILES['record'])){
        move_uploaded_file($_FILES['record']['tmp_name'], '../public/record/'.$_FILES['record']['name']);
        $record = '../public/record/'.$_FILES['record']['name'];
    }


    $query = "INSERT INTO talleres(name_taller,created_for,region,participantes,description,report,attendance,record) 

    VALUES ('$name','$created_for','$region','$participantes','$description','$report','$attendance','$record')";

    $result = mysqli_query($conn,$query);

    mysqli_close($conn);

    header("Location: ../pages/talleres.php");

}

?>