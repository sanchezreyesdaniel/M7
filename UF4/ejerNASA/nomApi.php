<?php

// Conexión a la base de datos
$host = "localhost"; 
$port = "5432"; 
$dbname = "usuaris"; 
$user = "postgres"; 
$password = "root"; 
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");


if (!$conn) {
    echo "Error: No se pudo conectar a la base de datos.\n";
    exit;
}

$html = file_get_contents("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=2015-6-3&api_key=wEPiEcYqC7zfIV6Cts8KWai52A8MVNbtcO7epcAU");

$json = json_decode($html);
// Datos de la primera foto
$id = $json->photos[0]->id;
$sol = $json->photos[0]->sol;
$camera_name = $json->photos[0]->camera->name;
$img_src = $json->photos[0]->img_src;
$earth_date = $json->photos[0]->earth_date;

// Consulta SQL para insertar los datos en la tabla 'photos'
$query = "INSERT INTO photos (id, sol, camera_name, img_src, earth_date) VALUES ($id, $sol, '$camera_name', '$img_src', '$earth_date')";

// Ejecutar la consulta
$result = pg_query($conn, $query);

// Verificar si la consulta se ejecutó correctamente
if (!$result) {
    echo "Error al ejecutar la consulta.\n";
    exit;
} else {
    echo "Datos insertados correctamente en la base de datos.\n";
}

// Cerrar la conexión a la base de datos
pg_close($conn);

?>
