<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/articulos.css">
    <link rel="shortcut icon" href="<?php echo constant('ICN');?>">
    <title>Articulos</title>
</head>

<body>

    <?php require 'views/header.php';?>

    <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
    <h1>Articulos Principal</h1>
    <button><a href="<?php echo constant('URL'); ?>articulos/listar">Listar Articulos</a></button>
    <button><a href="<?php echo constant('URL'); ?>articulos/nuevo">Nuevo Articulo</a></button>
    <?php require 'views/footer.php';?>


    <!-- Importo el javascript-->
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>

</body>

</html>