<?php 

include('../../databases/db.php');
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Reporte_Usurarios.xls");

?>

<table class="content-table">

                   
<thead class=>    
    <tr>
    <th>NOMBRE</th>
    <th>TIPO DE DOCUMENTO</th>
    <th>NUMERO DE DOCUMENTO</th>
    <th>REGION</th>
    <th>GENERO</th>
    <th>EMAIL</th>
    <th>CONTACTO</th>
    <th>ROL</th>

    </tr>
</thead>

<tbody>

<?php
         
$SQL="SELECT users.id, users.name, users.type_document, users.number_document, users.region, users.gender, 
users.email, users.contact, roles.role FROM users LEFT JOIN roles ON users.role = roles.id ";
$dato = mysqli_query($conn, $SQL);

if($dato -> num_rows > 0){
while($fila=mysqli_fetch_array($dato)){

?>
<tr>
<td><?php echo $fila['name']; ?></td>
<td><?php echo $fila['type_document']; ?></td>
<td><?php echo $fila['number_document']; ?></td>
<td><?php echo $fila['region']; ?></td>
<td><?php echo $fila['gender']; ?></td>
<td><?php echo $fila['email']; ?></td>
<td><?php echo $fila['contact']; ?></td>
<td><?php echo $fila['role']; ?></td>

</tr>


<?php
}
}else{

?>

</div>

<?php

}