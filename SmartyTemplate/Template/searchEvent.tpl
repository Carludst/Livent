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
                    <h1 class="page-name">Cerca Evento</h1>
                    <ol class="breadcrumb">
                        <li><a href="/Livent/">Home</a></li>
                        <li class="active">Cerca Evento</li>
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
                    <h4 class="widget-title">Ricerca</h4>
                    <form method="get" action="/Livent/Event/Search/" name="searchForm">
                        <select class="form-control" name="sport">
                            <option>Qualsiasi Sport</option>
                            <option {if $sport=='Atletica'}selected{/if}>Atletica</option>
                            <option {if $sport=='Ciclismo'}selected{/if}>Ciclismo</option>
                            <option {if $sport=='Nuoto'}selected{/if}>Nuoto</option>
                            <option {if $sport=='Pattinaggio a rotelle'}selected{/if}>Pattinaggio a rotelle</option>
                            <option {if $sport=='Pattinaggio sul ghiaccio'}selected{/if}>Pattinaggio sul ghiaccio</option>
                        </select>
                        </br>
                        <div class="form-group-sm mb-3">
                            <input type="text" class="form-control" {if $name!=""}value="{$name}"{/if} name="name" placeholder="Nome" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <br>
                        <div class="input-group-sm mb-3">
                            <input type="text" {if $place!=""}value="{$place}"{/if} placeholder="Luogo"  name="place" class="form-control" aria-label="Default" style="width: 260px" aria-describedby="inputGroup-sizing-sm" >
                        </div>
                        <br>
                        <div class="it-datepicker-wrapper">
                            <div class="input-group input-group-sm mb-3">
                                <table cellpadding="5">
                                    <tbody>
                                    <tr>
                                        <td class="my-td-title"><h4>Da : </h4></td>
                                        <td class="my-td"> <input type="date" name="dateMin" {if $dateMin!=""}value="{$dateMin->format("Y-m-d")}" onload="setDate(form)"{/if}  style="width: 220px" onchange="setDate(form)"></td>
                                    </tr>
                                    <tr>
                                        <td class="my-td-title"><h4>A : </h4></td>
                                        <td class="my-td"> <input type="date" name="dateMax"  {if $dateMax!=""}value="{$dateMax->format("Y-m-d")}" onload="setDate(form)"{/if}  onchange="setDate(form)" style="width: 220px"> </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <button type="submit"  class="btn btn-main btn-small btn-round" style="width: 260px">Cerca</button>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="list-group">
                        {if empty($events) && $mood=='cronology'}
                            <h1 class="my-allert-page" > Non hai eventi in cronologia </h1>
                        {elseif empty($events) && $mood=='search'}
                            <h1 class="my-allert-page" > La ricerca non ha dato risultati </h1>
                        {elseif empty($events)}
                            <h1 class="my-allert-page" > Non ci sono eventi salvati </h1>
                        {else}
                            {if $mood=='cronology'}
                                <div class="row">
                                    {section name=index loop=$events}
                                        <div class="col-md-9">
                                            <a href="/Livent/Event/MainPage/{$events[index]->getId()}/" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img class="img-responsive" src="{$eventsImg[index]}" alt="product-img" width="100" height="150" />
                                                        </div>
                                                        <div class="col-md-10">
                                                            <h3 class="mb-1"><b>{$events[index]->getName()}</b></h3>
                                                            {if !empty($events[index]->getCompetitions())}<time>{$events[index]->getDateStart()->format("d/m/y")} - {$events[index]->getDateFinish()->format("d/m/y")}</time>
                                                            {else}<time>data da stabile</time>{/if}
                                                            </br>
                                                            <h7 class="mb-1">{$events[index]->getDescription()}</h7>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            </br>
                                        </div>
                                        <div class="col-md-1">
                                            </br></br>
                                            <a href="/Livent/Event/Chronology/Delete/{$smarty.section.index.index}/" class="remove"><i class="tf-ion-close"></i></a>
                                        </div>
                                    {/section}
                                </div>
                            {else}
                                <div class="row">
                                    {section name=index loop=$events}
                                        <div class="col-md-12">
                                            <a href="/Livent/Event/MainPage/{$events[index]->getId()}/" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img class="img-responsive" src="{$eventsImg[index]}" alt="product-img" width="100" height="150" />
                                                        </div>
                                                        <div class="col-md-7">
                                                            <h3 class="mb-1"><b>{$events[index]->getName()}</b></h3>
                                                            {if !empty($events[index]->getCompetitions())}<time>{$events[index]->getDateStart()->format("d/m/y")} - {$events[index]->getDateFinish()->format("d/m/y")}</time>
                                                            {else}<time>data da stabile</time>{/if}
                                                            </br>
                                                            <h7 class="mb-1">{$events[index]->getDescription()}</h7>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            </br>
                                        </div>
                                    {/section}
                                </div>
                            {/if}
                        {/if}
                    </div><!-- /.modal -->
                </div>
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
