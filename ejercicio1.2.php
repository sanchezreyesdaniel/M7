<?php
session_start();


if ($_SESSION['authuser'] != 1){
    echo "Fuera";

    exit();     
}
?>
<html>
 <head>
  <title>Mi pelicula favorita <?php echo $_GET['favmovie'];?></title>
 </head>
 <body>
<?php
$usuario = $_GET['username'] ?? 'nadie';
echo "Me llamo ";
echo $_SESSION["username"];

echo "tengo ";
echo $_SESSION["edad"];
echo " años y la cantidad de ";
echo $_SESSION["hermanos"];
echo " hermanos";
echo "! <br/>";
echo "Esta es la cookie1: ";
echo $_COOKIE["ejercicio1"];
echo "Esta es la cookie2: ";
echo $_COOKIE["Jordi"];

echo "Mi pelicula favorita es ";
echo $_GET['favmovie'];
echo "<br/>";

date_default_timezone_set("America/New_York");
$currentDate = date('d');
echo "Hoy es el día ";
echo $currentDate

?>
 </body>
</html>