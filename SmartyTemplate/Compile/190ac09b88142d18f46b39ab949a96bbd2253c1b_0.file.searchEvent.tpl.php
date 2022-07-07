<?php
/* Smarty version 4.1.1, created on 2022-07-07 12:14:40
  from 'C:\xampp\htdocs\Livent\SmartyTemplate\Template\searchEvent.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62c6b2109d1c01_57889671',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '190ac09b88142d18f46b39ab949a96bbd2253c1b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Livent\\SmartyTemplate\\Template\\searchEvent.tpl',
      1 => 1657181798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c6b2109d1c01_57889671 (Smarty_Internal_Template $_smarty_tpl) {
?><!--
THEME: Aviato | E-commerce template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/aviato-e-commerce-template/
DEMO: https://demo.themefisher.com/aviato/
GITHUB: https://github.com/themefisher/Aviato-E-Commerce-Template/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->


<!DOCTYPE html>
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

<body id="body" onload="setDate(document.searchForm)">

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
                    <h1 class="page-name">Cerca Evento</h1>
                    <ol class="breadcrumb">
                        <li><a href="/Livent/">Home</a></li>
                        <li class="active">Cerca Evento</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="products section" >
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget">
                    <h4 class="widget-title">Ricerca</h4>
                    <form method="get" action="/Livent/Event/Search/" name="searchForm">
                        <select class="form-control" name="sport">
                            <option>Qualsiasi Sport</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['sport']->value == 'Atletica') {?>selected<?php }?>>Atletica</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['sport']->value == 'Ciclismo') {?>selected<?php }?>>Ciclismo</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['sport']->value == 'Nuoto') {?>selected<?php }?>>Nuoto</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['sport']->value == 'Pattinaggio a rotelle') {?>selected<?php }?>>Pattinaggio a rotelle</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['sport']->value == 'Pattinaggio sul ghiaccio') {?>selected<?php }?>>Pattinaggio sul ghiaccio</option>
                        </select>
                        </br>
                        <div class="form-group-sm mb-3">
                            <input type="text" class="form-control" <?php if ($_smarty_tpl->tpl_vars['name']->value != '') {?>value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"<?php }?> name="name" placeholder="Nome" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <br>
                        <div class="input-group-sm mb-3">
                            <input type="text" <?php if ($_smarty_tpl->tpl_vars['place']->value != '') {?>value="<?php echo $_smarty_tpl->tpl_vars['place']->value;?>
"<?php }?> placeholder="Luogo"  name="place" class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <br>
                        <div class="it-datepicker-wrapper">
                            <div class="input-group input-group-sm mb-3">
                                <table cellpadding="5">
                                    <tbody>
                                    <tr>
                                        <td class="my-td-title"><h4>Da : </h4></td>
                                        <td class="my-td"> <input type="date" name="dateMin" <?php if ($_smarty_tpl->tpl_vars['dateMin']->value != '') {?>value="<?php echo $_smarty_tpl->tpl_vars['dateMin']->value->format("Y-m-d");?>
" onload="setDate(form)"<?php }?>  style="width: 220px" onchange="setDate(form)"></td>
                                    </tr>
                                    <tr>
                                        <td class="my-td-title"><h4>A : </h4></td>
                                        <td class="my-td"> <input type="date" name="dateMax"  <?php if ($_smarty_tpl->tpl_vars['dateMax']->value != '') {?>value="<?php echo $_smarty_tpl->tpl_vars['dateMax']->value->format("Y-m-d");?>
" onload="setDate(form)"<?php }?>  onchange="setDate(form)" style="width: 220px"> </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <button type="submit"  class="btn btn-primary" style="width: 260px">Cerca</button>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="list-group">
                        <?php if (empty($_smarty_tpl->tpl_vars['events']->value) && $_smarty_tpl->tpl_vars['mood']->value == 'cronology') {?>
                            <h1 class="my-allert-page" > Non hai eventi in cronologia </h1>
                        <?php } elseif (empty($_smarty_tpl->tpl_vars['events']->value) && $_smarty_tpl->tpl_vars['mood']->value == 'search') {?>
                            <h1 class="my-allert-page" > La ricerca non ha dato risultati </h1>
                        <?php } elseif (empty($_smarty_tpl->tpl_vars['events']->value)) {?>
                            <h1 class="my-allert-page" > Non ci sono eventi salvati </h1>
                        <?php } else { ?>
                            <?php if ($_smarty_tpl->tpl_vars['mood']->value == 'cronology') {?>
                                <div class="row">
                                    <?php
$__section_index_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['events']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_index_0_total = $__section_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_index'] = new Smarty_Variable(array());
if ($__section_index_0_total !== 0) {
for ($__section_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] = 0; $__section_index_0_iteration <= $__section_index_0_total; $__section_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']++){
?>
                                        <div class="col-md-9">
                                            <a href="/Livent/Event/MainPage/<?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]->getId();?>
/" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['eventsImg']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)];?>
" alt="product-img" width="100" height="150" />
                                                        </div>
                                                        <div class="col-md-10">
                                                            <h3 class="mb-1"><b><?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]->getName();?>
</b></h3>
                                                            <time> <?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]->getDateStart()->format("d/m/y");?>
 - <?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]->getDateFinish()->format("d/m/y");?>
</time>
                                                            </br>
                                                            <h7 class="mb-1"><?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]->getDescription();?>
</h7>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            </br>
                                        </div>
                                        <div class="col-md-1">
                                            </br></br>
                                            <a href="/Livent/Event/Chronology/Delate/<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null);?>
/" class="remove"><i class="tf-ion-close"></i></a>
                                        </div>
                                    <?php
}
}
?>
                                </div>
                            <?php } else { ?>
                                <div class="row">
                                    <?php
$__section_index_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['events']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_index_1_total = $__section_index_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_index'] = new Smarty_Variable(array());
if ($__section_index_1_total !== 0) {
for ($__section_index_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] = 0; $__section_index_1_iteration <= $__section_index_1_total; $__section_index_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']++){
?>
                                        <div class="col-md-12">
                                            <a href="/Livent/Event/MainPage/<?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]->getId();?>
/" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['eventsImg']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)];?>
" alt="product-img" width="100" height="150" />
                                                        </div>
                                                        <div class="col-md-7">
                                                            <h3 class="mb-1"><b><?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]->getName();?>
</b></h3>
                                                            <time> <?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]->getDateStart()->format("d/m/y");?>
 - <?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]->getDateFinish()->format("d/m/y");?>
</time>
                                                            <h7 class="mb-1"><?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]->getDescription();?>
</h7>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            </br>
                                        </div>
                                    <?php
}
}
?>
                                </div>
                            <?php }?>
                        <?php }?>
                    </div><!-- /.modal -->
                </div>
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
