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
                    {if ('' != $user && ($user->getType() eq 'Administrator'))}
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
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><img class="avatar" src="{$profileImg}" alt="image" /></a>
                        <div class="dropdown-menu cart-dropdown center-element" >
                            <!-- Cart Item -->
                            <div class="media">
                                <img class="media-object" src="{$profileImg}" alt="image" />
                                <div class="media-body">
                                    <h4 class="media-heading">{$user->getUsername()}</h4>
                                    </br>
                                    <h4 class="media-heading">{$user->getEmail()}</h4>
                                </div>
                            </div><!-- / Cart Item -->
                            <!-- Cart Item -->
                            <ul class="text-center cart-buttons">
                                <li><a href="/Livent/User/UpdatePage/"  class="btn btn-small btn-solid-border">Aggiorna</a></li>
                                <li><a href="/Livent/User/Logout/" class="btn btn-small btn-solid-border" >Logout</a></li>
                            </ul>
                        </div>

                    </li><!-- / User -->

                    {elseif '' != $user}
                    <li class="dropdown cart-nav dropdown-slide" >
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><img class="avatar" src="{$profileImg}" alt="image" /></a>
                        <div class="dropdown-menu cart-dropdown">
                            <!-- Cart Item -->
                            <div class="media">
                                <a class="pull-left" href="/Livent/User/Profile/">
                                    <img class="media-object" src="{$profileImg}" alt="image" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{$user->getUsername()}</h4>
                                    </br>
                                    <h4 class="media-heading">{$user->getEmail()}</h4>
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
                {else}
                <!-- / Login -->
                <a href="/Livent/User/LoginPage/"><i class="tf-ion-android-person"></i> Login</a>
                <!-- / Login -->
                {/if}
                <!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section>
<!-- End Top Header Bar -->

<section class="single-product">
    <div class="container">
        <div class="row mt-20">
            <div class="col-md-4">
                <img class="img-responsive" src="{$eventImg}" alt="product-img" />
                {if '' != $user && $user->getType() == 'Organizer' && $mood eq 'permit'}
                    <ul class="top-menu">
                        <li class="dropdown dropdown-slide ">
                            <a href="#!" class="dropdown-toggle btn btn-transparent mt-20" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                               role="button" aria-haspopup="true" aria-expanded="false"><i class="tf-ion-android-settings"></i> impostazioni</a>
                            <ul class="dropdown-menu">
                                <li><a href="/Livent/Event/UpdatePage/{$event->getId()}/">Modifica Evento</a></li>
                                <li><a href="/Livent/Event/DeletePage/{$event->getId()}/">Cancella Evento</a></li>
                            </ul>
                        </li>
                    </ul>
                {/if}
            </div>
            <div class="col-md-7">
                <div class="single-product-details">
                    <h2>{$event->getName()}</h2>
                    {if !empty($event->getCompetitions())}<p class="product-price"><time>{$event->getCompetition(0)->getDateTime()->format("d-m-y")}</time></p>
                    {else}<p class="product-price"><time>data da stabilire</time>{/if}
                    <p class="product-description mt-20">{$event->getDescription()}</p>
                    {if '' != $user && $user->getType() == 'Organizer' && $mood eq 'permit'}
                        <a href="/Livent/Competition/NewPage/{$event->getId()}/" class="btn btn-main btn-small btn-round-full">Nuova Competizione</a>
                    {/if}
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {if empty($competitions)}
                    <br>
                    <br>
                    <h1 class="my-allert-page">Non ci sono competizioni</h1>
                {else}
                    <div class="media">
                        <div class="dashboard-wrapper dashboard-user-profile">
                            <div class="dashboard-wrapper user-dashboard">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nome Competizione</th>
                                            <th>Distanza</th>
                                            <th>Genere</th>
                                            <th>Sport</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {section name=index loop=$competitions}
                                            <tr>
                                                <td>{$competitions[index]->getName()}</td>
                                                <td>{$competitions[index]->getDistance()->toString()}</td>
                                                <td>{$competitions[index]->getGender()}</td>
                                                <td>{$competitions[index]->getSport()}</td>
                                                <td class="text-right">
                                                    <a href="/Livent/Competition/MainPage/{$competitions[index]->getId()}/" class="btn btn-main btn-small btn-round-full">Visualizza</a>
                                                </td>
                                                {if '' != $user && $user->getType() == 'Organizer' && $mood eq 'permit'}
                                                <td>
                                                    <a href="/Livent/Competition/DeletePage/{$competitions[index]->getId()}/" class="btn btn-main btn-big btn-transparent"><i class="tf-ion-ios-trash-outline my-icon-size"></i></a>
                                                </td>
                                                {/if}
                                            </tr>
                                        {/section}
                                        </tbody
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                {/if}
            </div>
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