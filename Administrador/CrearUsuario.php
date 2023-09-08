<?php
require '../db.php';

$message = '';

if (!empty($_POST['nombres']) && !empty($_POST['apellidos']) && !empty($_POST['tipoDocumento']) && !empty($_POST['numeroDocumento']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['fechaNacimiento']) && !empty($_POST['cargo'])) {
  $sql = "INSERT INTO usersystem (nombres,apellidos,tipoDocumento,numeroDocumento,telefono,direccion,fechaNacimiento,cargo) VALUES (:nombres,:apellidos,:tipoDocumento,:numeroDocumento,:telefono,:direccion,:fechaNacimiento,:cargo)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':nombres', $_POST['nombres']);
  $stmt->bindParam(':apellidos', $_POST['apellidos']);
  $stmt->bindParam(':tipoDocumento', $_POST['tipoDocumento']);
  $stmt->bindParam(':numeroDocumento', $_POST['numeroDocumento']);
  $stmt->bindParam(':telefono', $_POST['telefono']);
  $stmt->bindParam(':direccion', $_POST['direccion']);
  $stmt->bindParam(':fechaNacimiento', $_POST['fechaNacimiento']);
  $stmt->bindParam(':cargo', $_POST['cargo']);

  if ($stmt->execute()) {
    $message = 'Usuario registrado exitosamente';
    
  } else {
    $message = 'Error al registrar el usuario';
    
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css?v=<?php echo(rand()); ?>">
    <title>Crear Usuario</title>
</head>
<?php include("../head.php"); ?>
<main>
<?php include("../Administrador/Menu.php"); ?>

<div class="bodyBuscador">
     <div class="encabezado">
        <label for="">REGISTRO USUARIO</label>
     </div>
<div class="formRegistro">
        <form id="createuser" action="CrearUsuario.php" method="POST">
          <div class="registro">
             <div class="columna1">
          <div class="nombres">
                 <label for="">Nombres</label>
                 <input placeholder="Nombres" type="text" name="nombres" id="nombres"">
            </div>
            <div class="apellidos">
                 <label for="">Apellidos</label>
                 <input placeholder="Apellidos"type="text" name="apellidos" id="apellidos">
            </div>
            <div class="contacto">
              <label for="">Numero de Telefono</label>
              <input placeholder="Número de telefono" type="tel" name="telefono" id="telefono">
            </div>
            <div class="direccion">
              <label for="">Direccion de Residencia</label>
              <input placeholder="Direccion de recidencia" type="text" name="direccion" id="direccion">
            </div>
            <div class="cargo">
            <label for="">Cargo</label>
               <select name="cargo" id="cargo">
                <option value="Seleccione el cargo">Seleccione el cargo</option>
                <option value="Administrador">Administrador</option>
                <option value="Recepcion y ventas">Recepcion y ventas</option>
                <option value="Soporte tecnico">Soporte tecnico</option>
                <option value="Bodega">Bodega</option>
               </select>
            </div>
          </div>
          <div class="columna2">
            <div class="numero_documento">
                 <label for="">Numero de Documento</label>
                 <input placeholder="Número de documento"type="text" name="numeroDocumento" id="dni">
            </div>
            <div class="tipo_documento">
                 <label for="">Tipo de Documento</label>
                 <select name="tipoDocumento" id="selectdniuser">
                    <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                    <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                    <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                    <option value="Permiso por Protección Temporal">Permiso por Protección Temporal</option>
                </select>
            </div>
            <div class="fechanacimiento">
                <label for="">Fecha de nacimiento</label>
                <input placeholder="" type="date" name="fechaNacimiento" id="fechanacimiento">
            </div>
          </div>
          </div>
            <div class="btnreg">
            <button id="btnregistro" onclick="" type="submit">Registrar</button>
            <!-- <input id=""type="button" value="Registrar">-->
            </div>
        </form>
        <div>
        <?php if(!empty($message)): ?>
           <p id="notifi"><?= $message ?></p>
        <?php endif; ?>
        </div>
     
    </div>
</div>
</main>
</html>