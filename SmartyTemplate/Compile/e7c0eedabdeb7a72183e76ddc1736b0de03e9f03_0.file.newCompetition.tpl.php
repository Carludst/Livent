<?php
/* Smarty version 4.1.1, created on 2022-07-12 09:13:18
  from '/Applications/MAMP/htdocs/Livent/SmartyTemplate/Template/newCompetition.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62cd3b2ed95c64_74059346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7c0eedabdeb7a72183e76ddc1736b0de03e9f03' => 
    array (
      0 => '/Applications/MAMP/htdocs/Livent/SmartyTemplate/Template/newCompetition.tpl',
      1 => 1657617162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62cd3b2ed95c64_74059346 (Smarty_Internal_Template $_smarty_tpl) {
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

<!-- Start Top Header Bar -->
<!--COPIA DA HOME-->
<!-- End Top Header Bar -->


<!-- Main Menu Section -->

<!--COPIA DA HOME-->

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Nuova Competizione</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Nuova Competizione</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="signin-page account" >
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="block text-center">
                    <h2 class="text-center"><b>Crea la nuova competizione</b></h2>
                    <form method="post" class="text-left clearfix" action="#" name="createForm">
                        <h4>Nome:</h4>
                        <div class="form-group">
                            <input type="text" <?php if ($_smarty_tpl->tpl_vars['competition']->value != '') {?>value="<?php echo $_smarty_tpl->tpl_vars['competition']->value->getName();?>
"<?php }?> name="name" class="form-control" placeholder="Nome competizione">
                        </div>
                        <br>
                        <div class="form-group">
                            <h4>Data di inizio: </h4>
                            <input type="datetime-local" <?php if ($_smarty_tpl->tpl_vars['competition']->value != '') {?>value="<?php echo $_smarty_tpl->tpl_vars['competition']->value->getDateTime()->format("Y-m-d H:i:s");?>
"<?php }?> class="form-control" name="dateTime">
                        </div>
                        <br>
                        <br>
                        <table>
                            <tbody>
                            <tr>
                                <td><h4>Unità di musura:</h4></td>
                                <td> </td>
                                <td>
                                    <select class="form-control" name="unit">
                                        <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '') {?>selected<?php }?>>Km</option>
                                        <option>m</option>
                                        <option>mi</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><h4>Distanza:</h4></td>
                                <td> </td>
                                <td><input type="number" <?php if ($_smarty_tpl->tpl_vars['competition']->value != '') {?>value="<?php echo $_smarty_tpl->tpl_vars['competition']->value->getDistance();?>
"<?php }?> name="dist"></td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <h4>Sport:</h4>
                        <select class="form-control" name="sport">
                            <option>Qualsiasi Sport</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getSport() == 'Atletica') {?>selected<?php }?>>Atletica</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getSport() == 'Ciclismo') {?>selected<?php }?>>Ciclismo</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getSport() == 'Nuoto') {?>selected<?php }?>>Nuoto</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getSport() == 'Pattinaggio a rotelle') {?>selected<?php }?>>Pattinaggio a rotelle</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getSport() == 'Pattinaggio sul ghiaccio') {?>selected<?php }?>>Pattinaggio sul ghiaccio</option>
                        </select>
                        <br>
                        <h4>Genere:</h4>
                        <select class="form-control" name="gender">
                            <option>No Selected</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getGender() == 'M') {?>selected<?php }?>>Uomo</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getGender() == 'F') {?>selected<?php }?>>Donna</option>
                        </select>
                        <br>
                        <div class="form-group">
                            <h4>Descrizione:</h4>
                            <textarea <?php if ($_smarty_tpl->tpl_vars['competition']->value != '') {?>value="<?php echo $_smarty_tpl->tpl_vars['competition']->value->getDescription();?>
"<?php }?> name="description" class="form-control" cols="20" rows="4">Scrivi la descrizione...</textarea>
                        </div>
                        <br>
                        <label for="avatar">Scegli una foto per la competizione:</label>
                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                        <br>
                        <h3><b>Autenticazione:</b></h3>
                        <div class="form-group">
                            <input type="email" name='email' class="form-control"  placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name='password' class="form-control" placeholder="Password">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" style="width: 260px">Conferma</button>
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
