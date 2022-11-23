<?php  include_once('../databases/db.php');

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

    header('Location: ../index-talleristas.php');

}

?>