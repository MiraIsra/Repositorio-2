<?php
    // insertor.php
    // Importamos la configuración
    require("connector.php");

    // Obtenemos los valores de est_deseado y es_turno
    $query = "SELECT est_deseado, es_turno FROM `estado` ORDER BY id DESC LIMIT 1";
    // Ejecutamos la instrucción
   
    $datos = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($datos)) {
        //$datos = "est_actual:". $row['est_actual']. "/est_deseado:" . $row['est_deseado']. "/" ;
        $es_turno = $row['es_turno'];
        $est_deseado = $row['est_deseado'];
    }

//    echo $es_turno;
  //  echo $est_deseado;
    // Leemos los valores que nos llegan por GET
    $est_actual = mysqli_real_escape_string($con, $_GET['est_actual']);
    
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO estado(est_deseado, est_actual, es_turno, hora) VALUES('".$est_deseado."', '".$est_actual."', '".$es_turno."', now())";
    // Ejecutamos la instrucción
    mysqli_query($con, $query);
    mysqli_close($con);
?>
