<?php 

include_once("../databases/db.php"); 
include_once("../includes/header.php");


?>


                              <!-- Navegación -->
<!------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------------------------------------------------->

        <div class="top_users">

            <div class="logo_app">
                <img src="../img/LOGO_TDV.png" alt="">
            </div>

            <div class="img-profile">
                <input type="checkbox" id="check">
                <label class="msg-index" for="check" class="bar-btn">
                    <h3><?php echo $_SESSION['name'] ?> </h3>
                    <img src="../img/unnamed.jpg" alt="">
                </label>

                <ul class="nav-menu">
                    <li class="img-correo"><a href=""><img src="../img/unnamed.jpg" alt=""></a>
                        <h1><?php echo $_SESSION['name']?> </h1><h1><?php echo $_SESSION['email']?></h1></li>
                    <li><a href="profile_users.php"> <i class="fa-solid fa-gear"></i> MI CUENTA</a></li>
                </ul>
            </div>
        </div>


<!---------------------------------------------------------------------------------------------------------->



<!-- Creo un formulario que va a contener todos los inputs en donde se va a diligenciar la información correspondiente-->
<!------------------------------------------------------------------------------------------------------------------------>

<div class="container-create-user_users">
    <?php include_once("../controladores/controlador_save.php")?>
    <div class="card">

        <form  class="form-create_user" action="../controladores/controlador_save.php" method="POST" enctype="multipart/form-data">

    <div class="card-create_user-content">
        <div class="lado_derecho ">

            <div class="form-group">
                <h1>Nombre</h1>
            
                <input type="text" name="name_taller" placeholder="Nombre" class="form-name" autofocus>
            </div>

            <div class="form-group">
                <h1>Creado Por</h1>
                <input type="text" name="created_for" placeholder="Creado Por" class="form-document-type">
            </div>

            <div class="form-group">
                <h1>Región</h1>
                <input type="text" name="region" placeholder="Región" class="form-region">
            </div>

            <div class="form-group">
                <h1>Participantes</h1>
                <input type="text" name="participantes" placeholder="Participantes" class="form-region">
            </div>

        </div>


        <div class="lado_izquierdo">


            <div class="form-group">
                <h1>Añadir informe</h1>
                <input type="file" name="report" class="form-gender">
            </div>

            <div class="form-group">
                <h1>Añadir lista de asistencia</h1>
                <input type="file" name="attendance" class="form-email">
            </div>

            <div class="form-group">
                <h1>Añadir Acta</h1>
                <input type="file" name="record" class="form-contact">
            </div>

            <div class="form-group">
                <h1>Añadir descripción</h1>
                <input type="text" name="description" placeholder=" Añade una breve descripción sobre el taller realizado" class="form-contact">
            </div>

        </div>
    </div>

            <!-- Input que va a accionar el metodo post para hacer el guardado en la base de datos-->

            <input type="submit" class="button-save-user" name="save_taller_user" value="Confirmar">

        </form>
    </div>
</div>

<!---------------------------------------------------------------------------------------------------------->

<?php include("../includes/footer.php");?>