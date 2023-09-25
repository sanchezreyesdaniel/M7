<?php
session_unset();
?>
<html>
 <head>
  <title>Inicia sesion</title>
 </head>
 <body>
  <form method="post" action="ejercicio1.2.php">
   <p>Enter your username: 
    <input type="text" name="user"/>
   </p>
   <p>Enter your password: 
    <input type="password" name="pass"/>
   </p>
   <p>
    <input type="submit" name="submit" value="Submit"/>
   </p>
  </form>
 </body>
</html>