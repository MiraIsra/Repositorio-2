<?php
$est_actual = 1;
$est_actual = $_POST['est_actual'];
if ($est_actual = 0){
	$est_deseado = 1;
else 
	est_deseado = 0;
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
$sql = "INSERT INTO `estado` (est_actual, est_deseado, hora) VALUES (". $est_actual .",". $est_deseado .", now())"; 
        //$sql = mysqli_query($con, "SELECT hora, est_actual, est_deseado FROM `estado` ORDER BY id DESC LIMIT 1 ") or die ("Connection error");

if ($con->query($sql) == TRUE){
	echo "NUEVA FILA INSERTADA CORRECTAMENTE";
} else {
	echo "Error: " .$sql. "<br>". $con->error;
}

mysqli_close ($con); ?>
