<?php 

include('../databases/db.php');

session_start();
session_destroy();
header('Location: ../login.php');


?>