<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de usuarios</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
<?php
    include("conexion.php");
    $consulta="SELECT nombre,password,email FROM usuarios";
    $resultado=$conexionDB->query($consulta);
    //var_dump($resultado);
    $usuarios = array();

    echo"<table class=\"table table-streppet\">
        <tr>
        <th>Nombre</th>
        <th>Password</th>
        <th>Email</th>
        </tr>
        ";

    while($fila = mysqli_fetch_assoc($resultado)){
        $usuarios[] = $fila;
        $nombre = $fila["nombre"];
        $password = $fila["password"];
        $email = $fila["email"];

        echo"<tr>
        <td>$nombre</td>
        <td>$password</td>
        <td>$email</td>
        ";
    }
?>
    
</body>
</html>