<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es-ES">
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <title>Datos regleta inteligente :: Isra Mira</title>
                <META NAME="AUTHOR" CONTENT="Isra Mira">
        </head>
        <body>

            <h1>Regleta 1: Habitación Isra.</h1>

            <?php
                require("connector.php");
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
		//echo $s_actu;
            ?>
            <form action="./insertor_php.php" method="POST">
                <input type="submit" value="Cambiar estado" name="cambiarEstado" />
            </form>

	    <?php
		require("connector.php");

                if (!$con)
                    die ("Can't connect: ". mysqli_error ());
                $sql = "SELECT dia, hora, minutos, activo FROM `programacion` WHERE id_enchufe=0";
                $datos = mysqli_query($con, $sql);
		
	    ?>

	    <h1 align="center">Turnos programados</h1>
            <table width="50%" border="1px" align="center">

            <tr align="center">
            	<td>Dia</td>
            	<td>Hora</td>
            	<td>Minutos</td>
    	        <td>Activo</td>
	    </tr>
	    <?php
		$i = 0;
        	while($row = mysqli_fetch_array($datos)) {
		
		    if ($row["activo"] == 0)
			$activo = "No";
		    else
			$activo = "Si";
            ?>
            <tr>
                <td><?php echo $row["dia"];?></td>
                <td><?php echo $row["hora"];?></td>
                <td><?php echo $row["minutos"];?></td>
                 <td><?php echo $activo;?></td>

	    </tr>
            <?php
        	}
		
        	mysqli_close ($con);
     	    ?>
    	</table>

        <form action="./crear_turno.php" method="POST">
            <input type="submit" value="Añadir turno" name="cTurno" />

        <form action="./borrar_turno.php" method="POST">
            <input type="submit" value="Eliminar turno" name="bTurno" />

    </body>
</html>
