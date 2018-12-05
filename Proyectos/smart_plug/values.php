<?php 
$periodo = ""; 
$fecha = "";
$datos = "";
$est_actual = 0;
$est_deseado = 0;
/*if ( !empty($_POST) && isset($_POST['periodo']) ) {
	$periodo = $_POST['periodo'];
}*/
$con = mysqli_connect ("localhost","root","D1egoarmando", "smart_plug"); 
if (!$con) {
	die ('Could not connect: ' . mysqli_error ());
}
/*if ($periodo=="Dia")
	$datosDia = mysqli_query($con, "SELECT fecha, temperatura, humedadRel, presion, iluminacion FROM `datos_clasificados` WHERE id_estacion=1 AND fecha >= now() - INTERVAL 1 DAY ") or die ("Connection error"); 
else if ($periodo=="Hora")
	$datosDia = mysqli_query($con, "SELECT fecha, temperatura, humedadRel, presion, iluminacion FROM `datos_clasificados` WHERE id_estacion=1 AND fecha >= now() - INTERVAL 1 HOUR ") or die ("Connection error"); 
else if ($periodo=="Semana")
	$datosDia = mysqli_query($con, "SELECT fecha, temperatura, humedadRel, presion, iluminacion FROM `datos_clasificados` WHERE id_estacion=1 AND fecha >= now() - INTERVAL 7 DAY ") or die ("Connection error"); 
else if ($periodo=="Mes")
	$datosDia = mysqli_query($con, "SELECT fecha, temperatura, humedadRel, presion, iluminacion FROM `datos_clasificados` WHERE id_estacion=1 AND fecha >= now() - INTERVAL 1 MONTH ") or die ("Connection error"); 
else if ($periodo=="Ano")
	$datosDia = mysqli_query($con, "SELECT fecha, temperatura, humedadRel, presion, iluminacion FROM `datos_clasificados` WHERE id_estacion=1 AND fecha >= now() - INTERVAL 1 YEAR ") or die ("Connection error"); 
else*/
	$datos = mysqli_query($con, "SELECT hora, est_actual, est_deseado FROM `estado` ORDER BY id DESC LIMIT 1 ") or die ("Connection error"); 

while($row = mysqli_fetch_array($datos)) {
	echo $row['hora']. "/" . $row['est_actual']. "/" . $row['est_deseado']. "/" ;
	$datos = $datos. $row['hora']. "/" . $row['est_actual']. "/" . $row['est_deseado']. "/" ;
	$fecha = $row['fecha'];
	$est_actual = $row['est_actual'];
	$est_deseado = $row['est_deseado'];
}
echo $fecha;
echo $est_actual;
echo $est_deseado;

mysqli_close ($con); ?>
