<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/administrador/css3clock/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/favicon.png" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menu.css" />


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <section id="container">
            <header class="header fixed-top clearfix">
                <div class="brand">
                    <a href="<?php echo $this->createUrl('/site/index'); ?>" class="logo">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banavih_ndice1.png" alt="" width="168px" height="48px">
                    </a>
                    <div class="sidebar-toggle-box">
                        <div class="fa fa-bars glyphicon glyphicon-list"></div>
                    </div>
                </div>

                <div class="nav notify-row" id="top_menu">
                    <!--  notification start -->
                    <!--                    <ul class="nav top-menu">
                                             settings start 
                                            <li class="dropdown">
                                                <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo $this->createUrl('site/index'); ?>">
                                                    <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                                                </a>
                                            </li>
                                             notification dropdown end 
                                        </ul>-->
                    <!--  notification end -->
                </div>
                <div class="top-nav clearfix">
                    <!--search & user info start-->
                    <ul class="nav pull-right top-menu">
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="glyphicon glyphicon-user"><?php echo Yii::app()->user->name; ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <li><a href="<?php echo $this->createUrl('/site/logout'); ?>"><i class="fa fa-key"></i>Salir</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!--search & user info end-->
                </div>
            </header>
            <aside>
                <div id="sidebar" class="nav-collapse">
                    <div class="leftside-navigation">
                        <ul class="sidebar-menu" id="nav-accordion">
                            <li>
                                <a href="<?php echo $this->createUrl('/site/index'); ?>">
                                    <i class="glyphicon glyphicon-home"></i>
                                    <span>Inicio</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $this->createUrl('/beneficiario/create'); ?>">
                                    <i class="glyphicon glyphicon-home"></i>
                                    <span>Beneficiario</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="glyphicon glyphicon-stats"></i>
                                    <span>Desarrollo Habitacional</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="sub-menu">
                                        <a href="javascript:;">
                                            <i class="glyphicon glyphicon-map-marker"></i>
                                            <span>Desarrollo</span>
                                        </a>
                                        <ul class="sub">
                                            <li><a href="<?php echo $this->createUrl('/desarrollo/create'); ?>">Cargar Nuevo</a></li>
                                            <li><a href="<?php echo $this->createUrl('#'); ?>">Programa</a></li>
                                            <li><a href="<?php echo $this->createUrl('#'); ?>">Ente Ejecutivo</a></li>
                                            <li><a href="<?php echo $this->createUrl('/fuenteFinanciamiento/create'); ?>">Funtes</a></li>  
                                            <li><a href="<?php echo $this->createUrl('#'); ?>">Listado Desarrollo</a></li>  
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="javascript:;">
                                            <i class="glyphicon glyphicon-map-marker"></i>
                                            <span>Unidad Habitacional</span>
                                        </a>
                                        <ul class="sub">
                                            <li><a href="<?php echo $this->createUrl('/unidadHabitacional/create'); ?>">Cargar Nuevo</a></li>
                                            <li><a href="<?php echo $this->createUrl('#'); ?>">Listado</a></li>  
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="javascript:;">
                                            <i class="glyphicon glyphicon-map-marker"></i>
                                            <span>Vivienda</span>
                                        </a>
                                        <ul class="sub">
                                            <li><a href="<?php echo $this->createUrl('/vivienda/create'); ?>">Cargar Nuevo</a></li>
                                            <li><a href="<?php echo $this->createUrl('#'); ?>">Listado</a></li>  
                                        </ul>
                                    </li>
                                </ul>
                            </li>                          

                        </ul>
                        <!-- sidebar menu end-->
                    </div>
                </div>
            </aside>
            <section id="main-content">
                <section class="wrapper">
                    <!--mini statistics start-->
                    <?php echo $content; ?>
                    <!--mini statistics end-->
                </section>
            </section>

            <div id="expirado"></div>

            <!--            <footer class='container col-md-12 col-xs-12 text-center'>
                            Copyright &copy; <?php // echo date('Y');                                                                     ?> by My Company.<br/>
                            All Rights Reserved.<br/>
            <?php // echo Yii::powered(); ?>
                        </footer>-->
            <!-- footer -->
        </section>
    </body>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/administrador/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/administrador/jquery.scrollTo.min.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/administrador/jquery.nicescroll.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/administrador/skycons/skycons.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.scrollTo/jquery.scrollTo.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/administrador/gauge/gauge.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/administrador/css3clock/js/css3clock.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/administrador/scripts.js"></script>
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
