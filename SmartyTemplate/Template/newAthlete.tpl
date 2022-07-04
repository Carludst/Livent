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

<body id="body" onload="setDate(document.searchForm)">

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


<section class="products section" >
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget">
                    <form method="post" action="#" name="createForm">
                        </br>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nome" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <br>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="surname" placeholder="Cognome" class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <br>
                        <h4>sport praticato:</h4>
                        <select class="form-control" name="sport">
                            <option {if $sport=='Atletica'}selected{/if}>Atletica</option>
                            <option {if $sport=='Ciclismo'}selected{/if}>Ciclismo</option>
                            <option {if $sport=='Nuoto'}selected{/if}>Nuoto</option>
                            <option {if $sport=='Pattinaggio a rotelle'}selected{/if}>Pattinaggio a rotelle</option>
                            <option {if $sport=='Pattinaggio sul ghiaccio'}selected{/if}>Pattinaggio sul ghiaccio</option>
                        </select>
                        <br>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="team" placeholder="Team" class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <br>
                        <div class="it-datepicker-wrapper">
                            <table cellpadding="5">
                                <h4>Data di nascita : </h4>
                                <input type="date" name="dateMin"   style="width: 225px" onchange="setDate(form)">
                            </table>
                        </div>
                        <br>
                        <select class="form-control">
                            <option {if $sport=='M'}selected{/if}>Uomo</option>
                            <option {if $sport=='F'}selected{/if}>Donna</option>
                        </select>
                        <br>
                        <label for="avatar">Scegli una foto profilo:</label>
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
<script src="plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.1 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Bootstrap Touchpin -->
<script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<!-- Instagram Feed Js -->
<script src="plugins/instafeed/instafeed.min.js"></script>
<!-- Video Lightbox Plugin -->
<script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
<!-- Count Down Js -->
<script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

<!-- slick Carousel -->
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/slick/slick-animation.min.js"></script>

<!-- Google Mapl -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script type="text/javascript" src="plugins/google-map/gmap.js"></script>

<!-- Main Js File -->
<script src="js/script.js"></script>
<!--MyJavaScript -->
<script src="../SmartyTemplate/js/myScript.js"></script>




</body>
</html>
