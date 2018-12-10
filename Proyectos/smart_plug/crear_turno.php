<html>
    <head>
        <title>Crear nuevo turno</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
 	</p> Introduzca los siguientes datos:<p>
	</p>  Dia de la semana: 1 - Lunes... | Hora inicio : hh:mm:ss | Duracion (min):XXX <p>

        <form action="./insertar_turno.php" method="POST">
	    <input size="28" type="dia semana" placeholder="1" name="txtdia" />
            <input size="21" type="hora inicio" placeholder="06:30:00" name="txthora" />
            <input size="20" type="tiempo (min)" placeholder="60" name="txtminutos" />
	    <input type="submit" value="Guardar" name="guardar" />
	</form>
	<form action="./smart_plug.php" method="POST">
           <input type="submit" value="Cancelar" name="cancelar" />
	</form>
    </body>
</html>

