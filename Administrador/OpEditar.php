<?php

include("consultaUsuarios.php");
$conexion = connection();

$iduserSystem=$_POST["iduserSystem"];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$tipoDocumento = $_POST['tipoDocumento'];
$numeroDocumento = $_POST['numeroDocumento'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$cargo = $_POST['cargo'];

$sql="UPDATE usersystem SET nombres='$nombres', apellidos='$apellidos', tipoDocumento='$tipoDocumento', numeroDocumento='$numeroDocumento', telefono='$telefono', direccion='$direccion', fechaNacimiento='$fechaNacimiento', cargo='$cargo' WHERE iduserSystem='$iduserSystem'";
$query = mysqli_query($conexion, $sql);

if($query){
    Header("Location: BuscarUsuarios.php");
}else{

}

?>