<?php
session_start();
$_SESSION['username'] = "Dani";
$_SESSION['authuser'] = 1;
$_SESSION['edad'] = "18";
$_SESSION['hermanos'] = "1";
setcookie("ejercicio1","M7",time()+60);
setcookie("Jordi","Fpllefia",time()+120);
?>
<html>
 <head>
  <title>Pelicula favorita</title>
 </head>
 <body>
<?php
$myfavmovie = urlencode("Daniel Sanchez");
echo "<a href='ejercicio1.2.php?favmovie=$myfavmovie'>";
echo "Haz click para ver la info"; 
echo "</a>";
?>
 </body>