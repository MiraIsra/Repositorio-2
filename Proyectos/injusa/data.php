<?php 

$csv_end = "
"; 
$csv_sep = ","; 
$csv_file = "data.csv"; 
$csv=""; 
$con = mysqli_connect ("localhost","root","D1egoarmando", "injusa"); 
$periodo = ""; 
if (!$con) {
	die('Could not connect: ' . mysqli_error ());
}
if ( !empty($_POST) && isset($_POST['periodo']) ) {
	$periodo = $_POST['periodo'];
}
echo "estoy";
//$csv_array[] = array(); $csv_array="Hora, Temperatura, Humedad relativa, Presion, Iluminacion".$csv_end; 

if ($periodo=="Dia")
	$datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1 AS intensidad_1, fase2 AS intensidad_2, fase3 AS intensidad_3, ciclos, ((fase1+fase2+fase3)*voltaje*sqrt(3))/1000 as potenciaKW  FROM `Consumos` AS C LEFT JOIN `Maquinas` AS M ON C.id_maquina=M.id WHERE timestamp >= now() - INTERVAL 1 DAY ") or die ("Connection error"); 
else if ($periodo=="Hora")
        $datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1 AS intensidad_1, fase2 AS intensidad_2, fase3 AS intensidad_3, ciclos, ((fase1+fase2+fase3)*voltaje*sqrt(3))/1000 as potenciaKW  FROM `Consumos` AS C LEFT JOIN `Maquinas` AS M ON C.id_maquina=M.id WHERE timestamp >= now() - INTERVAL 1 HOUR ") or die ("Connection error");
else if ($periodo=="Hora12")
	$datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1 AS intensidad_1, fase2 AS intensidad_2, fase3 AS intensidad_3, ciclos, ((fase1+fase2+fase3)*voltaje*sqrt(3))/1000 as potenciaKW  FROM `Consumos` AS C LEFT JOIN `Maquinas` AS M ON C.id_maquina=M.id WHERE timestamp >= now() - INTERVAL 12 HOUR ") or die ("Connection error"); 
else if ($periodo=="Semana")
	$datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1 AS intensidad_1, fase2 AS intensidad_2, fase3 AS intensidad_3, ciclos, ((fase1+fase2+fase3)*voltaje*sqrt(3))/1000 as potenciaKW  FROM `Consumos` AS C LEFT JOIN `Maquinas` AS M ON C.id_maquina=M.id WHERE timestamp >= now() - INTERVAL 7 DAY ") or die ("Connection error"); 
else if ($periodo=="Mes")
	$datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1 AS intensidad_1, fase2 AS intensidad_2, fase3 AS intensidad_3, ciclos, ((fase1+fase2+fase3)*voltaje*sqrt(3))/1000 as potenciaKW  FROM `Consumos` AS C LEFT JOIN `Maquinas` AS M ON C.id_maquina=M.id WHERE timestamp >= now() - INTERVAL 1 MONTH ") or die ("Connection error"); 
else if ($periodo=="Ano")
	$datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1 AS intensidad_1, fase2 AS intensidad_2, fase3 AS intensidad_3, ciclos, ((fase1+fase2+fase3)*voltaje*sqrt(3))/1000 as potenciaKW  FROM `Consumos` AS C LEFT JOIN `Maquinas` AS M ON C.id_maquina=M.id WHERE timestamp >= now() - INTERVAL 1 YEAR ") or die ("Connection error"); 
else
	$datosDia = mysqli_query($con, "SELECT timestamp, id_maquina, id_modo, fase1 AS intensidad_1, fase2 AS intensidad_2, fase3 AS intensidad_3, ciclos, ((fase1+fase2+fase3)*voltaje*sqrt(3))/1000 as potenciaKW FROM `Consumos` AS C LEFT JOIN `Maquinas` AS M ON C.id_maquina=M.id WHERE timestamp >= now() - INTERVAL 7 DAY ") or die ("Connection error"); 
while($row = mysqli_fetch_array ($datosDia)) {
    $csv_array.=$row["timestamp"].$csv_sep.$row["id_maquina"].$csv_sep.$row["id_modo"].$csv_sep.$row["intensidad_1"].$csv_sep.$row["intensidad_2"].$csv_sep.$row["intensidad_3"].$csv_sep.$row["ciclos"].$csv_sep.$row["potenciaKW"].$csv_end;
}
//echo $csv_array; //Generamos el csv de todos los datos if (!$handle = fopen ($csv_file, "w")) {
    echo "Cannot open file";
    exit;
}  
if (fwrite ($handle, utf8_decode($csv_array)) === FALSE) {
    echo "Cannot write to file";
    exit;
}  
fclose($handle); 
mysqli_close ($con); 
header ("Content-Type: application/force-download"); 
header ("Content-Disposition: attachment; filename=".$csv_file); 
header ("Content-Transfer-Encoding: binary"); 
header ("Content-Length: ".filesize ($csv_file)); 
readfile ($csv_file); 
?>
