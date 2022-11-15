<?php include('databases/db.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ec3c59459.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/LOGO_TDV.png">
    <title>Login</title>
</head>
<body>

    <!-- Container de toda la pagina del login-->


<div class="container-login">

    <div class="container-card-login">

        <!-- Card -->
        <div class="card-login">
            
            <!-- Logo del card-->
            <div class="img-login">
                <img src="img/LOGO_TDV.png" alt="">
            </div>
            
            <!-- Contenido del formulario -->
            <form  class="form-login" action="" method="POST">
                <?php include('controladores/controlador_inicio_sesion.php')?>
                
                <div class="form-group-login">
                    <input type="text" name="name" placeholder="Ingresa tu usuario" class="user-input">
                </div>

                <div class="form-group-login">
                    <input type="password" name="password" placeholder="Ingresa tu contraseña" class="password-input" >
                </div>

                <div class="forgot-password">
                    <a href="/"><h1>¿Has olvidado tu contraseña?</h1></a>
                </div>

                <input type="submit" class="button-login" name="btn-login" value="Ingresar">
            </form>

        </div>
    </div>
</div>
    
</body>
</html>


