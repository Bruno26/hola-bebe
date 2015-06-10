<?php
$this->breadcrumbs = array(
    'Desarrollos' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Desarrollo', 'url' => array('index')),
    array('label' => 'Create Desarrollo', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
    });
    $('.search-form form').submit(function(){
    $.fn.yiiGridView.update('desarrollo-grid', {
    data: $(this).serialize()
    });
    return false;
    });
");
?>


<?php //echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn btn-info')); ?>
<h1>Listado de Desarrollos</h1>

<?php // echo CHtml::link('Busqueda Avanzada', '#', array('class' => 'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
    <?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
    ?>
<!----></div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'desarrollo-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
//    'columns' => array(
//        'id_desarrollo',
//        'nombre',
//        'parroquia_id',
//        'descripcion',
//        'urban_barrio',
//        'av_call_esq_carr',
//        array(
//            'class' => 'booster.widgets.TbButtonColumn',
//        ),
//    ),
    'columns' => array(
        'id_desarrollo' => array(
            'name' => 'id_desarrollo',
            'value' => '$data->id_desarrollo',
        ),
        'nombre' => array(
            'header' => 'Descripción de Desarrollo',
            'name' => 'descripcion',
            'value' => '$data->descripcion',
//            'filter' => Maestro::FindMaestrosByPadreSelect(71),
        ),
        'ente_ejecutor_id' => array(
            'name' => 'ente_ejecutor_id',
            'value' => '$data->enteEjecutor->nombre_ente_ejecutor',
            'filter' => CHtml::listData(EnteEjecutor::model()->findall(), 'id_ente_ejecutor', 'nombre_ente_ejecutor'),
        ),
        'fuente_financiamiento_id' => array(
            'name' => 'fuente_financiamiento_id',
            'value' => '$data->fuenteFinanciamiento->nombre_fuente_financiamiento',
            'filter' => CHtml::listData(FuenteFinanciamiento::model()->findall(), 'id_fuente_financiamiento', 'nombre_fuente_financiamiento'),
        ),
        'Estado' => array(
            'header' => 'Estado',
            'name' => 'nombre',
            'value' => '$data->fkParroquia->clvmunicipio0->clvestado0->strdescripcion',
//            'filter' => Maestro::FindMaestrosByPadreSelect(71),
        ),
        array(
            'name' => 'fecha_creacion',
            'value' => 'Yii::app()->dateFormatter->format("d/M/y - hh:mm a", strtotime($data->fecha_creacion))',
        //'header' => 'Creación',
        ),
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'header' => 'Acciones',
            'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
            'template' => '{ver} {modificar}',
            'buttons' => array(
                'ver' => array(
                    'label' => 'Ver',
                    'icon' => 'eye-open',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("desarrollo/view/", array("id"=>$data->id_desarrollo))',
                ),
                'modificar' => array(
                    'label' => 'Modificar',
                    'icon' => 'glyphicon glyphicon-pencil',
                    'size' => 'medium',
//                    'url' => 'Yii::app()->createUrl("vswSolicitudRecibido/asignar/", array("id"=>$data->id_solicitud))',
//                    'visible' => 'Asignar($data->username);'
                ),

            ),
        ),
    ),
));
?>
