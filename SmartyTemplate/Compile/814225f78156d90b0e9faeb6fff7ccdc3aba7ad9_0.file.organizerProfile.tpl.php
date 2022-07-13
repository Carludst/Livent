<?php
/* Smarty version 4.1.1, created on 2022-07-12 18:44:44
  from 'C:\xampp\htdocs\public_html\Livent\SmartyTemplate\Template\organizerProfile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62cda4fc1f2294_90791774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '814225f78156d90b0e9faeb6fff7ccdc3aba7ad9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\public_html\\Livent\\SmartyTemplate\\Template\\organizerProfile.tpl',
      1 => 1657644277,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62cda4fc1f2294_90791774 (Smarty_Internal_Template $_smarty_tpl) {
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

<body id="body">
<!-- Start Top Header Bar -->

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
                        <a href="/Livent/">Home</a>
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
                    <li class="dropdown ">
                        <a href="/Livent/User/Logout/"><i class="tf-ion-android-person"></i> Logout</a>
                    </li>
            </div>
        </div>
    </div>
</section>
<!-- End Top Header Bar -->

<section class="page-header dashboard-wrapper dashboard-user-profile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="media">
                    <div class="pull-left text-center" href="#!">
                        <img class="media-object user-img" src="<?php echo $_smarty_tpl->tpl_vars['profileImg']->value;?>
" alt="Image">
                        <ul class="top-menu">
                            <li class="dropdown dropdown-slide ">
                                <a href="#!" class="dropdown-toggle btn btn-transparent mt-20" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                                   role="button" aria-haspopup="true" aria-expanded="false"><i class="tf-ion-android-settings"></i> impostazioni</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/Livent/User/UpdatePage/">Modifica Profilo</a></li>
                                    <li><a href="/Livent/User/Delete/">Cancella Profilo</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="media-body">
                        <ul class="user-profile-list">
                            <li><span>Username:</span><?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
</li>
                            <li><span>Email:</span><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</li>
                            <br>
                            <br>
                            <li class="li"><a href="/Livent/Event/NewPage/" class="btn btn-main btn-small btn-round-full">Nuovo Evento</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="products section">
    <?php if (empty($_smarty_tpl->tpl_vars['events']->value)) {?>
        <h1 class="my-allert-page" > Non ci sono eventi </h1>
    <?php } else { ?>
        <div class="container">
            <div class="row">
                <?php if (empty($_smarty_tpl->tpl_vars['events']->value)) {?>
                    <div class="title text-center">
                        <h2>Eventi</h2>
                    </div>
                <?php }?>
            </div>
            <div class="row">
                <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['events']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['eventImg']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
" alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <a href="/Livent/Event/MainPage/<?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getId();?>
/" ><i class="tf-ion-ios-paper-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getName();?>
</h4>
                                <?php if (!empty($_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCompetitions())) {?><time><?php echo $_smarty_tpl->tpl_vars['events']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCompetition(0)->getDateTime()->format("d-m-y");?>
</time>
                                <?php } else { ?><time>Data da stabile</time><?php }?>
                            </div>
                        </div>
                    </div>
                <?php
}
}
?>
            </div>
        </div>
    <?php }?>
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
