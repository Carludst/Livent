<?php
/* Smarty version 4.1.1, created on 2022-07-16 11:28:05
  from '/Applications/MAMP/htdocs/Livent/SmartyTemplate/Template/mainAthlete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62d2a0c524c3a3_97739163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '352101f5da45a28759d49873e88202d1cb610e8f' => 
    array (
      0 => '/Applications/MAMP/htdocs/Livent/SmartyTemplate/Template/mainAthlete.tpl',
      1 => 1657785288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d2a0c524c3a3_97739163 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/css/myStyle.css">

</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span>0129- 12323-123123</span>
                </div>
            </div>
            <div class="col-md-2 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="/Livent/">
                        <!-- replace logo here -->
                        <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                               font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="108.94" y="325">Livent</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-5 col-xs-12 col-sm-4">
                <ul class="top-menu text-right list-inline">
                    <!-- Home -->
                    <li class="dropdown ">
                        <a href="/Livent/" >Home</a>
                    </li>
                    <!-- / Home -->
                    <!-- / Search -->
                    <li class="dropdown dropdown-slide ">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false"><i class="tf-ion-android-search"></i> Search<span
                                    class="tf-ion-ios-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/Livent/Event/Search/">Evento</a></li>
                            <li><a href="/Livent/Athlete/Search/">Atleta</a></li>
                            <li><a href="/Livent/Competition/Search/">Competizione</a></li>
                        </ul>
                    </li>
                    <!-- / Search -->
                    <!-- / System -->
                    <?php if ('' != $_smarty_tpl->tpl_vars['user']->value && $_smarty_tpl->tpl_vars['user']->value->getType() == 'Administrator') {?>
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false"><i class="tf-ion-ios-settings-strong"></i> System<span
                                    class="tf-ion-ios-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="typography.html">Errori</a></li>
                            <li><a href="/Livent/Graphics/">Imposta grafica</a></li>
                            <li><a href="/Livent/User/Search/">Gestione utenti</a></li>
                            <li><a href="/Livent/Athlete/NewPage/">Crea Atleta</a></li>
                        </ul>
                    </li>
                    <!-- / System -->
                    <!-- User -->
                    <li class="dropdown cart-nav dropdown-slide" >
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><img class="avatar" src="<?php echo $_smarty_tpl->tpl_vars['profileImg']->value;?>
" alt="image" /></a>
                        <div class="dropdown-menu cart-dropdown center-element" >
                            <!-- Cart Item -->
                            <div class="media">
                                <img class="media-object" src="<?php echo $_smarty_tpl->tpl_vars['profileImg']->value;?>
" alt="image" />
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
</h4>
                                    </br>
                                    <h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</h4>
                                </div>
                            </div><!-- / Cart Item -->
                            <!-- Cart Item -->
                            <ul class="text-center cart-buttons">
                                <li><a href="/Livent/User/UpdatePage/"  class="btn btn-small btn-solid-border">Aggiorna</a></li>
                                <li><a href="/Livent/User/Logout/" class="btn btn-small btn-solid-border" >Logout</a></li>
                            </ul>
                        </div>

                    </li><!-- / User -->

                    <?php } elseif ('' != $_smarty_tpl->tpl_vars['user']->value) {?>
                    <li class="dropdown cart-nav dropdown-slide" >
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><img class="avatar" src="<?php echo $_smarty_tpl->tpl_vars['profileImg']->value;?>
" alt="image" /></a>
                        <div class="dropdown-menu cart-dropdown">
                            <!-- Cart Item -->
                            <div class="media">
                                <a class="pull-left" href="/Livent/User/Profile/">
                                    <img class="media-object" src="<?php echo $_smarty_tpl->tpl_vars['profileImg']->value;?>
" alt="image" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
</h4>
                                    </br>
                                    <h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</h4>
                                </div>
                            </div><!-- / Cart Item -->
                            <!-- Cart Item -->
                            <ul class="text-center cart-buttons">
                                <li><a href="/Livent/User/UpdatePage/"  class="btn btn-small btn-solid-border">Aggiorna</a></li>
                                <li><a href="/Livent/User/ProfilePage/" class="btn btn-small btn-solid-border">View Profile</a></li>
                                <a href="/Livent/User/Logout/" class="btn btn-small btn-solid-border" style="width: 100%">Logout</a>
                            </ul>
                        </div>

                    </li><!-- / User -->
                </ul>

                <?php } else { ?>
                <!-- / Login -->
                <a href="/Livent/User/LoginPage/"><i class="tf-ion-android-person"></i> Login</a>
                <!-- / Login -->
                <?php }?>
                <!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section>
<!-- End Top Header Bar -->



<section class="page-header ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>

                    <!-- / Setting -->
                    <?php if ('' != $_smarty_tpl->tpl_vars['user']->value && $_smarty_tpl->tpl_vars['user']->value->getType() == 'Administrator') {?>
                        <ul class="text-center">
                            <li class="inline"><a class="btn btn-transparent mt-20" href="/Livent/Athlete/UpdatePage/<?php echo $_smarty_tpl->tpl_vars['athlete']->value->getId();?>
/">Modifica</a></li>
                        </ul>
                    <?php }?>
                    <!-- / Setting -->

                    <div class="row">
                        <h2 class="text-center"><?php echo $_smarty_tpl->tpl_vars['athlete']->value->getName();?>
 <?php echo $_smarty_tpl->tpl_vars['athlete']->value->getSurname();?>
 (<?php echo $_smarty_tpl->tpl_vars['athlete']->value->getId();?>
)</h2>
                        <br>
                        <table class="my-table" >
                            <tbody>
                            <td><h5 class="my-td-transparent" >Data di nascita : </h5><h4 class="inline"><?php echo $_smarty_tpl->tpl_vars['athlete']->value->getBirthDate()->format("d/m/y");?>
</h4></td>
                            <td><h5 class="my-td-transparent" >Sport praticato : </h5><h4 class="inline"><?php echo $_smarty_tpl->tpl_vars['athlete']->value->getSport();?>
</h4></td>
                            <td><h5 class="my-td-transparent" >Società : </h5><h4 class="inline"><?php echo $_smarty_tpl->tpl_vars['athlete']->value->getTeam();?>
</h4></td>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>






<section class="products section ">
    <section class="menu">
        <form method='get' action="/Livent/Athlete/MainPage/<?php echo $_smarty_tpl->tpl_vars['athlete']->value->getId();?>
/" id="form" >
            <select class="form-control my-option-title" name="sport" onchange="requireMainAthletePage()">
                <option <?php if ($_smarty_tpl->tpl_vars['sport']->value == 'Atletica') {?>selected<?php }?>>Atletica</option>
                <option <?php if ($_smarty_tpl->tpl_vars['sport']->value == 'Ciclismo') {?>selected<?php }?>>Ciclismo</option>
                <option <?php if ($_smarty_tpl->tpl_vars['sport']->value == 'Nuoto') {?>selected<?php }?>>Nuoto</option>
                <option <?php if ($_smarty_tpl->tpl_vars['sport']->value == 'Pattinaggio a rotelle') {?>selected<?php }?>>Pattinaggio a rotelle</option>
                <option <?php if ($_smarty_tpl->tpl_vars['sport']->value == 'Pattinaggio sul ghiaccio') {?>selected<?php }?>>Pattinaggio sul ghiaccio</option>
            </select>
        </form>
    </section>
    <div class="container">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['results']->value, 'element', false, 'typeSport');
$_smarty_tpl->tpl_vars['element']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['typeSport']->value => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->do_else = false;
?>
        <div class="row">
            <div class="title text-center">
                <h2><?php echo $_smarty_tpl->tpl_vars['typeSport']->value;?>
</h2>
            </div>
        </div>

        <div class="row">
            <table class="table my-table" >
                <thead>
                <tr>
                    <td style="width: 25%"><b>Data</b></td>
                    <td style="width: 25%"><b>Distanza</b></td>
                    <td style="width: 25%"><b>Tempo</b></td>
                    <td style="width: 25%"></td>
                </tr>
                </thead>
                <tbody>
                <?php
$__section_index_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['element']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_index_0_total = $__section_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_index'] = new Smarty_Variable(array());
if ($__section_index_0_total !== 0) {
for ($__section_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] = 0; $__section_index_0_iteration <= $__section_index_0_total; $__section_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']++){
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['element']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['competition']->getDateTime()->format("d/m/y");?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['element']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['competition']->getDistance()->toString();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['element']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['time']->toString();?>
</td>
                        <td><a href="/Livent/Competition/MainPage/<?php echo $_smarty_tpl->tpl_vars['element']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['competition']->getId();?>
/" class="btn btn-default">Visualizza competizione</a></td>
                    </tr>
                <?php
}
}
?>
                </tbody>
            </table>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/js/myScript.js"><?php echo '</script'; ?>
>



</body>
</html><?php }
}
