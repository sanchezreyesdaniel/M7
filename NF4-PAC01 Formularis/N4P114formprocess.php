<?php

echo <<<ENDHTML
<html>
<head></head>
<body>

<form action="N4P115formprocess.php" method="post">
<label for="nombre">numero1:</label>
<input type="text" id="numero1" name="numero1">

<br>

<label for="apellido">numero2:</label>
<input type="text" id="numero2" name="numero2" >

<br>
<input name="suma" type="submit" value="+">
<input name="multiplicar" type="submit" value="x">
<input name="resta" type="submit" value="-">
<input name="dividir" type="submit" value="/">
</form>
</body>
</html>
ENDHTML;


?>