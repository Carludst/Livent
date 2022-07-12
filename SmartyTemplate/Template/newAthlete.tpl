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
                    <h2 class="text-center"><b>Crea il nuovo Atleta</b></h2>
                    <form method="post" class="text-left clearfix" name="createForm" {if $athlete!=""}action="/Livent/Athlete/Update/{$athlete->getId()}/"{else} action="/Livent/Athlete/Update/" {/if} >
                        <h3>Autentificazione:</h3>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"  name="password" placeholder="Password" required>
                        </div>
                        <br>
                        <h3>Inserimento dati :</h3>
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
                            <option {if $athlete!="" && $athlete->getSport()=='Atletica'}selected{/if} >Atletica</option>
                            <option {if $athlete!="" && $athlete->getSport()=='Ciclismo'}selected{/if} >Ciclismo</option>
                            <option {if $athlete!="" && $athlete->getSport()=='Nuoto'}selected{/if} >Nuoto</option>
                            <option {if $athlete!="" && $athlete->getSport()=='Pattinaggio a rotelle'}selected{/if} >Pattinaggio a rotelle</option>
                            <option {if $athlete!="" && $athlete->getSport()=='Pattinaggio sul ghiaccio'}selected{/if} >Pattinaggio sul ghiaccio</option>
                        </select>
                        <br>
                        <div class="form-group">
                            <input type="text" {if $athlete!=""}value="{$athlete->getTeam()}"{/if} name="team" placeholder="Team" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <table cellpadding="5">
                                <tbody>
                                <tr>
                                    <td class="my-td-title"><h4>Data di nascita : </h4></td>
                                    <td class="my-td"><input type="date" {if $athlete!=""}value="{$athlete->getBirthdate()->format("Y-m-d")}"{/if} name="date" class="form-control"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div>
                            <h4>Seleziona il genere:</h4>
                            <input type="radio" name="gender" {if $athlete!="" && !$athlete->getFamale()} checked="checked"{/if} value="man"/><b> M</b>
                            <input type="radio" name="gender" {if $athlete!="" && $athlete->getFamale()} checked="checked"{/if} value="woman"/><b> F</b>
                        </div>
                        <br>
                        <button type="submit"  class="btn btn-main text-center">Conferma</button>
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
