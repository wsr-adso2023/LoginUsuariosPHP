<?php

include("consultaUsuarios.php");
$conexion = connection();

$id=$_GET["id"];

$sql="DELETE FROM usersystem WHERE iduserSystem='$id'";
$query = mysqli_query($conexion, $sql);

if($query){
    Header("Location: BuscarUsuarios.php");
}else{

}

?>