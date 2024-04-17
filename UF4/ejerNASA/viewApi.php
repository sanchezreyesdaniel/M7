<?php

$html = file_get_contents("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=2015-6-3&api_key=wEPiEcYqC7zfIV6Cts8KWai52A8MVNbtcO7epcAU");

$json = json_decode($html);

$id = $json->photos[0]->id; // ID de la primera foto
$sol = $json->photos[0]->sol;
$camera_name = $json->photos[0]->camera->name;
$img_src = $json->photos[0]->img_src;
$earth_date = $json->photos[0]->earth_date;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Information</title>
</head>
<body>
    <h2>Información de la Foto</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Sol</th>
            <th>Nombre de la Cámara</th>
            <th>Fuente de la Imagen</th>
            <th>Fecha en la Tierra</th>
        </tr>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $sol; ?></td>
            <td><?php echo $camera_name; ?></td>
            <td><?php echo $img_src; ?></td>
            <td><?php echo $earth_date; ?></td>
        </tr>
    </table>
</body>
</html>
