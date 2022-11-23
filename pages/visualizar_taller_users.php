<?php
include_once('../databases/db.php');
include_once('../includes/header.php');



$id = $_GET['id'];

$query = "select * from talleres where id = $id";
$result = mysqli_query($conn,$query);
$rows = mysqli_fetch_array($result);
$sql = $conn -> query("select * from talleres where id = $id");


if ($datos = $sql ->fetch_object()){

    $_SESSION['id'] = $datos ->id;
    $_SESSION['name_taller'] = $datos ->name_taller;
    $_SESSION['created_for'] = $datos ->created_for;
    $_SESSION['region'] = $datos -> region;
    $_SESSION['participantes'] = $datos -> participantes;
    $_SESSION['created_at'] = $datos -> created_at;
    $_SESSION['description'] = $datos -> description;

}

?>

<!------------------------------------------------------------------------------------------------->


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

<!---------------------------------------------------------------------------------------------------------->
                                            <!-- CONTAINER VISUALIZAR TALLERES -->

    <div class="container_visualizar_talleres_users">
        <section class="first-section">

                                            <!-- TITULO DEL TALLER -->

            <div class="table">
                                            <!-- FOTO DEL TALLER -->

                <img src="../img/foto-taller.jpg" alt="">


                                            <!-- TABLA DE DATOS -->

                <table class="table-visualizar">

                    <thead>
                        <tr>
                            <th> Nombre</th>
                            <th> Creado Por</th>
                            <th> Región </th>
                            <th> Participantes</th>
                            <th> Fecha de creación </th>
                        </tr>
                    </thead>

                    <tbody>
                    
                            <tr>
                                <td><?php echo $_SESSION['name_taller']?></td>
                                <td><?php echo $_SESSION['created_for']?></td>
                                <td><?php echo $_SESSION['region']?></td>
                                <td><?php echo $_SESSION['participantes']?></td>
                                <td><?php echo $_SESSION['created_at']?></td>
                            </tr>
                    </tbody>
                </table>

            </div>

            <div class="colaboradores">
                <h1>Colaboradores <i class="fa-solid fa-chevron-down"></i></h1>
            </div>

        </section>

    <!------------------------------------------------------------------------------------------------------->

        <section class="second-section">

            <div class="archivos"> 
                <div class="informe arc">
                    <h1>informe</h1>
                    <img src="../img/pdf.png" alt="">
                </div>

                <div class="asistencia arc">
                    <h1>Lista de asistencia</h1>
                    <img src="../img/pdf.png" alt="">
                </div>

                <div class="Acta arc">
                    <h1>Acta</h1>
                    <img src="../img/pdf.png" alt="">
                </div>
            </div>
            

            <div class="description">
                <div class="title-description">
                    <h1>Descripción</h1>
                </div>

                <div class="text-description">
                    <h1><?php echo $_SESSION['description']?></h1>
                </div>
            </div>
            
        </section>

    <!------------------------------------------------------------------------------------------------------->


        <section class="third-section">

            <div class="images">

                <div class="title-images">
                    <h1>Fotografias</h1>
                </div>

                <div class="fotografias">
                    <img src="../img/foto-taller.jpg" alt="">
                    <img src="../img/foto-taller.jpg" alt="">
                    <img src="../img/foto-taller.jpg" alt="">
                    <img src="../img/foto-taller.jpg" alt="">
                    <img src="../img/foto-taller.jpg" alt="">

                </div>
            </div>
            
        </section>
    </div>


</section>



<?php include("../includes/footer.php");?>

