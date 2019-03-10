<?php
    // selector.php
    // Importamos la configuración
    require("connector.php");
    //echo "Estoy aqui";
    if (!$con) {
        die ("Could not connect: " . mysqli_error ());
    }

    $query1 = "SELECT COUNT(DISTINCT id_maquina) as n_maq FROM `Consumos`";
    $maquinas = mysqli_query($con, $query1);
    $maq_data = mysqli_fetch_array($maquinas)['n_maq'];
    //echo "maquinas:" . $maq_data;
    //echo "Voy a hacer la query";
    $query = "SELECT id, timestamp, id_maquina, id_modo, fase1, fase2, fase3, ciclos FROM `Consumos` ORDER BY id DESC LIMIT ". $maq_data;
    // Ejecutamos la instrucción
    //echo "done";
    //echo $query;
    $datos = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($datos)) {
        //echo $row['timestamp']. "+" . $row['id_maquina']. "+" .$row['id_modo']. "+"  .$row['fase1']. "+"  .$row['fase2']. "+"  .$row['fase3']. "-" ;
        //$datos = "est_actual:". $row['est_actual']. "/est_deseado:" . $row['est_deseado']. "/" ;
        $id_maquina = $row['id_maquina'];
	$time = $row['timestamp'];
        $id_modo = $row['id_modo'];
        $fase1 = $row['fase1'];
	$fase2 = $row['fase2'];
	$fase3 = $row['fase3'];
    }
    //echo $fase1;
    mysqli_close($con);
?>
