<!DOCTYPE html>
<html lang="en">
<head>
</head>
<?php

if ($_POST["checkSex"] == "Hombre"){

    echo "Eres hombre";

    echo '<body style="background-color:blue">';

}else{

    echo "Mujere";
    echo '<body style="background-color:pink">';
}
?>

Bienvenido <?php echo $_POST["name"]; ?> <br>
Tu email es: <?php echo $_POST["email"];?> <br>
Tu direccion es: <?php echo $_POST["Adress"];?> <br>



</body>
</html>