<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Aviato | E-commerce template</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body id="body" onload="setDate(document.searchForm) ; setListCompetitionName({$name})">

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
                    <h1 class="page-name">Nuova Competizione</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Nuova Competizione</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="products section" >
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget">
                    <form method="post" action="#" name="createForm">
                        </br>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" {if $competition!=""}value="{$competition->getName()}"{/if} name="name" class="form-control" placeholder="Nome competizione" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <br>
                        <h4>sport:</h4>
                        <select class="form-control" name="sport" id='sportList' onchange="setListCompetitionName('')">
                            <option>Qualsiasi Sport</option>
                            <option {if $competition->getSport()=='Atletica'}selected{/if}>Atletica</option>
                            <option {if $competition->getSport()=='Ciclismo'}selected{/if}>Ciclismo</option>
                            <option {if $competition->getSport()=='Nuoto'}selected{/if}>Nuoto</option>
                            <option {if $competition->getSport()=='Pattinaggio a rotelle'}selected{/if}>Pattinaggio a rotelle</option>
                            <option {if $competition->getSport()=='Pattinaggio sul ghiaccio'}selected{/if}>Pattinaggio sul ghiaccio</option>
                        </select>
                        <br>
                        <div class="it-datepicker-wrapper">
                            <table cellpadding="5">
                                <tbody>
                                <tr>
                                    <td><h4>Data di inizio: </h4></td>
                                    <td> <input type="datetime-local" {if $competition!=""}value="{$competition->getDateTime()->format("Y-m-d H:i:s")}"{/if} name="dateTime"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <select class="form-control">
                            <option>No Selected</option>
                            <option {if $competition->getGender()=='M'}selected{/if}>Uomo</option>
                            <option {if $competition->getGender()=='F'}selected{/if}>Donna</option>
                        </select>
                        <br>
                        <table>
                            <tbody>
                            <tr>
                                <td><h4>Unità di musura:</h4></td>
                                <td>
                                    <select class="form-control" name="unit">
                                        <option {if $competition!=""}selected{/if}>Km</option>
                                        <option>m</option>
                                        <option>mi</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="number" {if $competition!=""}value="{$competition->getDistance()}"{/if} name="dist"></td>
                            </tr>
                            </tbody>
                        </table>
                        <div>
                            <p>Descrizione:</p>
                            <textarea {if $competition!=""}value="{$competition->getDescription()}"{/if} name="description" cols="20" rows="4">Scrivi la descrizione...</textarea>
                        </div>
                        <br>
                        <label for="avatar">Scegli una foto per la competizione:</label>
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
