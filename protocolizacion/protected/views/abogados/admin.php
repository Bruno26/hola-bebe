<?php
//$this->breadcrumbs=array(
//	'Abogadoses'=>array('index'),
//	'Manage',
//);
//$this->menu=array(
//array('label'=>'List Abogados','url'=>array('index')),
//array('label'=>'Create Abogados','url'=>array('create')),
//);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//$('.search-form').toggle();
//return false;
//});
//$('.search-form form').submit(function(){
//$.fn.yiiGridView.update('abogados-grid', {
//data: $(this).serialize()
//});
//return false;
//});
//");
?>

<h1>Listado de Abogados</h1>



<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
	<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
<!--</div> search-form -->

<?php // $this->widget('booster.widgets.TbGridView',array(
//'id'=>'abogados-grid',
//'dataProvider'=>$model->search(),
//'filter'=>$model,
//'columns'=>array(
//		'id',
//		'persona_id',
//		'inpreabogado',
//		'tipo_abogado_id',
//		'oficina_id',
//		'observaciones',
//		/*
//		'estatus',
//		'fecha_creacion',
//		'fecha_actualizacion',
//		'usuario_id_creacion',
//		'usuario_id_actualizacion',
//		*/
//array(
//'class'=>'booster.widgets.TbButtonColumn',
//),
//),
//)); ?>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'abogados-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id' => array(
            'header' => 'id_Abogado',
            'name' => 'id',
            'value' => '$data->id',
        ),
        'persona_id' => array(
            'name' => 'persona_id',
            'value' => '$data->persona_id',

        ),
        'tipo_abogado_id' => array(
            'header' => 'Tipo de Abogado',
            'name' => 'tipo_abogado_id',
            'value' => '$data->tipoAbogado->descripcion',
        ),
     
        'oficina_id' => array(
            'header' => 'Oficina',
            'name' => 'oficina_id',
            'value' => '$data->oficinaId->nombre',
        ),
        'observaciones' => array(
            'header' => 'Observaciones',
            'name' => 'observaciones',
            'value' => '$data->observaciones',
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
                    'url' => 'Yii::app()->createUrl("abogado/view/", array("id"=>$data->id))',
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