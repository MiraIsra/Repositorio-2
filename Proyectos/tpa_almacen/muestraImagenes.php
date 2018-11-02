<?php
$variable = 0;//seteamos a 0 el sumador
$valor = 5;//seteamos a 6 las imagenes a mostrar por cada linea
//$dia = $dia;
$dia = $_GET['dia'];
//echo "diaa:" . $dia;
echo "</tr>";

echo "<table><tr>";

$directorio = opendir("./images/" . $dia);
$cont = 0;
    while($archivo = readdir($directorio))
    {   
	$cont = $cont + 1;
        $nombreArch = str_replace("", "Atras", ucwords($archivo));
        if($variable > $valor){ echo "<tr>";
         }
	   if ($cont > 2){
            	//echo "<td width='' height=''><a href='./images/hoy/$archivo'>";
            	echo "<img src='./images/" . $dia . "/$archivo' width='700' height='400'";
            	echo " border=0>";
            	echo "";

        	if($variable >= $valor){// si es mayor o igual añadimos </TR>
            		echo "</tr>";
            		$variable = 0;//seteamos a 0 el sumador y volvemos a empezar si quedan mas imagenes
        	}//end if
              	$variable++;//empezamos a sumar +1
	   }
    }//end while
    
closedir($directorio);
echo "</tr>";
echo "</tr></table>\n";
$cont = $cont - 2;
echo "Numero de imagenes: " . $cont;
?>
