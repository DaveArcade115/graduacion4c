<?php

    session_start();
    if(isset($_SESSION["nombre"])){
        echo "Bienvenido al area de miembros del club.";
    }
    else{
        header("Location:login.php");
    }

?>