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
                    <h1 class="page-name">Nuovo atleta</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Nuovo atleta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="signin-page account" >
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="block text-center">
                    <h2 class="text-center"><b>Crea il nuovo Atleta</b></h2>
                    <form method="post" class="text-left clearfix" {if $athlete!=""}action="/Livent/Athlete/Update/"{/if} name="createForm">
                        <h3>Inserimento dati:</h3>
                        <div class="form-group">
                            <input type="text" {if $athlete!=""}value="{$athlete->getName()}"{/if} name="name" class="form-control" placeholder="Nome">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" {if $athlete!=""}value="{$athlete->getSurname()}"{/if} name="surname" placeholder="Cognome" class="form-control">
                        </div>
                        <br>
                        <h4>Sport praticato:</h4>
                        <select class="form-control" name="sport">
                            <option {if $athlete!="" && $athlete->getSport()=='Atletica'}selected{/if} value="atletica">Atletica</option>
                            <option {if $athlete!="" && $athlete->getSport()=='Ciclismo'}selected{/if} value="ciclismo">Ciclismo</option>
                            <option {if $athlete!="" && $athlete->getSport()=='Nuoto'}selected{/if} value="nuoto">Nuoto</option>
                            <option {if $athlete!="" && $athlete->getSport()=='Pattinaggio a rotelle'}selected{/if} value="pattrot">Pattinaggio a rotelle</option>
                            <option {if $athlete!="" && $athlete->getSport()=='Pattinaggio sul ghiaccio'}selected{/if} value="pattghi">Pattinaggio sul ghiaccio</option>
                        </select>
                        <br>
                        <div class="form-group">
                            <input type="text" {if $athlete!=""}value="{$athlete->getTeam()}"{/if} name="team" placeholder="Team" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <table cellpadding="5">
                                <h4>Data di nascita : </h4>
                                <input type="date" {if $athlete!=""}value="{$athlete->getBirthdate()}"{/if} name="date" class="form-control">
                            </table>
                        </div>
                        <br>
                        <div>
                            <h4>Seleziona il genere:</h4>
                            <input type="radio" name="gender" value="man"/><b> M</b>
                            <input type="radio" name="gender" value="woman"/><b> F</b>
                        </div>
                        <br>
                        <h3>Autentificazione:</h3>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"  name="password" placeholder="Password" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" style="width: 260px">Conferma</button>
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
