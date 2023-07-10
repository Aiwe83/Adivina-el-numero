<?php

// Recoger la opción elegida por el usuario
$opcion = $_POST["submit"];

// Comenzar el switch según la opción elegida
switch ($opcion) {

    // Si la opción es "Empezar" o "Reiniciar"
    case "Empezar";
    case "Reiniciar":
        // Recoger el número de intentos
        $intentos = $_POST["intentos"];
        // Establecer el mínimo en 0
        $min = 0;
        // Establecer el máximo en 2 elevado a los intentos
        $max = 2 ** (int)$intentos;
        // Inicializar el número de jugada en 1
        $jugada = 1;
        // Salir del switch
        break;

    // Si la opción es "Jugar"
    case "Jugar":
        // Recoger el número de intentos, el mínimo, el máximo, la jugada, el resultado y el número
        $intentos = $_POST["intentos"];
        $min = $_POST["min"];
        $max = $_POST["max"];
        $jugada = $_POST["jugada"];
        $rtdo = $_POST["resultado"];
        $num = $_POST["num"];
        // Comenzar otro switch según el resultado
        switch ($rtdo) {
            // Si el resultado es "Mayor"
            case 'Mayor':
                // Establecer el mínimo en el número
                $min = $num;
                // Salir del switch
                break;
            // Si el resultado es "Menor"
            case 'Menor':
                // Establecer el máximo en el número
                $max = $num;
                // Salir del switch
                break;
            // Si el resultado es "Igual"
            case 'Igual':
                // Establecer el acertado en true
                $acertado = true;
                // Redirigir a la página "fin.php" con los parámetros "acertado" y "intentos"
                header("Location:fin.php?acertado=$acertado&intentos=$intentos");
                // Salir del script
                exit();
        }

        // Incrementar el número de jugada
        $jugada++;
        // Salir del switch
        break;

    // Si la opción es "Volver"
    case "Volver":
        // Establecer el número de intentos en true
        $intentos = true;
        // Redirigir a la página "Cookie2.php" con el parámetro "intentos"
        header("location:Update parametrizado.php?intentos=$intentos");
        // Salir del script
        exit();

    // Si la opción es inválida
    default:

        // Redirigir a la página "Update parametrizado.php" con el parámetro "msj"
        header("location:Update parametrizado.php?msj=Debes de seleccionar una opción para jugar");
        exit();

        // Fin del switch principal
}

// Verificación para determinar si se han agotado los intentos
if ($jugada > $intentos) {
    $acertado = false;
    header("location:fin.php?acertado=$acertado&intentos=$intentos");
    exit();
}

// Cálculo del número a adivinar
$num = ($min + $max) / 2;

// Renderizado de la página HTML

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Pagina web Pableras</title>

</head>
<body>
<fieldset style="width:50%; float:left; margin-left: 20%;background: bisque">
    <legend><h1>Juego adivina el numero</h1></legend>
    <h3>Selecciona un intervalo</h3>
    <fieldset>

        <legend> Empieza el juego</legend>
        <form action="jugar.php" method="POST">

            <h2>El numero es:<?= $num ?></h2>

            <h4>Jugada nro <?= $jugada ?> y te quedan <?= ((int)$intentos - (int)$jugada) ?> intentos</h4>

            <input type="hidden" value="<?= $intentos ?>" name="intentos">
            <input type="hidden" value="<?= $min ?>" name="min">
            <input type="hidden" value="<?= $max ?>" name="max">
            <input type="hidden" value="<?= $num ?>" name="num">
            <input type="hidden" value="<?= $jugada ?>" name="jugada">

            <fieldset>
                <legend><h1>El numero a adivinar es:</h1></legend>
                <input type="radio" name="resultado" value="Mayor">Mayor<br>
                <input type="radio" name="resultado" value="Menor">Menor<br>
                <input type="radio" name="resultado" value="Igual">Igual<br>
            </fieldset>
            <hr/>
            <input type="submit" value="Jugar" name="submit">
            <input type="submit" value="Reiniciar" name="submit">
            <input type="submit" value="Volver" name="submit">
        </form>

</body>
</html>
