<?php
$this->breadcrumbs=array(
	'Beneficiario Temporals'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List BeneficiarioTemporal','url'=>array('index')),
array('label'=>'Create BeneficiarioTemporal','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('beneficiario-temporal-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Gestión de Beneficiarios Temporales</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'beneficiario-temporal-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_beneficiario_temporal' => array(
				'header' => 'N°',
				'name' => 'id_beneficiario_temporal',
				'value' => '$data->id_beneficiario_temporal',
				'htmlOptions' => array('width' => '50', 'style' => 'text-align: center;'),

		),
		'cedula',
		'nombre_completo' => array(
				'header' => 'Nombre',
				'name' => 'nombre_completo',
				'value' => '$data->nombre_completo',
				'htmlOptions' => array('width' => '80', 'style' => 'text-align: center;'),

		),

		'desarrollo_id' => array(
				'header' => 'Desarrollo',
				'name' => 'desarrollo_id',
				'value' => '$data->desarrollo->nombre',
				'filter' => CHtml::listData(Desarrollo::model()->findall(), 'id_desarrollo', 'nombre'),


		),
		'unidad_habitacional_id' => array(
				'name' => 'unidad_habitacional_id',
				'header' => 'Unidad Habitacional',
				'value' => '$data->unidadHabitacional->nombre',
				'filter' => CHtml::listData(UnidadHabitacional::model()->findall(), 'id_unidad_habitacional', 'nombre'),
		),

		array(
				'name' => 'fecha_creacion',
				'value' => 'Yii::app()->dateFormatter->format("d/M/y - hh:mm a", strtotime($data->fecha_creacion))',
		//'header' => 'Creación',
		),
		/*
		'persona_id',

		'cedula',
		'nombre_completo',
		'id_control',
		'nacionalidad',
		'nombre_archivo',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
		'estatus',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
