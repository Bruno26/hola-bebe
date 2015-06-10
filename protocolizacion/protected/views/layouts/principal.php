<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
    <style type="text/css">
        body {
            /*background-image: url("<?php //echo Yii::app()->baseUrl; ?>/img/cintillo.jpg") !important;*/
            background-color: #C4E17F !important;
            height: 100% !important;
            width: 100% !important;
            background-size: cover !important;
            /*background-position: right bottom  !important;*/
            background-attachment:fixed !important;
        }
        .navbar-default .nav > li>a, .navbar-default .nav>li>a:focus {
            color: rgba(255,255,255,.7) !important;
        }
        .navbar-default .navbar-nav>li>a {
            color: #FFF !important;
        }
        .navbar-default.affix .nav > li>a, .navbar-default.affix .nav>li>a:focus {
            color: #222 !important;
        }
        .navbar-default {
            background-color: rgba(255,255,255,.3) !important; 
            border-color: transparent !important;
        }
        .navbar-default.affix {
            border-color: rgba(34,34,34,.05) !important;
            background-color: #fff !important;
        }
        
    </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/img/unamujer_-_favicon.png" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fakeLoader.css " />

        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.min.css" type="text/css"></link>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/creative.css" type="text/css"></link>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="fakeloader"></div>
        <header class="header fixed-top clearfix">
            <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand page-scroll" style="height: auto;color: transparent;">dfg
                            <a href="<?php echo $this->createUrl('/site/index'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/img/logo1.png" style="width: 65%;margin-left: -3em;"/></a>
                        </div>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php if (Yii::app()->user->isGuest) {
                        ?>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a class="page-scroll glyphicon glyphicon-off" href="<?php echo Yii::app()->baseUrl; ?>/cruge/ui/login"></a>
                                </li>
                            </ul>
                        </div>
                    <?php } else if (!Yii::app()->user->isGuest) { ?>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a class="page-scroll glyphicon glyphicon-user" href="<?php echo Yii::app()->baseUrl; ?>/site/logout">SALIR(<?php echo Yii::app()->user->name; ?>)</a>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <div id="content">
            <section class="wrapper">
                <article class='col-md-1'></article>
                <article class='col-md-10'>
                    <!--mini statistics start-->
                    <?php echo $content; ?>
                    <!--mini statistics end-->
                </article>
                <article class='col-md-1'></article>
            </section>
        </div>
        <div id="expirado"></div>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/layoutPrincipal/jquery.fittext.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/layoutPrincipal/wow.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/layoutPrincipal/creative.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/fakeLoader.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".fakeloader").fakeLoader({
                    timeToHide: 1200,
                    bgColor: "#62C2E4",
                    spinner: "spinner6"
                });
            });
        </script>
    </body>
</html>

<?php
$url_redirect = CHtml::normalizeUrl(array('/site/index'));
$url_valida_sesion = CHtml::normalizeUrl(array('/cruge/ui/login'));
$url_destroy_session = CHtml::normalizeUrl(array('/site/logout'));
Yii::app()->getClientScript()->registerScript("core_cruge", "
var tstampActual = 0;
var comprobar = 1200000;
        
    function kill_session() {
        if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }else{// code for IE6, IE5
            xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.open('GET','$url_destroy_session',false);
        xmlhttp.send();

        document.getElementById('expirado').innerHTML=xmlhttp.responseText;
        document.location.href = '$url_redirect';
   
    }      

function actividad() {

    var tstamp = new Date().getTime();
    
    if (Math.abs(tstampActual - tstamp) > comprobar) {
        kill_session();  
    }
}

$( document ).ready(function() {
    // Handler for .ready() called.
    document.body.addEventListener('mousemove', function() {
    tstampActual = new Date().getTime(); 
    }, false);
    setInterval(function() {actividad()}, comprobar);
});

        ", CClientScript::POS_LOAD);
?>