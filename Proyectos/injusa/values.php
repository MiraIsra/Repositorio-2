<?php 
$periodo = ""; 
if ( !empty($_POST) && isset($_POST['periodo']) ) {
	$periodo = $_POST['periodo'];
}
$con = mysqli_connect ("localhost","root","D1egoarmando", "injusa"); 
if (!$con) {
	die ('Could not connect: ' . mysqli_error ());
}

if ($periodo=="Dia")
        $datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1, fase2, fase3, ciclos FROM `Consumos` WHERE timestamp >= now() - INTERVAL 1 DAY ") or die ("Connection error");
else if ($periodo=="Hora")
        $datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1, fase2, fase3, ciclos FROM `Consumos` WHERE timestamp >= now() - INTERVAL 1 HOUR ") or die ("Connection error");
else if ($periodo=="Hora12")
        $datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1, fase2, fase3, ciclos FROM `Consumos` WHERE timestamp >= now() - INTERVAL 12 HOUR ") or die ("Connection error");
else if ($periodo=="Semana")
        $datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1, fase2, fase3, ciclos FROM `Consumos` WHERE timestamp >= now() - INTERVAL 7 DAY ") or die ("Connection error");
else if ($periodo=="Mes")
        $datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1, fase2, fase3, ciclos FROM `Consumos` WHERE timestamp >= now() - INTERVAL 1 MONTH ") or die ("Connection error");
else if ($periodo=="Ano")
        $datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1, fase2, fase3, ciclos FROM `Consumos` WHERE timestamp >= now() - INTERVAL 1 YEAR ") or die ("Connection error");
else
        $datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1, fase2, fase3, ciclos FROM `Consumos` WHERE timestamp >= now() - INTERVAL 1 HOUR ") or die ("Connection error");

while($row = mysqli_fetch_array($datosDia)) {
	//echo $row['timestamp'] . "/" . $row['id_maquina']. "/" . $row['id_modo']. "/" . $row['fase1']. "/" . $row['fase2']. "/" . $row['fase3']. "/"  . $row['ciclos']. "/"  ;
	echo $row['timestamp']. "/" .$row['fase1']/*. "/" .$row['fase2']. "/" .$row['fase3']*/. "/" .$row['id_modo']. "/" .$row['ciclos']. "/"  ;
}
mysqli_close ($con); ?>
