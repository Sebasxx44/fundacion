<?php 

include('../../databases/db.php');
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Reporte_Talleres.xls");

?>

<table class="content-table">

                   
<thead class=>    
    <tr>
    <th>NOMBRE</th>
    <th>CREADO POR</th>
    <th>REGIÓN DE REALIZACIÓN</th>
    <th>PARTICIPANTES</th>
    <th>FECHA DE CREACIÓN</th>

    </tr>
</thead>

<tbody>

<?php
         
$SQL= ("SELECT talleres.id, talleres.name_taller, talleres.created_for, talleres.region, talleres.participantes, talleres.created_at FROM talleres");
$dato = mysqli_query($conn, $SQL);

if($dato -> num_rows > 0){
while($fila=mysqli_fetch_array($dato)){

?>
<tr>
<td><?php echo $fila['name_taller']; ?></td>
<td><?php echo $fila['created_for']; ?></td>
<td><?php echo $fila['region']; ?></td>
<td><?php echo $fila['participantes']; ?></td>
<td><?php echo $fila['created_at']; ?></td>

</tr>


<?php
}
}else{

?>

</div>

<?php

}