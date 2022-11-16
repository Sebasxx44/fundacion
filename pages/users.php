<?php include("../databases/db.php")?>

<?php 
session_start();
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
    <link rel="stylesheet" href="../css/style.css">
    <!-- Link para importar fuentes de google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <!-- Logo de la aplicación-->
    <link rel="shortcut icon" href="../img/LOGO_TDV.png">

    <title>Taller de vida</title>
</head>
<body>

                              <!-- Navegación -->
<!------------------------------------------------------------------------------------------------->

                                        <!-- Navegación -->
<!------------------------------------------------------------------------------------------------->

<nav class="close">
        <div class="logo-name">

            <div class="logo-image">
                <img src="../img/LOGO_TDV.png" alt="">
            </div>

            <span class="logo_name">Taller de vida</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="">
                    <i class="fa-solid fa-users"></i>
                    <span class="link-name">Talleristas</span>
                </a></li>

                <li><a href="talleres.php">
                    <i class="fa-solid fa-book-open"></i>
                    <span class="link-name">Talleres</span>
                </a></li>

                <li><a href="reportes.php">
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


                                                        <!-- Botones - Filtros-->
        <!------------------------------------------------------------------------------------------------->

            <?php
                if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
                if (!isset($_POST['buscadepartamento'])){$_POST['buscadepartamento'] = '';}
                if (!isset($_POST['color'])){$_POST['color'] = '';}
                if (!isset($_POST['buscafechadesde'])){$_POST['buscafechadesde'] = '';}
                if (!isset($_POST['buscafechahasta'])){$_POST['buscafechahasta'] = '';}
                if (!isset($_POST['buscapreciodesde'])){$_POST['buscapreciodesde'] = '';}
                if (!isset($_POST['buscapreciohasta'])){$_POST['buscapreciohasta'] = '';}
                if (!isset($_POST["orden"])){$_POST["orden"] = '';}
            ?>

    <div class="container-filters">
            <!-- BOTON PARA AGREGAR UN NUEVO USUARIO-->

                    <div class="new-user">
                        <a href="create_user.php"><button>Agregar Tallerista <i class="fa-solid fa-user-plus"></i></button></a>
                    </div>
                
            <!------------------------------------------------------------------------------------------------->
        <form id="form2" name="form2" method="POST" action="users.php">
            <div class="container-filters-left"> 


                <!--------------------------------------------------------------------------------------------->
                
                <!-- FILTRO REGIÓN-->
                
                    <div class="region">
                            <select id="assigned-tutor-filter" id="region" name="region">
                                <?php if ($_POST["region"] != ''){ ?>
                                    <option value="<?php echo $_POST["region"]; ?>"><?php echo $_POST["region"]; ?></option>
                                    <?php } ?>
                                <option value="">Todos</option>
                                <option value="pereira">Pereira</option>
                                <option value="cali">Cali</option>
                                <option value="dosquebradas">Dosquebradas</option>
                            </select>
                        </div>
                        <!--------------------------------------------------------------------------------------------->
                        
                        <!-- FILTRO ESTADO-->
                        
                        <div class="state">
                            <select id="subject-filter" id="state" name="state">
                                <?php if ($_POST["state"] != ''){ ?>
                                    <option value="<?php echo $_POST["state"]; ?>"><?php echo $_POST["state"]; ?></option>
                                    <?php } ?>
                                    <option value="">Todos</option>
                                    <option value="active">Activo</option>
                                    <option value="inactive">Inactivo</option>
                            </select>
                        </div>
                            <!--------------------------------------------------------------------------------------------->
                            <!-- BUSCADOR-->
                
                        <div class="search">
                                <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar Nombre" value="<?php echo $_POST["buscar"] ?>" >
                        </div>

            </div>
            <div class="container-filters-right">
                                             
            <!-- BOTON DE BUSQUEDA-->

                <div class="boton_busqueda">
                    <input type="submit" class="btn " value="Buscar">
                </div>                           

            <!--------------------------------------------------------------------------------------------->
            <!-- GENERADOR DE REPORTES EN EXCEL-->
                                        
                <div class="reports">
                    <a href="reportes/excel.php"><img src="../img/excel.png" alt=""></a>
                    <!-- <a href="reportes/pdf.php"><img src="../img/pdf.png" alt=""></a> -->
                </div>
            </div>

    </div>
            <!--------------------------------------------------------------------------------------------->


            <?php 

                /*FILTRO de busqueda*/


                if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
                    $aKeyword = explode(" ", $_POST['buscar']);

                //SI LOS FILTROS ESTAN VACIOOS, POR DEFECTO SE FILTRARAN TODOS REGISTROS
                if ($_POST["buscar"] == '' AND $_POST['region'] == '' AND $_POST['state'] == ''){ 
                    $query ="SELECT * FROM users";

                }else{

                // SI EXISTE ALGUN FILTRO, SE BUSCA SI TAMBIEN SE APLICA OTRO FILTRO PARA HACER LA BUSQUEDA

                    $query ="SELECT * FROM users ";

                if ($_POST["buscar"] != '' ){ 
                    $query .= "WHERE (name LIKE LOWER('%".$aKeyword[0]."%'))";
                }

                if (isset($_POST['region'])){

                    if ($_POST["region"] != '' ){
                    $query .= " AND region = '".$_POST['region']."' ";
                    }
                }

                if (isset($_POST['state'])){

                    if ($_POST["state"] != '' ){
                        $query .= " AND state = '".$_POST["state"]."' ";
                    } 
                }
            }
        

                $sql = $conn->query($query);
                $numeroSql = mysqli_num_rows($sql);
            ?>

            <p class="encontrados"> <?php echo $numeroSql; ?> Resultados encontrados</p>
    </form>


                <!------------------------------------------------------------------------------------------------->



    <!-- TABLA -->

    <div class="container-table">
        <table class="content-table">
            <thead>
                <tr>
                    <th > Perfil</th>
                    <th> Nombre </th>
                    <th> Tipo de docuemento</th>
                    <th> Numero de documento </th>
                    <th> Región </th>
                    <th> Genero </th>
                    <th> Email</th>
                    <th> Contacto </th>
                    <th> Rol </th>
                    <th> Estado </th>
                    <th> Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php While($rowSql = $sql->fetch_assoc()) {   ?>
               
                    <tr>
                        <td><img class="img_perfil" src="../img/unnamed.jpg" alt=""></td>
                        <td><?php echo $rowSql["name"]; ?></td>
                        <td><?php echo $rowSql["type_document"]; ?></td>
                        <td><?php echo $rowSql["number_document"]; ?></td>
                        <td><?php echo $rowSql["region"]; ?> </td>
                        <td><?php echo $rowSql["gender"]; ?></td>
                        <td><?php echo $rowSql["email"]; ?></td>
                        <td><?php echo $rowSql["contact"]; ?></td>
                        <td><?php echo $rowSql["role"]; ?></td>
                        <td><?php echo $rowSql["state"]; ?></td>

                        <!-- BOTONES DE EDITAR Y ELIMINAR USURARIO -->

                        <td class="buttons">
                            <div class="mod edit"><a href="../controladores/controlador_edit_user.php?id=<?php echo $rowSql['id']?>"><i class="fa-solid fa-pen-to-square"></i></a></div>
                            <div class="mod delete"><a href="../controladores/controlador_delete_user.php?id=<?php echo $rowSql['id']?>"><i class="fa-solid fa-trash"></i></a></div>
                        </td>
                    </tr>
               
               <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<script src="../js/js.js"></script>

<?php include("../includes/footer.php");?>