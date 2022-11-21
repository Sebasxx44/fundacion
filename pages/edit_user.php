<?php 
include_once("../databases/db.php"); 
include_once("../includes/header.php");

?>


<!-- Navegador de la aplicacion-->
<!---------------------------------------------------------------------------------------------------------->

<nav class="close">
        <div class="logo-name">

            <div class="logo-image">
                <img src="../img/LOGO_TDV.png" alt="">
            </div>

            <span class="logo_name">Taller de vida</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="fa-solid fa-users"></i>
                    <span class="link-name">Talleristas</span>
                </a></li>

                <li><a href="#">
                    <i class="fa-solid fa-book-open"></i>
                    <span class="link-name">Talleres</span>
                </a></li>

                <li><a href="#">
                    <i class="fa-solid fa-download"></i>
                    <span class="link-name">Reportes</span>
                </a></li>

            </ul>

            <ul class="logout">
                <li><a href="../controladores/controlador_cerrar_sesion.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="link-name">Cerrar sesión</span>
                </a></li>
            </ul>
        </div>
    </nav>
<!---------------------------------------------------------------------------------------------------------->

<section class="dashboard">

        <!-- BARRA SUPERIOR (NAV)-->

        <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>

            <div class="img-profile">
                <input type="checkbox" id="check">
                <label class="msg-index" for="check" class="bar-btn">
                    <h3><?php echo $_SESSION['name'] ?> </h3>
                    <img src="../img/unnamed.jpg" alt="">
                </label>

                <ul class="nav-menu">
                    <li class="img-correo"><a href="#"><img src="../img/unnamed.jpg" alt=""></a>
                        <h1><?php echo $_SESSION['name']?> </h1><h1><?php echo $_SESSION['email']?></h1></li>
                    <li><a href="profile.php"> <i class="fa-solid fa-gear"></i> MI CUENTA</a></li>
                </ul>
            </div>
        </div>

<!----------------------------------------------------------------------------------------------------------------->


<?php

if (isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_array($result);

        $name = $row['name'];
        $type_document = $row['type_document'];
        $number_document = $row['number_document'];
        $region = $row['region'];
        $date_of_birth = $row['date_of_birth'];
        $gender = $row['gender'];
        $email = $row['email'];
        $contact = $row['contact'];
        $password = $row['password'];
        $role = $row['role'];
        $state = $row['state'];

    }

}

?>


<!---------------------------------------------------------------------------------------------------------->


<div class="container-create-user">
    <div class="card">

    <!-- Creo un formulario que va a contener todos los inputs en donde se va a editar la información-->

        <form  class="form-create_user" action="../controladores/controlador_edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

        <div class="card-create_user-content">
        <div class="lado_derecho ">

            <div class="form-group">
                <h1>Nombre</h1>
                <input type="text" name="name" placeholder="Nombre" class="form-name" value="<?php echo $name?>">
            </div>

            <div class="form-group">
                <h1>Tipo de documento</h1>
                <input type="text" name="type_document" placeholder="Tipo de documento" class="form-document-type" value="<?php echo $type_document?>">
            </div>

            <div class="form-group">
                <h1>Numero de documento</h1>
                <input type="text" name="number_document" placeholder="Numero de documento" class="form-document-number"value="<?php echo $number_document?>">
            </div>

            <div class="form-group">
                <h1>Región</h1>
                <input type="text" name="region" placeholder="Región" class="form-region"value="<?php echo $region?>">
            </div>

            <div class="form-group">
                <h1>Fecha de nacimiento</h1>
                <input type="text" name="date_of_birth" placeholder="Fecha de nacimiento" class="form-date_of_birth" value="<?php echo $date_of_birth?>">
            </div>

        </div>


        <div class="lado_izquierdo">


            <div class="form-group">
                <h1>Genero</h1>
                <input type="text" name="gender" placeholder="Genero" class="form-gender" value="<?php echo $gender?>">
            </div>

            <div class="form-group">
                <h1>Email</h1>
                <input type="text" name="email" placeholder="Email" class="form-email" value="<?php echo $email?>">
            </div>

            <div class="form-group">
                <h1>Contacto</h1>
                <input type="text" name="contact" placeholder="Numero de contacto" class="form-contact" value="<?php echo $contact?>">
            </div>

            <div class="form-group">
                <h1>Contraseña</h1>
                <input type="text" name="password" placeholder="Actualiza la contraseña" class="form-password" value="<?php echo $password?>">
            </div>

            <div class="form-group">
                <h1>Estado</h1>
                <input type="state" name="state" placeholder="Estado" class="form-password" value="<?php echo $state?>">
            </div>

        </div>
    </div>


            <!-- Input que va a accionar el metodo post para hacer el guardado en la base de datos-->

            <input type="submit" class="button-save-user" name="update" value="Confirmar cambios">

        </form>
    </div>
</div>
</section>


<script src="../js/js.js"></script>
<?php include('../includes/footer.php')?>


