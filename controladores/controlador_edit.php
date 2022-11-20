<?php  include_once('../databases/db.php');


                                                            // CONTROLADOR EDIT USER


if (isset($_POST['update'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $type_document = $_POST['type_document'];
    $number_document = $_POST['number_document'];
    $region = $_POST['region'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    //$role = $_POST['role'];
    $state = $_POST['state'];


    // Creo la consulta a la base de datos para hacer el update a los campos que le estan mandando.

    $query = "UPDATE users SET name = '$name', type_document = '$type_document', number_document = '$number_document',
    region = '$region', date_of_birth = '$date_of_birth', gender = '$gender', email = '$email', contact = '$contact', password = '$password', /* role = '$role'*/ state = '$state' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    
    //Si el update se realizo correctamente, se envia al usuario a la tabla de los usuarios

    header('Location: ../pages/users.php');

}


// -------------------------------------------------------------------------------------------------------------------------------------------
                                                            // CONTROLADOR EDIT TALLER




if (isset($_POST['update_taller'])){
    
    $id = $_GET['id'];
    $name = $_POST['name_taller'];
    $created_for = $_POST['created_for'];
    $region = $_POST['region'];
    $participantes = $_POST['participantes'];
    $description = $_POST['description'];

    // Creo la consulta a la base de datos para hacer el update a los campos que le estan mandando.

    $query = "UPDATE talleres SET name_taller = '$name', created_for = '$created_for', region = '$region',
    participantes = '$participantes', description = '$description' WHERE id = $id";
    $resultado = mysqli_query($conn, $query);

    //Si el update se realizo correctamente, se envia al usuario a la tabla de los usuarios

    header('Location: ../pages/talleres.php');

}

?>