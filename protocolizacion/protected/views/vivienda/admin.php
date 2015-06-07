<?php
$this->breadcrumbs=array(
	'Viviendas'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Vivienda','url'=>array('index')),
array('label'=>'Create Vivienda','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('vivienda-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<!--  ****  -->

<h1>Manage Viviendas</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'vivienda-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_vivienda',
		'tipo_vivienda_id',
		'unidad_habitacional_id',
		'construccion_mt2',
		'nro_piso',
		'nro_vivienda',
		/*
		'sala',
		'comedor',
		'lavandero',
		'lindero_norte',
		'lindero_sur',
		'lindero_este',
		'lindero_oeste',
		'coordenadas',
		'precio_vivienda',
		'nro_estacionamientos',
		'descripcion_estac',
		'nro_habitaciones',
		'nro_banos',
		'fuente_datos_entrada_id',
		'estatus_vivienda_id',
		'cocina',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
