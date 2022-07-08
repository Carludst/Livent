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

<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                {if '' != $user && $user->getType() eq 'Administrator'}
                    <ul class="top-menu text-left list-inline">
                        <li class="dropdown ">
                            <a href="/Livent/User/Logout/"><i class="tf-ion-android-person" ></i>Logout</a>
                        </li>
                    </ul>
                {else}
                    <div class="contact-number">
                        <i class="tf-ion-ios-telephone"></i>
                        <span>0129- 12323-123123</span>
                    </div>
                {/if}
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="index.html">
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
                <!-- Cart -->
                <ul class="top-menu text-right list-inline">
                    <!-- Home -->
                    <li class="dropdown ">
                        <a href="/Livent/" >Home</a>
                    </li><!-- / Home -->
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
                    {if '' != $user && $user->getType() eq 'Administrator'}
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
                    <!-- User -->
                    {elseif '' != $user }
                    <li class="dropdown cart-nav dropdown-slide" >
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><img class="avatar" src="{$profileImg}" alt="image" /></a>
                        <div class="dropdown-menu cart-dropdown">
                            <!-- Cart Item -->
                            <div class="media">
                                <a class="pull-left" href="#!">
                                    <img class="media-object" src="{$profileImg}" alt="image" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#!">{$user->getUsername()}</a></h4>
                                    </br>
                                    <h4 class="media-heading"><a href="#!">{$user->getEmail()}</a></h4>
                                </div>
                            </div><!-- / Cart Item -->
                            <!-- Cart Item -->
                            <ul class="text-center cart-buttons">
                                <li><a href="/Livent/User/ProfilePage/" class="btn btn-small">View Profile</a></li>
                                <li><a href="/Livent/User/Logout/" class="btn btn-small btn-solid-border">Logout</a></li>
                            </ul>
                        </div>

                    </li><!-- / User -->

                {else}
                <!-- / Login -->
                <a href="/Livent/User/LoginPage/"><i class="tf-ion-android-person"></i> Login</a>
                <!-- / Login -->
                {/if}
                <li class="dropdown cart-nav dropdown-slide" >
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-android-settings"></i></a>
                    <div class="dropdown-menu cart-dropdown">
                        <ul class="text-center cart-buttons">
                            <div><a href="/Livent/User/ProfilePage/" style="width: 100%" class="btn btn-small btn-solid-border">Modifica</a></div>
                            <div><a href="/Livent/User/Logout/" style="width: 100%" class="btn btn-small btn-solid-border">Elimina</a></div>
                        </ul>
                    </div>
                </li>
                </ul><!-- / .nav .navbar-nav .navbar-right -->
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
                    <div class="row">
                        <h2 class="text-center">{$athlete->getName()} {$athlete->getSurname()} ({$athlete->getId()})</h2>
                        <br>
                            <table class="my-table" >
                                <tbody>
                                <td><h5 class="my-td-trasparent" >Data di nascita : </h5><h4 class="inline">{$athlete->getBirthDate()->format("d/m/y")}</h4></td>
                                <td><h5 class="my-td-trasparent" >Sport praticato : </h5><h4 class="inline">{$athlete->getSport()}</h4></td>
                                <td><h5 class="my-td-trasparent" >Società : </h5><h4 class="inline">{$athlete->getTeam()}</h4></td>
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
        <form method="post" action="#" name="searchForm" >
            <select class="form-control my-option-title">
                <option>Qualsiasi Sport</option>
                <option>Atletica</option>
                <option>Ciclismo</option>
                <option>Nuoto</option>
                <option>Pattinaggio a rotelle</option>
                <option>Pattinaggio sul ghiaccio</option>
            </select>
        </form>
    </section>
    <div class="container">
        {section name=i loop=$results}
        <div class="row">
            <div class="title text-center">
                <h2>i tuoi eventi</h2>
            </div>
        </div>

        <div class="row">
            <table class="table my-table">
                <thead>
                <tr>
                    <td><b>Data</b></td>
                    <td><b>Distanza</b></td>
                    <td><b>Tempo</b></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                {section name=index loop=$results[i]}
                <tr>
                    <td>{$results[i][index]['competition']->getDateTime()->format("d/m/y")}</td>
                    <td>{$results[i][index]['competition']->getDistance()}</td>
                    <td>{$results[i][index]['time']->toString()}</td>
                    <td><a href="/Livent/Competition/MainPage/" class="btn btn-default">Visualizza</a></td>
                </tr>
                {/section}
                </tbody>
            </table>
            {/section}
        </div>
    </div>
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