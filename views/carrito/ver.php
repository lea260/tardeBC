<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


  <title>Document</title>
</head>

<body>
  <div class="row" style="display:flex;">

    <a href="<?php echo constant('URL'); ?>carrito/ver">ver Carrito</a>

    <a href="<?php echo constant('URL'); ?>articulos/listar">listar Articulos</a>
    <a href="<?php echo constant('URL'); ?>articulos/nuevo">nuevo articulos</a>
    <a href="<?php echo constant('URL'); ?>login/ingresar">Ingesar</a>

  </div>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h1>Lista Carrito</h1>
      </div><!-- end col-->
    </div><!-- end row-->

    <div class="row">

      <div id="carritoId"></div>









    </div><!-- end row -->
  </div><!-- end container-->
  <?php require 'views/footer.php';?>


  <button id="save" class="btn btn-success ">Guardar</button>

  <!-- importo el javascript-->
  <script src=" <?php echo constant('URL'); ?>public/js/carrito/ver.js">
  </script>

  <!--<script src="<?php echo constant('URL'); ?>/public/js/main.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>
  <script src="<?php echo constant('URL'); ?>public/js/carrito/save.js"></script>

</body>

</html>