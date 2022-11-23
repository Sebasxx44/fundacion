<?php include("databases/db.php")?>

<?php 
session_start();


if(empty($_SESSION['id'])){
    header('Location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Libreria para iconos-->
    <script src="https://kit.fontawesome.com/1ec3c59459.js" crossorigin="anonymous"></script>
    <!-- Libreria para Alertas-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Link del archivo CSS-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Link para importar fuentes de google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <!-- Logo de la aplicación-->
    <link rel="shortcut icon" href="img/LOGO_TDV.png">

    <title>Taller de vida</title>
</head>
<body>

                                        <!-- Navegación -->
<!------------------------------------------------------------------------------------------------->

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

                <ul class="nav-menu_users">
                    <li class="img-correo"><a href=""><img src="img/unnamed.jpg" alt=""></a>
                        <h1><?php echo $_SESSION['name']?> </h1><h1><?php echo $_SESSION['email']?></h1></li>
                    <li><a href="pages/profile_users.php"> <i class="fa-solid fa-user"></i> MI CUENTA</a></li>
                    <li><a href="controladores/controlador_cerrar_sesion.php"> <i class="fa-solid fa-arrow-right-from-bracket"></i> CERRAR SESIÓN</a></li>
                </ul>
            </div>
        </div>


        <?php
            if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
        ?>

    <div class="container-filters_users">

            <!-- BOTON PARA AGREGAR UN NUEVO USUARIO-->

                    <div class="new-user">
                        <a href="pages/create_taller_user.php"><button>Agregar Taller<i class="fa-solid fa-user-plus"></i></button></a>
                    </div>
                
            <!------------------------------------------------------------------------------------------------->
        <form id="form2" name="form2" method="POST" action="index-talleristas.php">
            <div class="container-filters-left"> 


                <!--------------------------------------------------------------------------------------------->
                
                <!-- FILTRO REGIÓN-->
                
                    <div class="region_users">
                        <select id="region" name="region">
                            <?php if ($_POST["region"] != ''){ ?>
                                <option value="<?php echo $_POST["region"]; ?>"><?php echo $_POST["region"]; ?></option>
                            <?php } ?>
                            <option value="">Todos</option>
                            <option value="pereira">Pereira</option>
                            <option value="cali">Cali</option>
                            <option value="dosquebradas">Dosquebradas</option>
                        </select>
                    </div>


                    <div class="creado-desde  calendario">
                        <h1>Creado desde:</h1>
                        <img src="img/calendario.png" alt="">
                    </div>

                    <div class="creado-hasta calendario">
                        <h1>Hasta:</h1>
                        <img src="img/calendario.png" alt="">
                    </div>


                    <div class="reports">
                        <a href="pages/reportes/excel_talleres.php"><img src="../img/excel.png" alt=""></a>
                        <!-- <a href="reportes/pdf.php"><img src="../img/pdf.png" alt=""></a> -->
                    </div>


                <!--------------------------------------------------------------------------------------------->

            </div>
            <!-------------------------------------------------------------------------------------------------->


            <div class="container-filters-right">

                <!-- BUSCADOR-->
                
                <div class="search">
                        <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar nombre del taller" value="<?php echo $_POST["buscar"] ?>" >
                    </div>
                                             
            <!-- BOTON DE BUSQUEDA-->

                <div class="boton_busqueda">
                    <input type="submit" class="btn " value="Buscar">
                </div>                           

            <!--------------------------------------------------------------------------------------------->
            <!-- GENERADOR DE REPORTES EN EXCEL-->
                                        
            </div>

    </div>

           <?php 

                /*FILTRO de busqueda*/


                if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
                    $aKeyword = explode(" ", $_POST['buscar']);

                //SI LOS FILTROS ESTAN VACIOOS, POR DEFECTO SE FILTRARAN TODOS REGISTROS
                if ($_POST["buscar"] == '' AND $_POST['region'] == ''){ 
                    $query ="SELECT * FROM talleres";

                }else{

                // SI EXISTE ALGUN FILTRO, SE BUSCA SI TAMBIEN SE APLICA OTRO FILTRO PARA HACER LA BUSQUEDA

                    $query ="SELECT * FROM talleres ";

                if ($_POST["buscar"] != '' ){ 
                    $query .= "WHERE (name_taller LIKE LOWER('%".$aKeyword[0]."%'))";
                }

                if (isset($_POST['region'])){

                    if ($_POST["region"] != '' ){
                    $query .= " AND region = '".$_POST['region']."' ";
                    }
                }

            }
        
                $sql = $conn->query($query);
                $numeroSql = mysqli_num_rows($sql);
            ?>

            <p class="encontrados_users"> <?php echo $numeroSql; ?> Resultados encontrados</p>
    </form>


       <!-- TABLA -->
       <!---------------------------------------------------------------------------------------------------->


    <div class="container-table_users">
        <table class="content-table">

            <thead>
                <tr>
                    <th >Foto</th>
                    <th> Nombre </th>
                    <th> Creado Por</th>
                    <th> Región </th>
                    <th> Participantes</th>
                    <th> Fecha de creación </th>
                    <th> Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php While($rowSql = $sql->fetch_assoc()) {   ?>
               
                    <tr>
                        <td><a href="pages/visualizar_taller_users.php?id=<?php echo $rowSql['id']?>"><img class="img_perfil" src="img/foto-taller.jpg" ></a></td>
                        <td><?php echo $rowSql["name_taller"]; ?></td>
                        <td><?php echo $rowSql["created_for"]; ?></td>
                        <td><?php echo $rowSql["region"]; ?> </td>
                        <td><?php echo $rowSql["participantes"]; ?> </td>
                        <td><?php echo $rowSql["created_at"]; ?></td>

                        <!-- BOTONES DE EDITAR Y ELIMINAR USURARIO -->

                        <td class="buttons">
                            <div class="mod edit"><a href="pages/edit_taller_user.php?id=<?php echo $rowSql['id']?>"><i class="fa-solid fa-pen-to-square"></i></a></div>
                            <div class="mod delete"><a href="controladores/controlador_delete_taller_users.php?id=<?php echo $rowSql['id']?>"><i class="fa-solid fa-trash"></i></a></div>
                        </td>
                    </tr>
               
               <?php } ?>
            </tbody>
        </table>
    </div>


<?php include("includes/footer.php");?>