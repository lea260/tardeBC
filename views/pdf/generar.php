<?php ob_start();?>
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
<?php $nombreImagen = "imagenes/imag2.jpg";
$imagenBase64       = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));
?>


<body>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <h1>Monas</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <h1>Chinas</h1>
        <p>Asi es me gustan peli rojas</p>
        <img src="<?=$imagenBase64;?>">
      </div>
    </div>
</body>

</html>
<?php require_once 'vendor/autoload.php';
use Dompdf\Dompdf;
$nombrePdf = "Reporte.pdf";
$dompdf    = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($nombrePdf);

?>