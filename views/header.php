<?php require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;
Translate::__('home');?></a>
?>

<nav>
  <a href="<?php echo constant('URL'); ?>articulos/listar">Listar Articulos</a>
  <a href="<?php echo constant('URL'); ?>carrito/ver">Ver Carrito</a>
  <a href="<?php echo constant('URL'); ?>">Seccion Inicial</a>
</nav>

<style>
a {
  color: red;
  padding: 15px;
  font-weight: bold;
}
</style>