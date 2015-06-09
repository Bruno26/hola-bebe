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

<h1>Manage Beneficiario Temporals</h1>

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
'id'=>'beneficiario-temporal-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_beneficiario_temporal',
		'persona_id',
		'desarrollo_id',
		'unidad_habitacional_id',
		'id_control',
		'nacionalidad',
		/*
		'cedula',
		'nombre_completo',
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
