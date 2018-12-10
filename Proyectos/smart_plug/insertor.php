<?php
    // insertor.php
    // Importamos la configuración
    require("connector.php");
    // Leemos los valores que nos llegan por GET
    
    $est_actual = mysqli_real_escape_string($con, $_GET['est_actual']);
    $est_deseado = mysqli_real_escape_string($con, $_GET['est_deseado']);
    $es_turno = mysqli_real_escape_string($con, $_GET['es_turno']);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO estado(est_deseado, est_actual, es_turno, hora) VALUES('".$est_deseado."', '".$est_actual."', '".$es_turno."', now())";
    // Ejecutamos la instrucción
    mysqli_query($con, $query);
    mysqli_close($con);
?>
