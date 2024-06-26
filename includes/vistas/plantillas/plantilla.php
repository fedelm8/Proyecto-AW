<?php
$params['app']->doInclude('/vistas/helpers/plantilla.php');
$mensajes = mensajesPeticionAnterior();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $params['tituloPagina'] ?></title>
    <link rel="stylesheet" type="text/css" href="<?= $params['app']->resuelve('/css/estilo.css') ?>">
</head>
<body>
    <?= $mensajes ?>
    <div id="contenedor">
        <?php $params['app']->doInclude('/vistas/comun/cabecera.php', $params); ?>
        <main>
            <article>
                <?= $params['contenidoPrincipal'] ?>
            </article>
        </main>
        <?php $params['app']->doInclude('/vistas/comun/pie.php', $params); ?>
    </div>
</body>
</html>

