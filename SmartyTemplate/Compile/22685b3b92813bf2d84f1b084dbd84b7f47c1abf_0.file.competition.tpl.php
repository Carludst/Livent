<?php
/* Smarty version 4.1.1, created on 2022-07-16 06:53:50
  from 'C:\xampp\htdocs\Livent\SmartyTemplate\Template\competition.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62d2445edbc122_19817824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22685b3b92813bf2d84f1b084dbd84b7f47c1abf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Livent\\SmartyTemplate\\Template\\competition.tpl',
      1 => 1657947226,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d2445edbc122_19817824 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <?php if ('' != $_smarty_tpl->tpl_vars['user']->value) {?>
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

<section class="single-product">
    <div class="container">
        <div class="row mt-20">
            <div class="single-product-details">
                <h2><b><?php echo $_smarty_tpl->tpl_vars['competition']->value->getName();?>
 (<?php echo $_smarty_tpl->tpl_vars['competition']->value->getSport();?>
)</b></h2>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <h3><b>Informazioni:</b></h3>
            <br>
            <br>
            <table class="table">
                <thead>
                <tr>
                    <th><p><b>Evento:</b></p></th>
                    <th><p><b>Inizio:</b></p></th>
                    <th><p><b>Sport:</b></p></th>
                    <th><p><b>Genere:</b>  </p></th>
                    <th><p><b>Distanza:</b></p></th>
                    <th><p><b>Descrizione:</b></p></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="/Livent/Event/MainPage/<?php echo $_smarty_tpl->tpl_vars['event']->value->getId();?>
/"><?php echo $_smarty_tpl->tpl_vars['event']->value->getName();?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['competition']->value->getDateTime()->format('d-m-y H:i:s');?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['competition']->value->getSport();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['competition']->value->getGender();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['competition']->value->getDistance()->toString();?>
</td><!--distance-->
                    <td><?php echo $_smarty_tpl->tpl_vars['competition']->value->getDescription();?>
</td>
                </tr>
                </tbody>
            </table>
            <br>
            <br>
            <h4>Atleti iscritti:</h4>
            <br>
            <?php if (empty($_smarty_tpl->tpl_vars['competition']->value->getRegistrations())) {?>
                <h1 class="my-allert-page">Non ci sono ancora atleti iscritti</h1>
            <?php } else { ?>
            <table class="table">
                <thead>
                <tr>
                    <th>ID atleta</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->getId() == $_smarty_tpl->tpl_vars['event']->value->getOrganizer()->getId()) {?>
                        <th></th>
                    <?php }?>
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['competition']->value->getRegistrations(), 'athlete');
$_smarty_tpl->tpl_vars['athlete']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['athlete']->value) {
$_smarty_tpl->tpl_vars['athlete']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['athlete']->value->getId();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['athlete']->value->getName();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['athlete']->value->getSurname();?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->getId() == $_smarty_tpl->tpl_vars['event']->value->getOrganizer()->getId()) {?>
                            <td><a href="/Livent/Registration/DeletePage/<?php echo $_smarty_tpl->tpl_vars['athlete']->value->getId();?>
I<?php echo $_smarty_tpl->tpl_vars['competition']->value->getId();?>
/" class="btn btn-main btn-small btn-round-full">Elimina</a></td>
                        <?php }?>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
            <?php }?>
            <br>
            <br>
            <br>
            <table>
                <thead>
                <tr>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->getId() == $_smarty_tpl->tpl_vars['event']->value->getOrganizer()->getId()) {?>
                        <td class="my-td"><a class="btn btn-main text-center" href="/Livent/Competition/UpdatePage/<?php echo $_smarty_tpl->tpl_vars['competition']->value->getId();?>
/"><b>Modifica Competizione</b></a></td>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['mood']->value == 'permit' && (($_smarty_tpl->tpl_vars['user']->value->getType() != 'Organizer' && $_smarty_tpl->tpl_vars['user']->value->getType() != 'Administrator') || $_smarty_tpl->tpl_vars['user']->value->getId() == $_smarty_tpl->tpl_vars['event']->value->getOrganizer()->getId())) {?>
                        <td class="my-td"><a class="btn btn-main text-center" href="/Livent/Registration/NewPage/<?php echo $_smarty_tpl->tpl_vars['competition']->value->getId();?>
/"><b>Iscrivi un nuovo atleta</b></a></td>
                    <?php }?>
                    <td class="my-td"><a class="btn btn-main text-center" href="/Livent/Result/NewPage/<?php echo $_smarty_tpl->tpl_vars['competition']->value->getId();?>
/"><b>Risultati</b></a></td>
                </tr>
                </thead>
            </table>
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



</body>
</html><?php }
}
