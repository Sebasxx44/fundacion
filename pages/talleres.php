<?php 
include_once("../databases/db.php"); 
include_once("../includes/header.php");

?>


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
                <li><a href="../pages/users.php">
                    <i class="fa-solid fa-users"></i>
                    <span class="link-name">Talleristas</span>
                </a></li>

                <li><a href="">
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

            <!------------------------------------------------------------------------------------------------->


        <?php
            if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
        ?>

    <div class="container-filters">

            <!-- BOTON PARA AGREGAR UN NUEVO USUARIO-->

                    <div class="new-user">
                        <a href="create_taller.php"><button>Agregar Taller<i class="fa-solid fa-user-plus"></i></button></a>
                    </div>
                
            <!------------------------------------------------------------------------------------------------->
        <form id="form2" name="form2" method="POST" action="talleres.php">
            <div class="container-filters-left"> 


                <!--------------------------------------------------------------------------------------------->
                
                <!-- FILTRO REGIÓN-->
                
                    <div class="region">
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


                <!--------------------------------------------------------------------------------------------->
                <!-- BUSCADOR-->
                
                    <div class="search">

                        <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar nombre del taller" value="<?php echo $_POST["buscar"] ?>" >

                    </div>

            </div>
            <!-------------------------------------------------------------------------------------------------->


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

            <p class="encontrados"> <?php echo $numeroSql; ?> Resultados encontrados</p>
    </form>


       <!-- TABLA -->
       <!---------------------------------------------------------------------------------------------------->


    <div class="container-table">
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
                        <td><a href="visualizar_taller.php?id=<?php echo $rowSql['id']?>"><img class="img_perfil" src="../img/foto-taller.jpg" ></a></td>
                        <td><?php echo $rowSql["name_taller"]; ?></td>

                        <td><?php echo $rowSql["created_for"]; ?></td>
                        <td><?php echo $rowSql["region"]; ?> </td>
                        <td><?php echo $rowSql["participantes"]; ?> </td>
                        <td><?php echo $rowSql["created_at"]; ?></td>

                        <!-- BOTONES DE EDITAR Y ELIMINAR USURARIO -->

                        <td class="buttons">
                            <div class="mod edit"><a href="edit_taller.php?id=<?php echo $rowSql['id']?>"><i class="fa-solid fa-pen-to-square"></i></a></div>
                            <div class="mod delete"><a href="../controladores/controlador_delete_taller.php?id=<?php echo $rowSql['id']?>"><i class="fa-solid fa-trash"></i></a></div>
                        </td>
                    </tr>
               
               <?php } ?>
            </tbody>
        </table>
    </div>
</section>



<!---------------------------------------------------------------------------------------------------- -->



<?php include("../includes/footer.php");?>