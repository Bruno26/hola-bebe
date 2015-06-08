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
                    <!-- sidebar menu start-->
                    <div class="leftside-navigation">
                        <ul class="sidebar-menu" id="nav-accordion">
                            <li>
                                <a href="<?php echo $this->createUrl('/site/index'); ?>">
                                    <i class="glyphicon glyphicon-home"></i>
                                    <span>Inicio</span>
                                </a>
                            </li>



                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                    <span>Desarrollo Habitacional</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?php echo $this->createUrl('/desarrollo/create'); ?>">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            <span>Desarrollo</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?php echo $this->createUrl('/unidadHabitacional/create'); ?>">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            <span>Unidad Habitacional</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?php echo $this->createUrl('/beneficiario/create'); ?>">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            <span>Beneficiario</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="sub-menu">

                                    <li>
                                        <a href="<?php echo $this->createUrl('/vivienda/create'); ?>">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            <span>Vivienda</span>
                                        </a>
                                    </li>                           

                                </ul>
                                <ul class="sub-menu">

                                    <li>
                                        <a href="<?php echo $this->createUrl('/oficina/create'); ?>">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            <span>Oficina</span>
                                        </a>
                                    </li>                           

                                </ul>
                                
                                <ul class="sub-menu">

                                    <li>
                                        <a href="<?php echo $this->createUrl('/abogados/create'); ?>">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            <span>Abogados</span>
                                        </a>
                                    </li>                           

                                </ul>
                            </li>                          
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="glyphicon glyphicon-stats"></i>
                                    <span>Gráficas</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?php echo $this->createUrl('/graficas/graficanivelusuario'); ?>">
                                            <i class="glyphicon glyphicon-lock"></i>
                                            <span>Usuarios</span>
                                        </a>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="javascript:;">
                                            <i class="glyphicon glyphicon-map-marker"></i>
                                            <span>Ubicación</span>
                                        </a>
                                        <ul class="sub">
                                            <li><a href="<?php echo $this->createUrl('/graficas/graficasdireccionvivienda'); ?>">Dirección Vivienda 1 </a></li>



                                        </ul>

                                    </li>

                            </li>                          
                        </ul>

                        <li class="leftside-navigation" id="nav-accordion">
                            <a href="javascript:;">
                                <i class="glyphicon glyphicon-briefcase"></i>
                                <span>Administrador</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo $this->createUrl('/cruge/ui/usermanagementadmin'); ?>"><i class="glyphicon glyphicon-th-list"></i>Listar</a></li>
                                <li><a href="<?php echo $this->createUrl('/cruge/ui/usermanagementcreate'); ?>"><i class="glyphicon glyphicon-user"></i>Crear Usuarios</a></li>
                                <li><a href="<?php echo $this->createUrl('/cruge/ui/rbacusersassignments'); ?>"><i class="glyphicon glyphicon-check"></i>Asignar Rol</a></li>
                                <li><a href="<?php echo $this->createUrl('/cruge/ui/sessionadmin'); ?>"><i class="glyphicon glyphicon-tasks"></i>Sessiones</a></li>
                            </ul>
                        </li> 
                        <!--                        <li>
                                                    <a href="javascript:;">
                                                        <i class="glyphicon glyphicon-upload"></i>
                                                        <span>Descargas</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li><a href="<?php // echo Yii::app()->request->hostInfo . '/' . Yii::app()->baseUrl . '/archivo/formulario_unamujer.pdf';                                ?>" target="_blank"><i class="glyphicon glyphicon-download"></i>Planilla de Registro</a></li>
                                                    </ul>
                                                </li>                           -->


                    </div></div></div>
                <!-- sidebar menu end-->
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
                            Copyright &copy; <?php // echo date('Y');                                                   ?> by My Company.<br/>
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
