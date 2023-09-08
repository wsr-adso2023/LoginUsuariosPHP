<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: Panel/Administador.php");
}

require 'db.php';
// Validar accion en boton iniciar sesion
if (!empty($_POST['nombreUsuario']) && !empty($_POST['contrasena'])) {
    $records = $conn->prepare('SELECT iduserlogin, nombreUsuario, contrasena FROM userlogin WHERE nombreUsuario = :nombreUsuario');
    $records->bindParam(':nombreUsuario', $_POST['nombreUsuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (is_countable($results) > 0 && password_verify($_POST['contrasena'], $results['contrasena'])) {
      $_SESSION['user_id'] = $results['iduserlogin'];
      header("Location: Panel/Administrador.php");
    } else {
      $_SESSION['notification'] = 'Usuario o contraseña incorrecto';
      header("Location: index.php");
    }
  }
?>

