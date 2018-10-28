<?php

echo "Conexion realizada";

/*catch (PDOException $ex) {
       echo $ex->getMessage();
       exit;
    }*/

$con = mysqli_connect("localhost", "root", "D1egoarmando", "Sistema");
$nr="";
if (!$con){
	die ('No se puede conectar con bbdd: ' . mysqli_error());
}

/* @var $_POST type */
$nombre= $_POST["txtusuario"];
$pass= $_POST["txtpassword"];

/*La busqueda en la base de datos se realiza de este modo para evitar las inyecciones sql*/
$query=("SELECT view FROM `Sistema`.`Users` "
         . "WHERE usuario='".$nombre."' and "
         . "contrasenya='".$pass."'");
/*$query=("SELECT view FROM `Users` WHERE usuario='camarauser' and contrasenya='V1gila'");*/
/*echo $query;*/

$rs = mysqli_query($con, $query);
/*echo "  rs:" . $rs . "   ";*/
$filas = 0;
while ($row = mysqli_fetch_array ($rs)){
	$nr.= $row["view"];
	$filas = $filas + 1;
}


mysqli_close ($con);
echo "Aquiestoy" .  $nr;
echo "filas:" . $filas;

if ($filas == 0){
	echo "El usuario y/o contraseña no son correctos.";
}
else {
     echo "View/View" . $nr . ".html";
     header("Location:./View/View". $nr .".html");

}
?>
