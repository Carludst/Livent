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

<body id="body">

<section class="signin-page account">
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
          <h2 class="text-center">Aggiorna il tuo Account</h2>
          <form method="post" class="text-left clearfix" action="/Livent/User/Signin/">
            <h4 class="widget-title">Autentificazione</h4>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control"  name="password" placeholder="Password">
            </div>
            <h4 class="widget-title">Nuovi Dati</h4>
            <div class="form-group">
              <input type="text" class="form-control" {if $user!=""}value="{$user->getUsername()}" {/if}name="username"  placeholder="Nuovo Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control"  name="newPassword" placeholder="Nuova password">
            </div>
            <div class="form-group">
              <input type="password" class="form-control"  name="confirmPassword" placeholder="Conferma password">
            </div>
            <input style="width: 100%" class="btn-solid-border "id='formfile' accept="image/png, image/jpeg" type="file">
            <br>
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center">Aggiorna</button>
            </div>
          </form>
          <br>
          <p><a style="opacity: 0.4" href="forget-password.html"> torna alla home</a></p>
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

    <!-- Main Js File -->
    <script src="{$dir}/js/script.js"></script>
    


  </body>
  </html>