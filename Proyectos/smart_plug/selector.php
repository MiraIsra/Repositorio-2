<?php
    // selector.php
    // Importamos la configuración
    require("connector.php");
    //echo "Estoy aqui";
    if (!$con) {
        die ("Could not connect: " . mysqli_error ());
    }
    //echo "Voy a hacer la query";
    $query = "SELECT est_actual, est_deseado, es_turno, hora FROM `estado` ORDER BY id DESC LIMIT 1";
    // Ejecutamos la instrucción
    //echo "Query";
    //echo $query;
    $datos = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($datos)) {
        echo $row['est_actual']. "+" . $row['est_deseado']. "+" .$row['es_turno']. "+" ;
        //$datos = "est_actual:". $row['est_actual']. "/est_deseado:" . $row['est_deseado']. "/" ;
        $hora = $row['hora'];
        $est_actual = $row['est_actual'];
        $est_deseado = $row['est_deseado'];
    }
    //echo $est_actual;
    //echo "/";
    //echo $est_deseado;

    mysqli_close($con);
?>
