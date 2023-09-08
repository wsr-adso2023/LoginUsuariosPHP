<?php
include('consultaUsuarios.php');
$conexion = connection();

$consulta = "SELECT * FROM usersystem";
$mysql = mysqli_query($conexion, $consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Crear Usuario</title>
</head>
<?php include("../head.php"); ?>
<main>
<?php include("../Administrador/Menu.php"); ?>

<div class="bodyBuscador">
<table class="tablaUsuarios">
  <div class="encabezado">
    <label for="">USUARIOS REGISTRADOS</label>
  </div>
  <tr>
    <th>ID</th>
    <th>NOMBRES</th>
    <th>APELLIDOS</th>
    <th>TIPO DOCUMENTO</th>
	  <th>N° DOCUMENTO</th>
    <th>TELEFONO</th>
    <th>DIRECCION</th>
	  <th>FECHA NACIMIENTO</th>
    <th>CARGO</th>
    <th></th>
    <th></th>
  </tr>
        <?php
          while ($row = mysqli_fetch_assoc($mysql)): ?>
        <tr>
          <td class=""><?= $row['iduserSystem'] ?></td>
          <td><?= $row['nombres'] ?></td>
          <td><?= $row["apellidos"] ?></td>
          <td><?= $row["tipoDocumento"] ?></td>
          <td><?= $row["numeroDocumento"] ?></td>
          <td><?= $row["telefono"] ?></td>
          <td><?= $row["direccion"] ?></td>
          <td><?= $row["fechaNacimiento"] ?></td>
          <td><?= $row["cargo"] ?></td>

          <td><a class="editar" href="EditarUsuario.php?id=<?= $row['iduserSystem'] ?>">Editar</a></td>
          <td><a class="eliminar" href="EliminarUsuario.php?id=<?= $row['iduserSystem'] ?>">Eliminar</a></td>
        </tr>
        <?php endwhile; ?>
</table>
</div>
</main>
</html>