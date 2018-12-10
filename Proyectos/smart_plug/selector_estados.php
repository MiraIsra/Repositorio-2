<?php
    // selector.php
    // Importamos la configuración
    require("connector.php");
    //echo "Estoy aqui";
    if (!$con) {
        die ("Could not connect: " . mysqli_error ());
    }
    //echo "Voy a hacer la query";
//    $query = "SELECT DISTINCT id_enchufe, es_turno, hora FROM `estado` WHERE est_actual = 1 AND hora BETWEEN (now()) AND (now() - INTERVAL 9 MINUTE) ORDER BY id DESC";
    $query = "SELECT est1.id_enchufe as id_enchufe, est1.est_actual as est_actual, est1.est_deseado as est_deseado, est1.es_turno as es_turno, est1.hora as hora ". 
		."FROM `estado` as est1 ".
		."INNER JOIN ".
		."(SELECT DISTINCT MAX(id) AS id, id_enchufe FROM `estado` GROUP BY id_enchufe ORDER BY id DESC) as est2 ".
		."ON est1.id = est2.id";

    $id_enchufe = array();
    $est_actual = array();
    $est_deseado = array();
    $es_turno = array();
    $hora = array();

    // Ejecutamos la instrucción
    $datos = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($datos)) {
        echo $row['id_enchufe']. "/" . $row['est_actual']. "/" . $row['est_deseado']. "/" . $row['es_turno']. "/". $row['hora']. "/" ;
        //$datos = "est_actual:". $row['est_actual']. "/est_deseado:" . $row['est_deseado']. "/" ;
        $id_enchufe[] = $row['id_enchufe'];
	$est_actual[] = $row['est_actual'];
	$est_deseado[] = $row['est_deseado'];
        $es_turno[] = $row['es_turno'];
        $hora[] = $row['hora'];
    }
    //echo $est_actual;
    //echo "/";
    //echo $est_deseado;

    mysqli_close($con);
?>

