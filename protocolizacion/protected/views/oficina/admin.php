<?php
//$this->breadcrumbs = array(
//    'Oficinas' => array('index'),
//    'Manage',
//);
//
//$this->menu = array(
//    array('label' => 'List Oficina', 'url' => array('index')),
//    array('label' => 'Create Oficina', 'url' => array('create')),
//);
//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//$('.search-form').toggle();
//return false;
//});
//$('.search-form form').submit(function(){
//$.fn.yiiGridView.update('oficina-grid', {
//data: $(this).serialize()
//});
//return false;
//});
//");
?>

<h1>Listado Oficina</h1>


<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
<?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
?>
<!--</div> search-form -->

<?php
//$this->widget('booster.widgets.TbGridView', array(
//    'id' => 'oficina-grid',
//    'dataProvider' => $model->search(),
//    'filter' => $model,
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
//));
?>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'oficina-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_oficina' => array(
            'name' => 'id_oficina',
            'value' => '$data->id_oficina',
        ),
        'nombre' => array(
            'header' => 'Nombre oficina',
            'name' => 'nombre',
            'value' => '$data->nombre',
//            'filter' => Maestro::FindMaestrosByPadreSelect(71),
        ),
        'persona_id_jefe' => array(
            'header' => 'id_Persona',
            'name' => 'persona_id_jefe',
            'value' => '$data->persona_id_jefe',
//            'filter' => Maestro::FindMaestrosByPadreSelect(71),
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
                    'url' => 'Yii::app()->createUrl("oficina/view/", array("id"=>$data->id_oficina))',
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
?>