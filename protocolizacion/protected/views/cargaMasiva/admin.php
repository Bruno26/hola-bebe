<?php
$this->breadcrumbs=array(
	'Carga Masivas'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List CargaMasiva','url'=>array('index')),
array('label'=>'Create CargaMasiva','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('carga-masiva-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Carga Masivas</h1>

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
'id'=>'carga-masiva-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_carga_masiva',
		'nombre_archivo',
		'num_lineas',
		'tamano_archivo',
		'mensajes_carga',
		'observaciones',
		/*
		'estatus',
		'tipo_carga_masiva',
		'fecha_inicio',
		'fecha_fin',
		'usuario_id_creacion',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
