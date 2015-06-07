<?php
$this->breadcrumbs=array(
	'Programas'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Programa','url'=>array('index')),
array('label'=>'Create Programa','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('programa-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Programas</h1>

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
'id'=>'programa-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_programa',
		'nombre_programa',
		'fecha_creacion',
		'fecha_actualizacion',
		'estatus',
		'usuario_id_creacion',
		/*
		'usuario_id_actualizacion',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
