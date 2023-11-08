<?php

    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];

    echo "Número 1: " . $numero1 . "<br>";
    echo "Número 2: " . $numero2 . "<br>";

    if (isset($_POST['suma'])) {
        $resultado = $numero1 + $numero2;
        echo "Resultado de la suma: " . $resultado;
    } elseif (isset($_POST['resta'])) {
        $resultado = $numero1 - $numero2;
        echo "Resultado de la resta: " . $resultado;
    } elseif (isset($_POST['multiplicar'])) {
        $resultado = $numero1 * $numero2;
        echo "Resultado de la multiplicación: " . $resultado;
    } elseif (isset($_POST['dividir'])) {
        if ($numero2 != 0) {
            $resultado = $numero1 / $numero2;
            echo "Resultado de la división: " . $resultado;
        } else {
            echo "Error: No se puede dividir por cero.";
        }
    }


?>