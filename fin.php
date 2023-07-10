<?php

// Recibe las variables "acertado" y "intentos" a través de $_GET
$acertado = $_GET["acertado"];
$intentos = $_GET["intentos"] ?? 0;

// Verifica si "acertado" es verdadero
if ($acertado) {
    // Establece un mensaje indicando que el juego ha sido ganado en "intentos" intentos
    $msj = "Ves que listo soy, lo he acertado en $intentos intentos";
} else {
    // Establece un mensaje indicando que el juego no ha sido ganado y cuántos intentos se necesitan
    $msj = "Yo creo que no me has dicho la verdad. En " . ((int)$intentos - 1) . " intentos lo tendría que haber acertado";
}

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
<!-- Muestra una cabecera con el título "Fin de juego" -->
<h1>Fin de juego</h1>

<!-- Muestra el mensaje resultante -->
<h2><?= $msj ?></h2>

<!-- Muestra un enlace para volver a la p

Error in body stream

ágina principal -->
<a href="index.php">Volver</a>
</body>
</html>