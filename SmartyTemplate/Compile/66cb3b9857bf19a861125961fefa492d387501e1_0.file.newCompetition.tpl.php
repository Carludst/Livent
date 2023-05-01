<?php
/* Smarty version 4.1.1, created on 2022-07-16 05:43:05
  from 'C:\xampp\htdocs\Livent\SmartyTemplate\Template\newCompetition.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62d233c9733825_70054997',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66cb3b9857bf19a861125961fefa492d387501e1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Livent\\SmartyTemplate\\Template\\newCompetition.tpl',
      1 => 1657941133,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d233c9733825_70054997 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/slick/slick.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/css/style.css">


</head>

<body <?php if ($_smarty_tpl->tpl_vars['competition']->value != '') {?>onload=" setListCompetitionName('<?php echo $_smarty_tpl->tpl_vars['competition']->value->getName();?>
')" <?php } else { ?>onload="setListCompetitionName()"<?php }?>>


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
                    <form method="post" class="text-left clearfix" <?php if ($_smarty_tpl->tpl_vars['competition']->value != '') {?>action="/Livent/Competition/Update/<?php echo $_smarty_tpl->tpl_vars['competition']->value->getId();?>
/"<?php } else { ?>action="/Livent/Competition/Create/<?php echo $_smarty_tpl->tpl_vars['idevent']->value;?>
/"<?php }?> name="createForm">
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
                        <select class="form-control" name="sport" id="sportList" <?php if ($_smarty_tpl->tpl_vars['competition']->value != '') {?>onchange="setListCompetitionName('')"<?php } else { ?>onchange="setListCompetitionName('')"<?php }?>>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getSport() == 'Atletica') {?>selected<?php }?>>Atletica</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getSport() == 'Ciclismo') {?>selected<?php }?>>Ciclismo</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getSport() == 'Nuoto') {?>selected<?php }?>>Nuoto</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getSport() == 'Pattinaggio a rotelle') {?>selected<?php }?>>Pattinaggio a rotelle</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getSport() == 'Pattinaggio sul ghiaccio') {?>selected<?php }?>>Pattinaggio sul ghiaccio</option>
                        </select>
                        <br>
                        <h4>Nome:</h4>
                        <select class="form-control" id="nameCompetitionList" name="name" <?php if ($_smarty_tpl->tpl_vars['competition']->value != '') {?>onload="setListCompetitionName('<?php echo $_smarty_tpl->tpl_vars['competition']->value->getName();?>
')"<?php } else { ?>onload="setListCompetitionName()"<?php }?>></select>
                        <br>
                        <div class="form-group">
                            <h4>Data e Ora di inizio: </h4>
                            <input type="datetime-local" min="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['competition']->value != '') {?>value="<?php echo $_smarty_tpl->tpl_vars['competition']->value->getDateTime()->format("Y-m-d H:i:s");?>
"<?php }?>  class="form-control" name="dateTime">
                        </div>
                        <br>
                        <table>
                            <tbody>
                            <tr>
                                <td class="my-td-title"><h4>Distanza:</h4></td>
                                <td class="my-td">
                                    <input type="number" min='0' step="0.1" <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getDistance()->getValue() > 1) {?>value="<?php echo $_smarty_tpl->tpl_vars['competition']->value->getDistance()->getValue();?>
" <?php } elseif ($_smarty_tpl->tpl_vars['competition']->value != '') {?> value="<?php echo $_smarty_tpl->tpl_vars['competition']->value->getDistance()->getValue('m');?>
" <?php }?> name="dist"></td>
                                <td  class="my-td">
                                    <select class="form-control" name="unit">
                                        <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getDistance()->getValue() <= 1) {?>selected<?php }?>>m</option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getDistance()->getValue() > 1) {?>selected<?php }?>>Km</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <h4>Genere:</h4>
                        <select class="form-control" name="gender" >
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getGender() == 'M/F') {?>selected<?php }?>>Uomo e Donna</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getGender() == 'M') {?>selected<?php }?>>Uomo</option>
                            <option <?php if ($_smarty_tpl->tpl_vars['competition']->value != '' && $_smarty_tpl->tpl_vars['competition']->value->getGender() == 'F') {?>selected<?php }?>>Donna</option>
                        </select>
                        <br>
                        <div class="form-group">
                            <h4>Descrizione:</h4>
                            <textarea placeholder="Scrivi la descrizione..."  name="description" class="form-control" cols="20" rows="4"><?php if ($_smarty_tpl->tpl_vars['competition']->value != '') {
echo $_smarty_tpl->tpl_vars['competition']->value->getDescription();
}?></textarea>
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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
<!-- Bootstrap 3.1 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<!-- Bootstrap Touchpin -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"><?php echo '</script'; ?>
>
<!-- Instagram Feed Js -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/instafeed/instafeed.min.js"><?php echo '</script'; ?>
>
<!-- Video Lightbox Plugin -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/ekko-lightbox/dist/ekko-lightbox.min.js"><?php echo '</script'; ?>
>
<!-- Count Down Js -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/syo-timer/build/jquery.syotimer.min.js"><?php echo '</script'; ?>
>

<!-- slick Carousel -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/slick/slick.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/slick/slick-animation.min.js"><?php echo '</script'; ?>
>

<!-- Google Mapl -->
<?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/plugins/google-map/gmap.js"><?php echo '</script'; ?>
>

<!-- Main Js File -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/js/script.js"><?php echo '</script'; ?>
>
<!--MyJavaScript -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
/js/myScript.js"><?php echo '</script'; ?>
>



</body>
</html>
<?php }
}
