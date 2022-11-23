<?php 
include_once("../databases/db.php"); 
include_once("../includes/header.php");

?>


<!-- Navegador de la aplicacion-->
<!---------------------------------------------------------------------------------------------------------->

        <div class="top_users">

            <div class="logo_app">
                <img src="img/LOGO_TDV.png" alt="">
            </div>

            <div class="img-profile">
                <input type="checkbox" id="check">
                <label class="msg-index" for="check" class="bar-btn">
                    <h3><?php echo $_SESSION['name'] ?> </h3>
                    <img src="img/unnamed.jpg" alt="">
                </label>

                <ul class="nav-menu">
                    <li class="img-correo"><a href=""><img src="img/unnamed.jpg" alt=""></a>
                        <h1><?php echo $_SESSION['name']?> </h1><h1><?php echo $_SESSION['email']?></h1></li>
                    <li><a href="pages/profile.php"> <i class="fa-solid fa-gear"></i> MI CUENTA</a></li>
                </ul>
            </div>
        </div>

<!----------------------------------------------------------------------------------------------------------------->

<?php

if (isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM talleres WHERE id = $id";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_array($result);

        $name = $row['name_taller'];
        $created_for = $row['created_for'];
        $region = $row['region'];
        $participantes = $row['participantes'];
        $description = $row['description'];

    }

}

?>

<!---------------------------------------------------------------------------------------------------------->

<div class="container-create-user_users">
    <div class="card">

    <!-- Creo un formulario que va a contener todos los inputs en donde se va a editar la información-->

        <form  class="form-create_user" action="../controladores/controlador_edit_users.php?id=<?php echo $_GET['id']; ?>" method="POST">

        <div class="card-create_user-content">
        <div class="lado_derecho ">

            <div class="form-group">
                <h1>Nombre</h1>
                <input type="text" name="name_taller" placeholder="Nombre" class="form-name" value="<?php echo $name?>">
            </div>

            <div class="form-group">
                <h1>Creado Por</h1>
                <input type="text" name="created_for" placeholder="Creado Por" value="<?php echo $created_for?>">
            </div>

            <div class="form-group">
                <h1>Región</h1>
                <input type="text" name="region" placeholder="Región" value="<?php echo $region?>">
            </div>

            <div class="form-group">
                <h1>Participantes</h1>
                <input type="text" name="participantes" placeholder="Participantes" value="<?php echo $participantes?>">
            </div>

        </div>


        <div class="lado_izquierdo">

            <div class="form-group">
                <h1>Añadir descripción</h1>
                <input type="text" name="description" placeholder=" Añade una breve descripción sobre el taller realizado" value="<?php echo $description?>">
            </div>

        </div>
    </div>

            <!-- Input que va a accionar el metodo post para hacer el guardado en la base de datos-->

            <input type="submit" class="button-save-user" name="update_taller" value="Confirmar cambios">

        </form>
    </div>
</div>
</section>


<script src="../js/js.js"></script>
<?php include('../includes/footer.php')?>


