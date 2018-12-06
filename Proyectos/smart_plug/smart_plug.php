<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es-ES">
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <title>Datos regleta inteligente :: Isra Mira</title>
                <META NAME="AUTHOR" CONTENT="Isra Mira">
        </head>
        <body>

            <p>Regleta 1: Habitación Isra.</p>

            <?php
                include 'selector.php';
		echo "<br>";
		if ("$est_actual" == "0")
		    $actual = "Apagado";
		else
		    $actual = "Encendido";
		if ("$est_deseado" == "0")
		{
		    $deseado = "Apagado";
		}
		else
		{
		    $deseado = "Encendido";
		}
		echo "Estado actual: ". $actual ."<br>";
                echo "Estado deseado: ". $deseado ."<br>";
                echo "Ultimo cambio: $hora" . "<br>";
		echo $s_actu;
            ?>
            <form action="./insertor_php.php" method="POST">
                <input type="submit" value="Cambiar estado" name="cambiarEstado" />
            </form>

 	</body>
</html>
