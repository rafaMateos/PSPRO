
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>

<?php
require_once "Word.php";

    $palabra = new Word("Hola Hola eres una grande nene tequiero");

    /*
    echo $palabra->contarPalabras('Hola');
    */

        $palabra ->posicionesPalabras('a');


?>






</body>
</html>