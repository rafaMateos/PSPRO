
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>

<?php
require_once "Word.php";

    $palabra = new Word("Hola guapo");

    /*
    echo $palabra->contarPalabras('Hola');


     echo $palabra ->posicionesPalabras('a');
    */


    /*
    echo "<div>";
    echo "La frase es " .$palabra->getPalabra();

    echo "<div>";
    echo 'Vamos a cambiar a por U';

    echo "<div>";
    echo "El resultado es ". $palabra->sustituirPalabras("Hola","U");
    */

    echo $palabra->sustPalabraPosicion(1,8);
?>






</body>
</html>