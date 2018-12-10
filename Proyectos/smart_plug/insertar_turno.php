<?php

    // Archivo para insertar un turno en la bbdd
    // Importamos la configuración
    require("connector.php");
//    echo "asdf";
    // Leemos los valores que nos llegan por GET y comprobamos si se han insertado correctamente
    $dia_ok = 1;
    $hora_ok = 1;
    $minutos_ok = 1;
    if ( (isset($_POST["txtdia"])) && (isset($_POST["txthora"])) && (isset($_POST["txtminutos"])) ){
    	try {
            $dia= (int)$_POST["txtdia"];
	    //echo $dia;
	    if ( ($dia >0) && ($dia <8) )
		$dia = $dia;
	    else{ 
		echo "El numero de la semana introducido no esta entre 1 y 7.";
//		exec ("./crear_turno.php");
		$dia_ok = 0;
	    }
    	} catch (Exception $e){
	    echo "Error al introducir el dia de la programacion, introduce un numero entero del 1 al 7 donde: 1 - Lunes, 2 - Martes, 3 - Miercoles, 4 - Jueves, 5 - Viernes, 6 - Sabado, 7 - Domingo". $e;
//	    exec("./crear_turno.php");
	    $dia_ok = 0;
	}

    	try { //echo $_POST["txthora"];
	    if ( /*(CheckTime($_POST["txthora"])) &&*/ !(empty($_POST["txthora"])) && ($_POST["txthora"] != "0") && (hourIsBetween($_POST["txthora"])) ){
		$hora = $_POST["txthora"];
		//echo $hora;
	    }else{
		echo "Error al introducir la hora de inicio, introduce una hora con el siguiente formato: HH:MM:SS";
		$hora_ok = 0;
	    }
	} catch (Exception $e) {
	    echo "Error,  introduce una hora con el siguiente formato: HH:MM:SS";
	    $hora_ok = 0;
	}

        try { //echo $_POST["txtminutos"];
	    if ((int)$_POST["txtminutos"] > 0){
            	$minutos= (int)$_POST["txtminutos"];
	    }	
	    else{
		echo "Error al introducir los minutos del turno, introduce un numero entero mayor que 0";
		$minutos_ok = 0;
	    }
	} catch (Exception $e) {
	    echo "Error al introducir el numero de minutos de la programacion, introduce un numero entero mayor de 0";
	    $minutos_ok = 0;
	}
    	
    }
    else {
	echo "Error, se deben rellenar todos los campos";
    }
    if ( ($dia_ok == 1) && ($hora_ok == 1) && ($minutos_ok == 1) ) {
	$query = "INSERT INTO programacion (dia, hora, minutos, activo) VALUES('".$dia."', '".$hora."', ". $minutos. ", 1)";
	mysqli_query($con, $query);
	echo "Turno insertado correctamente";
    }
    else {
	echo "Error no detectado en algun campo";
    }
    // Esta es la instrucción para insertar los valores
    //$query = "INSERT INTO estado(est_deseado, est_actual, hora) VALUES('".$est_deseado."', '".$est_actual."', now())";
    // Ejecutamos la instrucción
    //mysqli_query($con, $query);
    mysqli_close($con);


function hourIsBetween($input) {
    $from = "00:00:01";
    $to = "24:59:59";
    $dateFrom = DateTime::createFromFormat('!H:i', $from);
    $dateTo = DateTime::createFromFormat('!H:i', $to);
    $dateInput = DateTime::createFromFormat('!H:i', $input);
    //if ($dateFrom > $dateTo) $dateTo->modify('+1 day');
    return ($dateFrom <= $dateInput && $dateInput <= $dateTo);// || ($dateFrom <= $dateInput->modify('+1 day') && $dateInput <= $dateTo);
}
/*
function CheckTime($hora)
{
  //$hora=$str.value
  if ($hora=='') {return false}
  if ($hora.length>8) {echo ("Introdujo una cadena mayor a 8 caracteres");return false;}
  if ($hora.length!=8) {echo ("Introducir HH:MM:SS");return false;}
  $a=substr($hora, 0, 1) //<=2
  $b=substr($hora, 1, 2) //<4
  $c=substr($hora, 2, 3) //:
  $d=substr($hora, 3, 4) //<=5
  $e=substr($hora, 5, 6) //:
  $f=substr($hora, 6, 7) //<=5
  if (($a==2 && $b>3) || ($a>2) || ($a<0)) {echo ("El valor que introdujo en la Hora no corresponde, introduzca un digito entre 00 y 23");return false;}
  if ($d>5) {echo ("El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59");return false;}
  if ($f>5) {echo ("El valor que introdujo en los segundos no corresponde");return false;}
  if ($c!=':' || $e!=':') {echo ("Introduzca el caracter ':' para separar la hora, los minutos y los segundos");return false;}
  return true;
}*/  
?>



