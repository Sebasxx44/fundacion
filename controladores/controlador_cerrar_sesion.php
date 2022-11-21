<?php 

include_once('../databases/db.php');

session_start();
session_destroy();
header('Location: ../login.php');


?>