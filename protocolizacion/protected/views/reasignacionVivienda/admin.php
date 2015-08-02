<?php
$this->breadcrumbs = array(
    'Reasignacion Viviendas' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List ReasignacionVivienda', 'url' => array('index')),
    array('label' => 'Create ReasignacionVivienda', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('reasignacion-vivienda-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Gestión de Reasignación de Viviendas</h1>


<?php
$this->widget(
        'booster.widgets.TbExtendedGridView', array(
    'type' => 'striped bordered',
    'responsiveTable' => true,
    'id' => 'reasignacion-vivienda-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id_reasignacion_vivienda',
            'header' => 'id_reasignacion',
            'value' => '$data->id_reasignacion_vivienda',
        ),
        array(
            'name' => 'beneficiario_id_anterior',
            'header' => 'Beneficiario Anterior',
            'value' => '$data->beneficiarioIdAnterior->nombre_completo',
        ),
        array(
            'name' => 'beneficiario_id_actual',
            'header' => 'Beneficiario Actual',
            'value' => '$data->beneficiarioIdActual->nombre_completo',
        ),
        array(
            'name' => 'tipo_reasignacion_id',
            'header' => 'Tipo de Reasignación',
            'value' => '$data->tipoReasignacion->descripcion',
        ),
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'header' => 'Acciones',
            'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
            'template' => '{ver}',
            'buttons' => array(
                'ver' => array(
                    'label' => 'Ver',
                    'icon' => 'eye-open',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("reasignacionVivienda/view", array("id"=>$data->id_reasignacion_vivienda))',
                ),
                
            ),
        ),
    ),
));
?>




<?php
//$this->widget('booster.widgets.TbGridView',array(
//'dataProvider'=>$model->search(),
//'filter'=>$model,
//'columns'=>array(
//'id_reasignacion_vivienda',
//'beneficiario_id_anterior',
//'beneficiario_id_actual',
//'vivienda_id',
//'tipo_reasignacion_id',
//'persona_id_autoriza',
///*
//'observaciones',
//'fecha_reasignacion',
//'fecha_creacion',
//'fecha_actualizacion',
//'usuario_id_creacion',
//'usuario_id_actualizacion',
//'estatus',
//*/
//array(
//'class'=>'booster.widgets.TbButtonColumn',
//),
//),
//)); 
?>
