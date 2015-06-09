<?php
$this->breadcrumbs=array(
	'Reasignacion Viviendas'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List ReasignacionVivienda','url'=>array('index')),
array('label'=>'Create ReasignacionVivienda','url'=>array('create')),
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

<h1>Manage Reasignacion Viviendas</h1>

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
'id'=>'reasignacion-vivienda-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_reasignacion_vivienda',
		'beneficiario_id_anterior',
		'beneficiario_id_actual',
		'vivienda_id',
		'tipo_reasignacion_id',
		'persona_id_autoriza',
		/*
		'observaciones',
		'fecha_reasignacion',
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
