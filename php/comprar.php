<?php
    session_start();

    include("conexion.php");

    if($_POST["paquete1"]>0){
         $idUsuario = $_SESSION["datosUsuario"]["id"];
        $lugares = $_POST["paquete1"];

        $statementVerificarDuplicados = "SELECT * FROM usuarios_paquetes
                                          WHERE idUsuario = $idUsuario
                                          AND paquete = 1";
        $resultadoVerificarDuplicados = $conexionDB->query($statementVerificarDuplicados);
        $duplicados = $resultadoVerificarDuplicados->num_rows;
        
        if($duplicados == 0){
            $statement = "INSERT INTO usuarios_paquetes (idUsuario, paquete, lugares)
            VALUES($idUsuario, 1, $lugares)";
            $resultado = $conexionDB->query($statement);
            echo "resultado de insertar paquete 1: ".$resultado;
        }
    }

    if($_POST["paquete2"]>0){
        $idUsuario = $_SESSION["datosUsuario"]["id"];
       $lugares = $_POST["paquete2"];

       $statementVerificarDuplicados = "SELECT * FROM usuarios_paquetes
                                         WHERE idUsuario = $idUsuario
                                         AND paquete = 2";
       $resultadoVerificarDuplicados = $conexionDB->query($statementVerificarDuplicados);
       $duplicados = $resultadoVerificarDuplicados->num_rows;
       
       if($duplicados == 0){
           $statement = "INSERT INTO usuarios_paquetes (idUsuario, paquete, lugares)
           VALUES($idUsuario, 2, $lugares)";
           $resultado = $conexionDB->query($statement);
           echo "resultado de insertar paquete 2: ".$resultado;
       }
   }

   if($_POST["paquete3"]>0){
    $idUsuario = $_SESSION["datosUsuario"]["id"];
   $lugares = $_POST["paquete3"];

   $statementVerificarDuplicados = "SELECT * FROM usuarios_paquetes
                                     WHERE idUsuario = $idUsuario
                                     AND paquete = 3";
   $resultadoVerificarDuplicados = $conexionDB->query($statementVerificarDuplicados);
   $duplicados = $resultadoVerificarDuplicados->num_rows;
   
   if($duplicados == 0){
       $statement = "INSERT INTO usuarios_paquetes (idUsuario, paquete, lugares)
       VALUES($idUsuario, 3, $lugares)";
       $resultado = $conexionDB->query($statement);
       echo "resultado de insertar paquete 3: ".$resultado;
   }
}

echo "<p>Lugares comprados<p>";

echo"<p>".$_POST["paquete1"]."</p>";
echo"<p>".$_POST["paquete2"]."</p>";
echo"<p>".$_POST["paquete3"]."</p>";

echo"<p>Usuario que hizo la operacion</p>";
echo"<p>".$_SESSION["datosUsuarios"]["id"]."</p>";

?>