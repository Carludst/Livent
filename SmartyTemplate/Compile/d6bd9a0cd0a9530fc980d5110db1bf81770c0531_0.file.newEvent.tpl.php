<?php
/* Smarty version 4.1.1, created on 2022-07-16 05:12:48
  from 'C:\xampp\htdocs\Livent\SmartyTemplate\Template\newEvent.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62d22cb0d8aaf0_65874611',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6bd9a0cd0a9530fc980d5110db1bf81770c0531' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Livent\\SmartyTemplate\\Template\\newEvent.tpl',
      1 => 1657941133,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d22cb0d8aaf0_65874611 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Livent</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/slick/slick.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/css/style.css">


</head>

<body>



<section class="signin-page account" >
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="block text-center">
                    <a class="logo" href="/Livent/">
                        <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                               font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="125" y="325">Livent</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <h2 class="text-center"><b>Crea il nuovo Evento</b></h2>
                    <form method="post" <?php if ($_smarty_tpl->tpl_vars['event']->value != '') {?>action="/Livent/Event/Update/<?php echo $_smarty_tpl->tpl_vars['event']->value->getId();?>
/"<?php } else { ?> action="/Livent/Event/Create/" <?php }?> class="text-left clearfix" name="createForm" enctype="multipart/form-data">
                        <br>
                        <h3><b>Autenticazione:</b></h3>
                        <div class="form-group">
                            <input type="email" name='email' class="form-control"  placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name='password' class="form-control" placeholder="Password" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <h4>Nome dell'evento:</h4>
                            <input type="text" <?php if ($_smarty_tpl->tpl_vars['event']->value != '') {?>value="<?php echo $_smarty_tpl->tpl_vars['event']->value->getName();?>
"<?php }?> name="name" class="form-control" placeholder="Nome evento" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <h4>Luogo:</h4>
                            <input type="text" <?php if ($_smarty_tpl->tpl_vars['event']->value != '') {?>value="<?php echo $_smarty_tpl->tpl_vars['event']->value->getPlace();?>
"<?php }?> placeholder="Luogo"  name="place" class="form-control" required>
                        </div>
                        <br>
                        <br>
                        <div>
                            <input type="radio" name="public?" value="public" <?php if ($_smarty_tpl->tpl_vars['event']->value == '' || $_smarty_tpl->tpl_vars['event']->value->getPublic()) {?>checked<?php }?>/><b>Pubblico</b>
                            <input type="radio" name="public?" value="private" <?php if ($_smarty_tpl->tpl_vars['event']->value != '' && !$_smarty_tpl->tpl_vars['event']->value->getPublic()) {?>checked<?php }?>/><b>Privato</b>
                        </div>
                        <br>
                        <div class="form-group">
                            <h4>Descrizione:</h4>
                            <textarea placeholder="Scrivi la descrizione..." name="description" class="form-control" cols="20" rows="4"><?php if ($_smarty_tpl->tpl_vars['event']->value != '') {
echo $_smarty_tpl->tpl_vars['event']->value->getDescription();
}?></textarea>
                        </div>
                        <br>
                        <label for="avatar">Scegli una foto per l'evento:</label>
                        <input class="btn-solid-border center-element" style="width: 100%" type="file" id="front" name="front" accept="image/png, image/jpeg">
                        <br>
                        <button type="submit" class="btn btn-main text-center">Conferma</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5">

            </div>
        </div>
    </div>
</section>






<!--
Essential Scripts
=====================================-->

<!-- Main jQuery -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
<!-- Bootstrap 3.1 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<!-- Bootstrap Touchpin -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"><?php echo '</script'; ?>
>
<!-- Instagram Feed Js -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/instafeed/instafeed.min.js"><?php echo '</script'; ?>
>
<!-- Video Lightbox Plugin -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/ekko-lightbox/dist/ekko-lightbox.min.js"><?php echo '</script'; ?>
>
<!-- Count Down Js -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/syo-timer/build/jquery.syotimer.min.js"><?php echo '</script'; ?>
>

<!-- slick Carousel -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/slick/slick.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/slick/slick-animation.min.js"><?php echo '</script'; ?>
>

<!-- Google Mapl -->
<?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/google-map/gmap.js"><?php echo '</script'; ?>
>

<!-- Main Js File -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/js/script.js"><?php echo '</script'; ?>
>
<!--MyJavaScript -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/js/myScript.js"><?php echo '</script'; ?>
>




</body>
</html>
<?php }
}
