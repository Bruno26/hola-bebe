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
                <div class="brand" style="height: 60%;">
                    <a href="<?php echo $this->createUrl('/site/indexAdmin'); ?>" class="logo">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banavih_ndice1.png" alt="" width="180px"  style="margin-top: -6%;margin-bottom: 4%;margin-left: -8%;">
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
                                <li><a class="glyphicon glyphicon-lock" href="<?php echo $this->createUrl('/cruge/ui/usermanagementupdate', array('id' => Yii::app()->user->id)); ?>"><i class="fa fa-key"></i>Cambiar Clave</a></li>
                                <li><a class="glyphicon glyphicon-off" href="<?php echo $this->createUrl('/site/logout'); ?>"><i class="fa fa-key"></i>Salir</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!--search & user info end-->
                </div>
            </header>
            <aside>
                <div id="sidebar" class="nav-collapse">
                    <div class="leftside-navigation" style ="margin-top: 19%;">
                        <ul class="sidebar-menu" id="nav-accordion">
                            <li>
                                <a href="<?php echo $this->createUrl('/site/indexAdmin'); ?>">
                                    <i class="glyphicon glyphicon-asterisk"></i>
                                    <span>Inicio</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $this->createUrl('/cruge/ui/usermanagementadmin'); ?>">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>Administrador</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="glyphicon glyphicon-stats"></i>
                                    <span>Parametros del Sistema</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="sub-menu">
                                        <a href="javascript:;">
                                            <i class="glyphicon glyphicon-book"></i>
                                            <span>Oficinas</span>
                                        </a>
                                        <ul class="sub">
                                            <li><a href="<?php echo $this->createUrl('/oficina/create'); ?>">Cargar Nueva Oficina</a></li>
                                            <li><a href="<?php echo $this->createUrl('/oficina/admin'); ?>">Gestión de Oficinas</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="javascript:;">
                                            <i class="glyphicon glyphicon-th-list"></i>
                                            <span>Agente de Documentación</span>
                                        </a>
                                        <ul class="sub">
                                            <li><a href="<?php echo $this->createUrl('/abogados/create'); ?>">Cargar Nuevo Agente de Documentación</a></li>
                                            <li><a href="<?php echo $this->createUrl('/abogados/admin'); ?>">Gestión de Agente de Documentación</a></li>
                                        </ul>
                                    </li>
                                    <!--                                    <li class="sub-menu">
                                                                            <a href="javascript:;">
                                                                                <i class="glyphicon glyphicon-briefcase"></i>
                                                                                <span>Registro Público</span>
                                                                            </a>
                                                                            <ul class="sub">
                                                                                <li><a href="<?php // echo $this->createUrl('/registroPublico/create');     ?>">Cargar Nuevo Registro Público</a></li>
                                                                            </ul>
                                                                        </li>-->
                                    <!--                                    <li class="sub-menu">
                                                                            <a href="javascript:;">
                                                                                <i class="glyphicon glyphicon-list-alt"></i>
                                                                                <span>Registro de Documentos</span>
                                                                            </a>
                                                                            <ul class="sub">
                                                                                <li><a href="<?php // echo $this->createUrl('/registroDocumento/create');     ?>">Cargar Nuevo Registro de Documento</a></li>
                                                                            </ul>
                                                                        </li>-->
                                    <li class="sub-menu">
                                        <a href="javascript:;">
                                            <i class="glyphicon glyphicon-briefcase"></i>
                                            <span>Asignación de Censo</span>
                                        </a>
                                        <ul class="sub">
                                            <li><a href="<?php echo $this->createUrl('/asignacionCenso/create'); ?>"><i class="glyphicon glyphicon-home"></i><span>Asignación de Censo</span></a></li>
                                            <li><a href="<?php echo $this->createUrl('/asignacionCenso/admin'); ?>"><i class="glyphicon glyphicon-home"></i><span>Gestión de Asignación</span></a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="glyphicon glyphicon-globe"></i>
                                    <span>Desarrollo Habitacional</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="sub-menu">
                                        <a href="javascript:;">
                                            <i class="glyphicon glyphicon-tree-deciduous"></i>
                                            <span>Desarrollos</span>
                                        </a>
                                        <ul class="sub">
                                            <li><a href="<?php echo $this->createUrl('/programa/create'); ?>">Cargar Nuevo Programa</a></li>
                                            <li><a href="<?php echo $this->createUrl('/enteEjecutor/create'); ?>">Cargar Ente Ejecutor</a></li>
                                            <li><a href="<?php echo $this->createUrl('/fuenteFinanciamiento/create'); ?>">Cargar Funtes de Financiamiento</a></li>
                                            <li><a href="<?php echo $this->createUrl('/desarrollo/create'); ?>">Cargar Nuevo Desarrollo</a></li>
                                            <li><a href="<?php echo $this->createUrl('/desarrollo/admin'); ?>">Gestión de Desarrollo Habitacional</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="javascript:;">
                                            <i class="glyphicon glyphicon-map-marker"></i>
                                            <span>Unidad Multifamiliar</span>
                                        </a>

                                        <ul class="sub">
                                            <li><a href="<?php echo $this->createUrl('/unidadHabitacional/create'); ?>">Cargar Nueva Unidad Multifamiliar</a></li>
                                            <li><a href="<?php echo $this->createUrl('/VswMultifamiliar/admin'); ?>">Gestión de Unidades Multifamiliares</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="javascript:;">
                                            <i class="glyphicon glyphicon-home"></i>
                                            <span>Unidad Unifamiliar</span>
                                        </a>
                                        <ul class="sub">
                                            <li><a href="<?php echo $this->createUrl('/vivienda/create'); ?>">Cargar Nueva Unidad Unifamiliar</a></li>
                                            <li><a href="<?php echo $this->createUrl('/vswUnifamiliar/admin'); ?>">Gestión de Unidad Unifamiliar</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="javascript:;">

                                            <i class="glyphicon glyphicon-home"></i>
                                            <span>Reasignación Vivienda</span>
                                        </a>

                                  
                                        <ul class="sub">
                                            <li><a href="<?php echo $this->createUrl('/reasignacionVivienda/create'); ?>">Reasignar Vivienda</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="<?php echo $this->createUrl('#'); ?>">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>Gestión de Adjudicados</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo $this->createUrl('/beneficiarioTemporal/create'); ?>"><i class="glyphicon glyphicon-user"></i><span>Cargar Nuevo Adjudicado</span></a></li>
                                    <li><a href="<?php echo $this->createUrl('/beneficiarioTemporal/admin'); ?>"><i class="glyphicon glyphicon-user"></i><span>Listado de Adjudicados</span></a></li>
                                    <!--<li><a href="<?php echo $this->createUrl('#'); ?>"><i class="glyphicon glyphicon-home"></i><span>Carga Masiva</span></a></li>-->
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="<?php echo $this->createUrl('#'); ?>">
                                    <i class="glyphicon glyphicon-tasks"></i>
                                    <span>Censo Socioeconómico</span>
                                </a>
                                <ul class="sub">

                                    <li><a href="<?php echo $this->createUrl('/beneficiario/create'); ?>"><i class="glyphicon glyphicon-home"></i><span>Censo</span></a></li>
                                    <li><a href="<?php echo $this->createUrl('/beneficiario/admin'); ?>"><i class="glyphicon glyphicon-home"></i><span>Gestión de Censo</span></a></li>
                                    <!--<li><a href="<?php echo $this->createUrl('#'); ?>"><i class="glyphicon glyphicon-home"></i><span>Gestión de Reasignación</span></a></li>-->
                                </ul>
                            </li>

                        </ul>
                        <!-- sidebar menu end-->
                    </div>
                </div>
            </aside>
            <section id="main-content">
                <section class="wrapper" style='margin-top: 8%;'>
                    <!--mini statistics start-->
                    <?php echo $content; ?>
                    <!--mini statistics end-->
                </section>
            </section>

            <div id="expirado"></div>

            <!--            <footer class='container col-md-12 col-xs-12 text-center'>
                            Copyright &copy; <?php // echo date('Y');                                                                                                ?> by My Company.<br/>
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
var comprobar = 900000;

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
