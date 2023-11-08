<?php
echo <<<ENDHTML
<html>
<head></head>
<body>
<form action="N4P113formprocess.php" method="post">

<label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre">

<br>

<label for="apellido">Apellido:</label>
<input type="text" id="apellido" name="apellido" >

<br>

<label for="edad">Edad:</label>
<input type="text" id="edad" name="edad">

<br>

<label for="apellido2">Apellido2:</label>
<input type="text" id="apellido2" name="apellido2" >

<br>

<label for="mensaje">Mensaje:</label>
<input type="text" id="mensaje" name="mensaje">

<br>

<input id="Enviar" type="submit" value="Enviar">
</form>
 </body>
</html>
ENDHTML;
?>