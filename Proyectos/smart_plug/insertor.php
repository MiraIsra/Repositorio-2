<?php
    // insertor.php
    // Importamos la configuración
    require("connector.php");
    // Leemos los valores que nos llegan por GET
    
    $est_actual = mysqli_real_escape_string($con, $_GET['est_actual']);
    $est_deseado = mysqli_real_escape_string($con, $_GET['est_deseado']);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO estado(est_deseado, est_actual, hora) VALUES('".$est_deseado."', '".$est_actual."', now())";
    // Ejecutamos la instrucción
    mysqli_query($con, $query);
    mysqli_close($con);
?>
