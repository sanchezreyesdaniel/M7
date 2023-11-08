<?php


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$apellido2 = $_POST['apellido2'];
$edad = $_POST['edad'];
$mensaje = $_POST['mensaje'];

echo "Nombre: " . $nombre . "<br>";
echo "Apellido: " . $apellido . "<br>";
echo "Segundo Apellido: " . $apellido2 . "<br>";
echo "Edad: " . $edad . "<br>";
echo "Mensaje: " . $mensaje;

echo <<<ENDHTML
  <html>
  <head></head>
  <body>
  <select id="seleccion" name="seleccion">
            <option value="nombre">$nombre</option>
            <option value="apellido">$apellido</option>
            <option value="apellido2">$apellido2</option>
            <option value="edad">$edad</option>
            <option value="mensaje">$mensaje</option>
        </select>
  </body>
  </html>
ENDHTML;


?>