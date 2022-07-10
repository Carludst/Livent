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
                    <h1 class="page-name">Nuovo Evento</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Nuovo Evento</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="products section" >
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="block text-center">
                    <form method="post" action="#" name="createForm" enctype="multipart/form-data">
                        </br>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" {if $event!=""}value="{$event->getName()}"{/if} name="name" class="form-control" placeholder="Nome evento" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <br>
                        <div class="input-group-sm mb-3">
                            <input type="text" {if $event!=""}value="{$event->getPlace()}"{/if} placeholder="Luogo"  name="place" class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <br>
                        <fieldset>
                            <input type="radio" name="public?" value="public" {if $event->getPublic()==true}checked{/if}>
                            <label for="pubblico">Pubblico</label><br>
                            <input type="radio" name="public?" value="private" {if $event->getPublic()==false}checked{/if}>
                            <label for="privato">Privato</label><br>
                        </fieldset>
                        <br>
                        <h2>contatti:</h2>
                        <br>
                        <h3>contatto 1:</h3>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" {if $event !="" && $event->getContact(0)!=""}value="{$event->getContact(0)->getName()}"{/if} name="nameContact1" placeholder="nome" class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="email" {if $event !="" && $event->getContact(0)!=""}value="{$event->getContact(0)->getEmail()}"{/if} name="email1" placeholder="Email" class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="tel" {if $event !="" && $event->getContact(0)!=""}value="{$event->getContact(0)->getPhoneNumber()}"{/if} name="telephone1" placeholder="Es. +39..." class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm"  />
                        </div>
                        <br>
                        <h3>contatto 2:</h3>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" {if $event !="" && $event->getContact(1)!=""}value="{$event->getContact(1)->getName()}"{/if} name="nameContact2" placeholder="nome" class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="email" {if $event !="" && $event->getContact(1)!=""}value="{$event->getContact(1)->getEmail()}"{/if} name="email2" placeholder="Email" class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="tel" {if $event !="" && $event->getContact(1)!=""}value="{$event->getContact(1)->getPhoneNumber()}"{/if} name="telephone2" placeholder="Es. +39..." class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm"  />
                        </div>
                        <br>
                        <h3>contatto 3:</h3>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" {if $event !="" && $event->getContact(2)!=""}value="{$event->getContact(2)->getName()}"{/if} name="nameContact2" placeholder="nome" class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="email" {if $event !="" && $event->getContact(2)!=""}value="{$event->getContact(2)->getEmail()}"{/if} name="email3" placeholder="Email" class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="tel" {if $event !="" && $event->getContact(2)!=""}value="{$event->getContact(2)->getPhoneNumber()}"{/if} name="telephone3" placeholder="Es. +39..." class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm"  />
                        </div>
                        <br>
                        <div>
                            <p>Descrizione:</p>
                            <textarea {if $event!=""}value="{$event->getDescription()}"{/if} name="description" cols="20" rows="4">Scrivi la descrizione...</textarea>
                        </div>
                        <br>
                        <label for="avatar">Scegli una foto per l'evento:</label>
                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                    </form>
                    <br>
                    <button type="submit" class="btn btn-primary" style="width: 260px">Conferma</button>
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
