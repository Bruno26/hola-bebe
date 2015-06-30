<?php
$this->breadcrumbs=array(
	'Empadronador Censos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List EmpadronadorCenso','url'=>array('index')),
array('label'=>'Create EmpadronadorCenso','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('empadronador-censo-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Empadronador Censos</h1>

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
'id'=>'empadronador-censo-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_empadronador_censo',
		'asignacion_censo_id',
		'empadronador_usuario_id',
		'estatus',
		'usuario_creacion',
		'fecha_creacion',
		/*
		'usuario_modificacion',
		'fecha_actualizacion',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
