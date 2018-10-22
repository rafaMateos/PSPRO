
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>

<?php
require_once "Word.php";

    $palabra = new Word("Hola");

    echo "<div>";

    echo $palabra->contarPalabras('e');

    echo "<div>";


    echo "posiciones palabras";
    echo "<div>";
    echo $palabra ->posicionesPalabras('a');

    echo "<div>";
    echo "La frase es " .$palabra->getPalabra();

    echo "<div>";
    echo 'Vamos a cambiar a por pepe';

    echo "<div>";
    echo "El resultado es ". $palabra->sustituirPalabras("Hola","pepe");

    echo "<div>";
    echo $palabra->sustPalabraPosicion(1,3);


?>

</body>
</html>