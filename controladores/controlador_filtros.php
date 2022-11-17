<?php 
include('../databases/db.php');

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
                    $query .= "WHERE (name LIKE LOWER('%".$aKeyword[0]."%'))";
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
