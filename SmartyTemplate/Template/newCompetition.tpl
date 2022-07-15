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

<body {if $competition!=""}onload=" setListCompetitionName('{$competition->getName()}')" {else}onload="setListCompetitionName()"{/if}>


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
                    <h2 class="text-center"><b>Crea la nuova competizione</b></h2>
                    <form method="post" class="text-left clearfix" {if $competition!=''}action="/Livent/Competition/Update/{$competition->getId()}/"{else}action="/Livent/Competition/Create/{$idevent}/"{/if} name="createForm">
                        <h3><b>Autenticazione:</b></h3>
                        <div class="form-group">
                            <input type="email" name='email' class="form-control"  placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name='password' class="form-control" placeholder="Password" required>
                        </div>
                        <br>
                        <h3><b>Inserimento dati :</b></h3>
                        <h4>Sport:</h4>
                        <select class="form-control" name="sport" id="sportList" {if $competition!=""}onchange="setListCompetitionName('')"{else}onchange="setListCompetitionName('')"{/if}>
                            <option {if $competition!="" && $competition->getSport()=='Atletica'}selected{/if}>Atletica</option>
                            <option {if $competition!="" && $competition->getSport()=='Ciclismo'}selected{/if}>Ciclismo</option>
                            <option {if $competition!="" && $competition->getSport()=='Nuoto'}selected{/if}>Nuoto</option>
                            <option {if $competition!="" && $competition->getSport()=='Pattinaggio a rotelle'}selected{/if}>Pattinaggio a rotelle</option>
                            <option {if $competition!="" && $competition->getSport()=='Pattinaggio sul ghiaccio'}selected{/if}>Pattinaggio sul ghiaccio</option>
                        </select>
                        <br>
                        <h4>Nome:</h4>
                        <select class="form-control" id="nameCompetitionList" name="name" {if $competition!=""}onload="setListCompetitionName('{$competition->getName()}')"{else}onload="setListCompetitionName()"{/if}></select>
                        <br>
                        <div class="form-group">
                            <h4>Data e Ora di inizio: </h4>
                            <input type="datetime-local" min="{$today}" {if $competition!=""}value="{$competition->getDateTime()->format("Y-m-d H:i:s")}"{/if}  class="form-control" name="dateTime">
                        </div>
                        <br>
                        <table>
                            <tbody>
                            <tr>
                                <td class="my-td-title"><h4>Distanza:</h4></td>
                                <td class="my-td">
                                    <input type="number" min='0' step="0.1" {if $competition!="" && $competition->getDistance()->getValue()>1}value="{$competition->getDistance()->getValue()}" {elseif $competition!=""} value="{$competition->getDistance()->getValue('m')}" {/if} name="dist"></td>
                                <td  class="my-td">
                                    <select class="form-control" name="unit">
                                        <option {if $competition!="" && $competition->getDistance()->getValue()<=1}selected{/if}>m</option>
                                        <option {if $competition!="" && $competition->getDistance()->getValue()>1}selected{/if}>Km</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <h4>Genere:</h4>
                        <select class="form-control" name="gender">
                            <option {if $competition!="" && $competition->getGender()=='M/F'}selected{/if}>Uomo e Donna</option>
                            <option {if $competition!="" && $competition->getGender()=='M'}selected{/if}>Uomo</option>
                            <option {if $competition!="" && $competition->getGender()=='F'}selected{/if}>Donna</option>
                        </select>
                        <br>
                        <div class="form-group">
                            <h4>Descrizione:</h4>
                            <textarea placeholder="Scrivi la descrizione..."  name="description" class="form-control" cols="20" rows="4">{if $competition!=""}{$competition->getDescription()}{/if}</textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-main text-center" >Conferma</button>
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
