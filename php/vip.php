<?php
session_start();

include("conexion.php");
$nombre = $POST["usuario"];
$password = hash("whirlpool",$_POST["password"]);

$statement = "SELECT id,nombre,password FROM usuarios WHERE nombre = '$usuario' AND password = '$password'";

$resultado = $conexionDB->query($statement);
//var_dump($resultado);

if($resultado->num_rows > 0){
    echo "Bienvenid@ ".$usuario;
    session_start();
    $_SESSION["datosUsuario"] = mysqli_fetch_assoc($resultado);
    $_SESSION["nombre"]=$usuario;
}
else{
    echo "Usuario o password incorrectos.";
}



?>