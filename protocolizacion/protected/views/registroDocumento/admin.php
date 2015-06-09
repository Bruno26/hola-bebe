<?php
$this->breadcrumbs=array(
	'Registro Documentos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List RegistroDocumento','url'=>array('index')),
array('label'=>'Create RegistroDocumento','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('registro-documento-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Registro Documentos</h1>

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
'id'=>'registro-documento-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_registro_documento',
		'analisis_credito_id',
		'registro_publico_id',
		'nro_registro',
		'fecha_registro',
		'tomo',
		/*
		'ano',
		'nro_protocolo',
		'nro_matricula',
		'fuente_datos_entrada_id',
		'estatus',
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
