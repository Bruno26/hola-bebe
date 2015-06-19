<?php
$this->breadcrumbs = array(
    'Oficinas' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Oficina', 'url' => array('index')),
    array('label' => 'Create Oficina', 'url' => array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('oficina-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Gestión de Oficinas</h1>


<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
<?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
?>
<!--</div> search-form -->

<?php
function nombre($selec,$iD){
    $saime = ConsultaOracle::getPersonaByPk($selec,(int)$iD);
    return $saime['PRIMER_NOMBRE'];
}
function apellido($selec,$iD){
    $saime = ConsultaOracle::getPersonaByPk($selec,(int)$iD);
    return $saime['PRIMER_APELLIDO'];
}

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'oficina-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
//    'columns' => array(
//        'id_oficina',
//        'nombre',
//        'parroquia_id',
//        'persona_id_jefe',
//        'estatus',
//        'observaciones',
//        /*
//          'fecha_creacion',
//          'fecha_actualizacion',
//          'usuario_id_creacion',
//          'usuario_id_actualizacion',
//         */
//        array(
//            'class' => 'booster.widgets.TbButtonColumn',
//        ),
//    ),
    
'columns' => array(
    'id_oficina' => array(
    'header' => 'N°',
    'name' => 'id_oficina',
    'value' => '$data->id_oficina',
    //'htmlOptions' => array('width' => '80', 'style' => 'text-align: center;'),

    ),
    'nombre' => array(
    'header' => 'Nombre de Oficina',
    'name' => 'nombre',
    'value' => '$data->nombre',
    //'htmlOptions' => array('width' => '80', 'style' => 'text-align: center;'),

    ),
    'primer_nombre' => array(
    'header' => 'Nombre',
    'name' => 'primer_nombre',
    'value' => 'nombre("PRIMER_NOMBRE",$data->persona_id_jefe)',
    
    //'htmlOptions' => array('width' => '80', 'style' => 'text-align: center;'),

    ),
    
    'primer_apellido' => array(
    'header' => 'Apellido',
    'name' => 'primer_apellido',
    'value' => 'apellido("PRIMER_APELLIDO",$data->persona_id_jefe)',
    // 'value' => '$data->persona_id_jefe',
      ),
    array(
            'class' => 'booster.widgets.TbButtonColumn',
            'header' => 'Acciones',
            'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
            'template' => '{ver} {modificar} {pdf}',
            'buttons' => array(
                'ver' => array(
                    'label' => 'Ver',
                    'icon' => 'eye-open',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("oficina/view/", array("id"=>$data->id_oficina))',
                ),
                'modificar' => array(
                    'label' => 'Modificar',
                    'icon' => 'glyphicon glyphicon-pencil',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("oficina/update/", array("id"=>$data->id_oficina))',
//                    'visible' => 'Asignar($data->username);'
                ),
                'pdf' => array(
                    'label' => 'Generar PDF',
                    'icon'  => 'glyphicon glyphicon-file',
                    'size'  => 'medium',
                    'url'   => 'Yii::app()->createUrl("oficina/pdf/", array("id"=>$data->id_oficina))',
//                    'visible' => 'Asignar($data->username);'
                ),
                
            ),
        ),
    
)));
?> 


<?php /*
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'oficina-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped bordered condensed',
    //'filter' => $model,
    'columns' => array(
        'id_oficina' => array(
            'name' => 'id_oficina',
            'value' => '$data->id_oficina',
        ),
        'nombre' => array(
            'header' => 'Nombre  de oficina',
            'name' => 'nombre',
            'value' => '$data->nombre',
        ),
        'primer_nombre' => array(
            'header' => 'Nombre',
            'name' => 'primer_nombre',
	    'value' => 'nombre("PRIMER_NOMBRE",$data->persona_id_jefe)',
            // 'value' => '$data->persona_id_jefe',
        ),
             'primer_apellido' => array(
            'header' => 'Apellido',
            'name' => 'primer_nombre',
	    'value' => 'apellido("PRIMER_APELLIDO",$data->persona_id_jefe)',
            // 'value' => '$data->persona_id_jefe',
        ),

        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'header' => 'Acciones',
            'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
            'template' => '{ver} {pdf}',
            'buttons' => array(
                'ver' => array(
                    'label' => 'Ver',
                    'icon' => 'eye-open',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("oficina/view/", array("id"=>$data->id_oficina))',
                ),
                'pdf' => array(
                    'label' => 'Generar PDF',
                    'icon'  => 'glyphicon glyphicon-file',
                    'size'  => 'medium',
                    'url'   => 'Yii::app()->createUrl("oficina/pdf/", array("id"=>$data->id_oficina))',
//                    'visible' => 'Asignar($data->username);'
                ),
//                'modificar' => array(
//                    'label' => 'Modificar',
//                    'icon' => 'glyphicon glyphicon-pencil',
//                    'size' => 'medium',
////                    'url' => 'Yii::app()->createUrl("vswSolicitudRecibido/asignar/", array("id"=>$data->id_solicitud))',
////                    'visible' => 'Asignar($data->username);'
//                ),
            ),
        ),
    ),
));
*/?>
