<?php
/* Smarty version 4.1.1, created on 2022-07-15 15:02:55
  from 'C:\xampp\htdocs\Livent\SmartyTemplate\Template\setGraphic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62d1657f1a7434_50380071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c850d949292bc414ce84fd64929f250fd58bf19' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Livent\\SmartyTemplate\\Template\\setGraphic.tpl',
      1 => 1657889942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d1657f1a7434_50380071 (Smarty_Internal_Template $_smarty_tpl) {
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
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
						   role="button" aria-haspopup="true" aria-expanded="false"><i class="tf-ion-ios-settings-strong"></i> System<span
									class="tf-ion-ios-arrow-down"></span></a>
						<ul class="dropdown-menu">
							<li><a href="typography.html">Errori</a></li>
							<li><a href="/Livent/Graphics/">Imposta grafica</a></li>
							<li><a href="/Livent/User/Search/">Gestione utenti</a></li>
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
				</ul>


				<!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section>
<!-- End Top Header Bar -->



<div class="title text-center">
	<h2>immagini Home</h2>
</div>
<div class="hero-slider">
	<?php
$__section_index_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['homeImg']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_index_0_total = $__section_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_index'] = new Smarty_Variable(array());
if ($__section_index_0_total !== 0) {
for ($__section_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] = 0; $__section_index_0_iteration <= $__section_index_0_total; $__section_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']++){
?>
	<div class="slider-item th-fullpage hero-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-0">
					<img class="media my-dimension-home-img" src="<?php echo $_smarty_tpl->tpl_vars['homeImg']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['file'];?>
" alt="image" />
				</div>
				<div class="col-lg-9 text-left ">
					<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1"><?php echo $_smarty_tpl->tpl_vars['homeImg']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['name'];?>
</p>
					<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">La bellezza dello sport     <br> è la condivisione.     </h1>
					<a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="/Livent/Graphics/HomeImg/Delate/<?php echo $_smarty_tpl->tpl_vars['homeImg']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['name'];?>
/">Elimina</a>
				</div>
			</div>
		</div>
	</div>
	<?php
}
}
?>
</div>
<form method="post" class="text-left clearfix form-inline" action="/Livent/Graphics/HomeImg/Set/" enctype="multipart/form-data">
	<table class="my-table">
		<tbody>
		<td>
			<input  class="btn-solid-border center-element" name="imageHome"  accept="image/png, image/jpeg" type="file">
		</td>
		<td>
			<input type="text" name="nameHomeImg" class=" text-center center-element " placeholder="nome">
		</td>
		<td>
			<button type="submit" class="btn btn-main text-center center-element btn-solid-border">Carica</button>
		</td>
		</tbody>
	</table>
</form>


<section class="product-category section">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Logo</h2>
			</div>
		</div>
		<div>
			<img src="<?php echo $_smarty_tpl->tpl_vars['logoImg']->value;?>
" alt="" class="my-center-img" />
		</div>
		<br>
		<form method="post" class="text-left clearfix form-inline" action="/Livent/Graphics/Logo/Set/" enctype="multipart/form-data">
			<table class="my-table central-element-50">
				<tbody>
				<td>
					<input  class="btn-solid-border center-element" name="imageLogo" accept="image/png, image/jpeg" type="file">
				</td>
				<td>
					<button type="submit" class="btn btn-main text-center center-element btn-solid-border">Carica</button>
				</td>
				</tbody>
			</table>
		</form>
		<br>
		<div class="title text-center">
			<h2>Default Evento</h2>
		</div>
	</div>
	<div>
		<img src="<?php echo $_smarty_tpl->tpl_vars['eventImg']->value;?>
" alt="" class="my-center-img" />
	</div>
	<br>
	<form method="post" class="text-left clearfix form-inline" action="/Livent/Graphics/DefaultEvent/Set/" enctype="multipart/form-data">
	<table class="my-table central-element-50">
		<tbody>
		<td>
			<input  class="btn-solid-border center-element" name="imageEvent" accept="image/png, image/jpeg" type="file">
		</td>
		<td>
			<button type="submit" class="btn btn-main text-center center-element btn-solid-border">Carica</button>
		</td>
		</tbody>
	</table>
	</form>
	<br>
	<div class="title text-center">
		<h2>Default Profilo</h2>
	</div>
	</div>
	<div class="category-box">
		<img src="<?php echo $_smarty_tpl->tpl_vars['userImg']->value;?>
" alt="" class="my-center-img" />
	</div>
	<form method="post" class="text-left clearfix form-inline" action="/Livent/Graphics/DefaultProfile/Set/" enctype="multipart/form-data">
	<table class="my-table central-element-50">
		<tbody>
		<td>
			<input  class="btn-solid-border center-element" name="imageProfile" accept="image/png, image/jpeg" type="file">
		</td>
		<td>
			<button type="submit" class="btn btn-main text-center center-element btn-solid-border">Carica</button>
		</td>
		</tbody>
	</table>
	</form>
	<br>
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
  </html>
<?php }
}
