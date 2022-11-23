<?php 
include_once("../databases/db.php"); 
include_once("../includes/header.php");
?>

                                        <!-- Navegación -->
<!------------------------------------------------------------------------------------------------->

        <div class="top_users">

            <div class="anterior"> 
                <a href="../index-talleristas.php"><i class="fa-solid fa-arrow-left"></i></a>
            </div>


            <div class="img-profile">
                <input type="checkbox" id="check">
                <label class="msg-index" for="check" class="bar-btn">
                    <h3><?php echo $_SESSION['name'] ?> </h3>
                    <img src="../img/unnamed.jpg" alt="">
                </label>

                <ul class="nav-menu_users">
                    <li class="img-correo"><a href=""><img src="../img/unnamed.jpg" alt=""></a>
                        <h1><?php echo $_SESSION['name']?> </h1><h1><?php echo $_SESSION['email']?></h1></li>
                    <li><a href="profile.php"> <i class="fa-solid fa-user"></i> MI CUENTA</a></li>
                    <li><a href="../controladores/controlador_cerrar_sesion.php"> <i class="fa-solid fa-arrow-right-from-bracket"></i> CERRAR SESIÓN</a></li>
                </ul>
            </div>
        </div>

        <!---------------------------------------------------------------------------------------------->


        <div class="container_profile_users">

            <div class="title_profile">
                <h1>Información de tu cuenta</h1>
            </div>

            <div class="basic_information">
                    <div class="title_information">
                        <h1>Información básica</h1>
                    </div>

                    <div class="photo_basic_information style_basic">
                        <h1>Foto</h1>
                        <h1>Agrega una foto para personalizar tu perfil</h1>
                        <img src="../img/unnamed.jpg" alt="">
                    </div>

                    <div class="name_basic_information style_basic">
                        <h1>Nombre</h1>
                        <h1><?php echo $_SESSION['name']?></h1>
                    </div>

                    <div class="date_basic_information style_basic">
                        <h1>Fecha de nacimiento</h1>
                        <h1><?php echo $_SESSION['date_of_birth']?></h1>
                    </div>

                    <div class="gender_basic_information style_basic">
                        <h1>Genero</h1>
                        <h1><?php echo $_SESSION['gender']?></h1>
                    </div>

                    <div class="region_basic_information style_basic">
                        <h1>Región</h1>
                        <h1><?php echo $_SESSION['region']?></h1>
                    </div>

            </div>

        <!---------------------------------------------------------------------------------------------->


            <div class="contact_information">

                <div class="title_information">
                    <h1>Información de contacto</h1>
                </div>

                <div class="email_contact_information style_basic">
                    <h1>Email</h1>
                    <h1><?php echo $_SESSION['email']?></h1>
                </div>

                <div class="telephone_contact_information style_basic">
                    <h1>Teléfono</h1>
                    <h1><?php echo $_SESSION['contact']?></h1>
                </div>

            </div>



            <div class="private_information">
                <div class="title_information">
                    <h1>Información Personal</h1>
                </div>

                <div class="type_document_private_information style_basic">
                    <h1>Tipo de documento</h1>
                    <h1><?php echo $_SESSION['type_document']?></h1>
                </div>

                <div class="number_document_private_information style_basic">
                    <h1>Numero de documento</h1>
                    <h1><?php echo $_SESSION['number_document']?></h1>
                </div>

            </div>

        </div>

</section>










<?php include('../includes/footer.php');?>
