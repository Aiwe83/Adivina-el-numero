<?php

# Recoge el valor del parámetro "msj" desde la URL
$msj = $_GET["msj"] ?? "";

# Recoge el valor del parámetro "intentos" desde la URL
$intentos = $_GET["intentos"] ?? 0;

# Inicializa variables para el estado "checked" de las opciones del formulario
$checked_10 = "";
$checked_16 = "";
$checked_20 = "";

# Establece el valor "checked" en la opción correspondiente, dependiendo del número de intentos elegido
switch ($intentos) {
    case 10:
        $checked_10 = "checked";
        break;
    case 16:
        $checked_16 = "checked";
        break;
    case 20:
        $checked_20 = "checked";
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Pagina web Pableras</title>
</head>
<body>

<!-- Crea un fieldset con estilo para mostrar el formulario y el mensaje -->
<fieldset style="width:50%; float:left; margin-left: 20%;background: bisque">
    <legend><h1>Juego adivina el numero</h1></legend>
    <h3>Selecciona un intervalo</h3>
    <fieldset>
        <!-- Muestra el mensaje recibido en la URL -->
        <?= $msj; ?>
        <legend> Establece un intervalo</legend>
        <!-- Crea el formulario para seleccionar un intervalo -->
        <form action="jugar.php" method="POST">
            <input type="radio" name="intentos" <?= $checked_10 ?>value="10">1-1.024(2<sup>10</sup>)- 10<br>
            <input type="radio" name="intentos" <?= $checked_16 ?> value="16">1-65.536(2<sup>16</sup>)- 16<br>
            <input type="radio" name="intentos" <?= $checked_20 ?>value="20">1-1.048.576(2<sup>20</sup>)-20<br><br>
            <input type="submit" value="Empezar" name="submit">
        </form>
    </fieldset>
</fieldset>

</body>
</html>
