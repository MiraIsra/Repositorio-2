<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es-ES">
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <title>Datos regleta inteligente :: Isra Mira</title>
                <META NAME="AUTHOR" CONTENT="Isra Mira">
        </head>
        <body>

            <h1>Maquina 1.</h1>
		 <img src= "./images/maquina_1.png" width="150" height="200">
            <?php
                require("connector.php");
                include 'selector.php';
                echo "<br>";
                if ("$id_modo" == 1)
                    $actual = "Apagada";
                else if ("$id_modo" == 2)
                    $actual = "Manual";
		else if ("$id_modo" == 3)
		    $actual = "Automatica"; 
                
		echo "Estado actual: ". $actual ."<br>";
                echo "Ultima sincronizacion:". $time ."<br>";
		echo "Consumos:<br>";
		echo "Fase 1:" .$fase1. "<br>";
		echo "Fase 2:" .$fase2. "<br>";
		echo "Fase 3:" .$fase3. "<br>";

                //echo $s_actu;
            ?>
            <form action="./detalles.html?maq=1" method="POST">
                <input type="submit" value="Ver detalles" name="cambiarEstado" />
            </form>

            
    </body>
</html>



