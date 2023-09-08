<?php 
    include("consultaUsuarios.php");
    $conexion = connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM usersystem WHERE iduserSystem='$id'";
    $query=mysqli_query($conexion, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Editar Usuario</title>
	<style>
th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

th, td {
  padding: 7px;
}

th{
  text-align: left;
}
	</style>
</head>
<?php include("../head.php"); ?>
<main>
<?php include("../Administrador/Menu.php"); ?>

<div class="contenedor">
  <div class="encabezado">
    <label for="">ACTUALIZAR INFORMACION</label>
  </div>
        <form class="tablaUsuarios" id="createuser" action="OpEditar.php" method="POST">
        <input type="hidden" name="iduserSystem" value="<?= $row['iduserSystem']?>">
            <div class="registro">
              <div class="columna1">
                 <div class="nombres">
                   <label for="">Nombres</label>
                   <input placeholder="Nombres" type="text" name="nombres" id="nombres" value="<?= $row['nombres']?>">
                 </div>
                 <div class="apellidos">
                   <label for="">Apellidos</label>
                   <input placeholder="Apellidos"type="text" name="apellidos" id="apellidos"value="<?= $row['apellidos']?>">
                 </div>
                 <div class="contacto">
                   <label for="">Numero de Telefono</label>
                   <input placeholder="Número de telefono" type="tel" name="telefono" id="telefono" value="<?= $row['telefono']?>">
                 </div>
                 <div class="direccion">
                   <label for="">Direccion de Residencia</label>
                   <input placeholder="Direccion de recidencia" type="text" name="direccion" id="direccion" value="<?= $row['direccion']?>">
                 </div>
                 <div class="cargo">
                   <label for="">Cargo</label>
                   <select name="cargo" id="cargo">
                     <option value="<?= $row['cargo']?>">Seleccione el cargo</option>
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
                   <input placeholder="Número de documento"type="text" name="numeroDocumento" id="dni" value="<?= $row['numeroDocumento']?>">
                 </div>
                 <div class="tipo_documento">
                   <label for="">Tipo de Documento</label>
                     <select name="tipoDocumento" id="selectdniuser">
                       <option value="<?= $row['tipoDocumento']?>">Tipo de Documento</option>
                       <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                       <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                       <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                       <option value="Permiso por Protección Temporal">Permiso por Protección Temporal</option>
                     </select>
                 </div>
                 <div class="fechanacimiento">
                  <label for="">Fecha de nacimiento</label>
                   <input placeholder="" type="date" name="fechaNacimiento" id="fechanacimiento" value="<?= $row['fechaNacimiento']?>">
                 </div>
                 </div>
              </div>
            <div class="btnreg">
            <button id="btnactualizar" onclick="" type="submit">Actualizar</button>
            <!-- <input id=""type="button" value="Registrar">-->
            </div>
              </form>
            </div>
</main>
</html>