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
                    <form method="post" {if $event!=""}action="/Livent/Event/Update/{$event->getId()}/"{else} action="/Livent/Event/Create/" {/if} class="text-left clearfix" name="createForm" enctype="multipart/form-data">
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
                            <input type="text" {if $event!=""}value="{$event->getName()}"{/if} name="name" class="form-control" placeholder="Nome evento" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <h4>Luogo:</h4>
                            <input type="text" {if $event!=""}value="{$event->getPlace()}"{/if} placeholder="Luogo"  name="place" class="form-control" required>
                        </div>
                        <br>
                        <br>
                        <div>
                            <input type="radio" name="public?" value="public" {if $event!="" && $event->getPublic()}checked{/if}/><b>Pubblico</b>
                            <input type="radio" name="public?" value="private" {if $event!="" && !$event->getPublic()}checked{/if}/><b>Privato</b>
                        </div>
                        <br>
                        <div class="form-group">
                            <h4>Descrizione:</h4>
                            <textarea placeholder="Scrivi la descrizione..." name="description" class="form-control" cols="20" rows="4">{if $event!=""}{$event->getDescription()}{/if}</textarea>
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
<!--MyJavaScript -->
<script src="{$dir}/js/myScript.js"></script>




</body>
</html>
