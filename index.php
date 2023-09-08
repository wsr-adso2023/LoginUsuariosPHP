<?php
session_start();
$notification = isset($_SESSION['notification']) ? $_SESSION['notification'] : '';
unset($_SESSION['notification']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Inicio</title>
</head>
<body>
    <div class="container">
        <div class="containerlogin"> 
             <div class="login">
                 <div class="textlogin">INICIAR SESION</div>
                 <div class="notierror">
                 <?php if(!empty($notification)): ?>
                    <p id="notif" ><?php echo $notification; ?></p>
                            <?php endif; ?>
                            </div>   
                   <div class="formlogin">
                       <form action="auth.php" method="POST" autocomplete="off" >
                            <input id="inputuser" placeholder="USUARIO" required type="text" name="nombreUsuario">
                            <input id="inputpass" placeholder="CONTRASEÑA" required type="password" name="contrasena">
                            <button id="btnlogin" onclick="iniciarSesion()" type="submit">INICIAR SESION</button>
                       </form>
                        <a id="helppass" href="">¿Olvide mi Contraseña?</a>
                   </div>
             </div>
        </div>
        
        <div id="containerinfo">
                 <div id="contact">
                         <label>INFORMACION DE CONTACTO</label>
                         <label>3106578823</label>
                         <label>sifcae_contact@gmail.com</label>
                     </div>
                 <div id="address">
                         <label>DIRECCION</label>
                         <label>Calle 113 7 - 80, Piso 17
                         Bogotá D. C., Colombia</label>
                     </div>
        </div>
    </div>
</body>
</html>