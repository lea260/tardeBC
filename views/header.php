<!-- <?php require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;
?>-->
<!-- <header><?=Translate::__('home');?>
</header>
 -->
<link rel="shortcut icon" href="<?php echo constant('URLP'); ?>img/icon.gif" type="image/gif">
<link rel="stylesheet" href="<?php echo constant ('URLP'); ?>css/header.css">
<header class="heado">
        <div class="logo">
            <img id="lg" src="./public/img/logo.jpg" alt="">
        </div>
        <div class="menu1">
            <ul>
                <li><a href="<?php echo constant('URL'); ?>index">Inicio</a></li>
                <li><a href="<?php echo constant('URL'); ?>login">Login</a></li>
                <li><a href="<?php echo constant('URL'); ?>pedidos">Pedidos</a></li>
                <li id="cont"><a href="<?php echo constant('URL'); ?>about">Contacto</a></li>
            </ul>
        </div>
    </header>