<!-- 
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
  <link rel="shortcut icon" type="image/x-icon" href="{$logo}" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{$dir}/plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{$dir}/plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="{$dir}/plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{$dir}/plugins/slick/slick.css">
  <link rel="stylesheet" href="{$dir}/plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{$dir}/css/style.css">
	<link rel="stylesheet" href="{$dir}/css/myStyle.css">

</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<ul class="top-menu text-left list-inline">
					<li class="dropdown ">
						<a href="/Livent/User/Logout/"><i class="tf-ion-android-person" ></i>Logout</a>
					</li>
				</ul>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
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
			<div class="col-md-4 col-xs-12 col-sm-4">
				<ul class="top-menu text-right list-inline">
					<!-- Home -->
					<li class="dropdown ">
						<a href="/Livent/" >Home</a>
					</li>
					<!-- / Home -->
					<!-- / Search -->
					<li class="dropdown dropdown-slide">
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
							<li><a href="buttons.html">Imposta grafica</a></li>
							<li><a href="alerts.html">Gestione utenti</a></li>
						</ul>
					</li>
					<!-- / System -->
			</div>
		</div>
	</div>
</section>



<div class="title text-center">
	<h2>immagini Home</h2>
</div>
<div class="hero-slider">
	{section name=index loop=$homeImg}
	<div class="slider-item th-fullpage hero-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-0">
					<img class="media my-dimension-home-img" src="{$homeImg[index]['file']}" alt="image" />
				</div>
				<div class="col-lg-9 text-left ">
					<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">{$homeImg[index]['name']}</p>
					<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">La bellezza dello sport     <br> è la condivisione.     </h1>
					<a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.html">Elimina</a>
				</div>
			</div>
		</div>
	</div>
	{/section}
</div>
<form method="post" class="text-left clearfix form-inline" action="/Livent/Graphics/HomeImg/Set/" enctype="multipart/form-data">
	<table class="my-table">
		<tbody>
		<td>
			<input  class="btn-solid-border center-element" name="imageHome" accept="image/png, image/jpeg" type="file">
		</td>
		<td>
			<input type="text" class=" text-center center-element " placeholder="nome">
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
			<img src="{$logoImg}" alt="" class="my-center-img" />
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
		<img src="{$eventImg}" alt="" class="my-center-img" />
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
		<img src="{$userImg}" alt="" class="my-center-img" />
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
    <script src="{$dir}/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{$dir}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{$dir}/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="{$dir}/plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{$dir}/plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="{$dir}/plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="{$dir}/plugins/slick/slick.min.js"></script>
    <script src="{$dir}/plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{$dir}/plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="{$dir}/js/script.js"></script>
    


  </body>
  </html>
