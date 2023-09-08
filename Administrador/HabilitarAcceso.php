<?php

  require '../db.php';

  $message = '';

  if (!empty($_POST['numeroDocumento']) && !empty($_POST['cargo']) && !empty($_POST['nombreUsuario'])&& !empty($_POST['contrasena'])) {
    $sql = "INSERT INTO userlogin (numeroDocumento, cargo, nombreUsuario, contrasena) VALUES (:numeroDocumento, :cargo, :nombreUsuario, :contrasena)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':numeroDocumento', $_POST['numeroDocumento']);
    $stmt->bindParam(':cargo', $_POST['cargo']);
    $stmt->bindParam(':nombreUsuario', $_POST['nombreUsuario']);
    $password = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
    $stmt->bindParam(':contrasena', $password);
    

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Habilitar Acceso Al Sistema</title>
</head>
<?php include("../head.php"); ?>
<main>
<?php include("../Administrador/Menu.php"); ?>

<div class="contenedor">
  <div class="encabezado">
      <label for="">PERMITIR ACCESO AL SISTEMA</label>
    </div>
    <div class="habilitarAcceso">
      <form id="accesologin" action="HabilitarAcceso.php" method="POST">
        <div class="numero_documento">
          <label for="">NUMERO DE DOCUMENTO</label>
          <input placeholder="Documento de Identidad" type="text" name="numeroDocumento" id="dni">
        <div class="cargo">
          <label for="">CARGO</label>
            <select name="cargo" id="cargo">
              <option value="">Seleccione el cargo</option>
              <option value="Administrador">Administrador</option>
              <option value="Recepcion y ventas">Recepcion y ventas</option>
              <option value="Soporte tecnico">Soporte tecnico</option>
              <option value="Bodega">Bodega</option>
            </select>
        </div>
        </div>
        <div class="nombreUsuario">
          <label for="">NOMBRE DE USUARIO</label>
          <input placeholder="Nombre de Usuario" type="text" name="nombreUsuario" id="user">

        <div class="contraseña">
          <label for="">CONTRASEÑA</label>
          <input placeholder="Contraseña" type="password" name="contrasena" id="pass">
        </div>
        </div>
        <div class="btn2">
          <button id="btnCrearUsuario" onclick="" type="submit">Crear</button>
          <input id="btnCancelar" type="reset" value="Cancelar">
        </div>
      </form>
          <?php if(!empty($message)): ?>
            <p> <?= $message ?></p>
            <?php endif; ?>
    </div>

    <div class="contenedorGenerador">
      <div class="encabezado">
       <label for="">Generador de Contraseña</label>
      </div>
      <div class="generador">
        <label for="">Seleccione la longitud de la contraseña</label>
      </div>
      <div class="contenedorLongitud">
        <input type="range" name="" id="longitudContraseña">
        <input class="generada" type="text" readOnly>
      </div>
      <div class="contraseñaGenerada">
        <button id="btngenerar">Generar</button>
        <button id="btneliminar">Eliminar</button>
        <input type="text" value="" readOnly>
      </div>
      </div>
    </div>
  </div>
</div>
</main>
</html>