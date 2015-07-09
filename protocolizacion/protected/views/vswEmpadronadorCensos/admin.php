<?php
$this->breadcrumbs=array(
	'Vsw Empadronador Censoses'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List VswEmpadronadorCensos','url'=>array('index')),
array('label'=>'Create VswEmpadronadorCensos','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('vsw-empadronador-censos-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Vsw Empadronador Censoses</h1>

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
'id'=>'vsw-empadronador-censos-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_desarrollo',
		'nombre_desarrollo',
		'id_unidad_habitacional',
		'nombre_unidad_multifamiliar',
		'id_beneficiario_temporal',
		'persona_id',
		/*
		'cedula',
		'nombre_adjudicado',
		'estatus',
		'iduser',
		'empadronador_usuario',
		'nro_piso',
		'nro_vivienda',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
