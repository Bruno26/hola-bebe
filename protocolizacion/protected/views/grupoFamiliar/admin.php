<?php
$this->breadcrumbs=array(
	'Grupo Familiars'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List GrupoFamiliar','url'=>array('index')),
array('label'=>'Create GrupoFamiliar','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('grupo-familiar-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Grupo Familiars</h1>

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
'id'=>'grupo-familiar-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_grupo_familiar',
		'unidad_familiar_id',
		'persona_id',
		'gen_parentesco_id',
		'tipo_sujeto_atencion',
		'ingreso_mensual',
		/*
		'fuente_datos_entrada_id',
		'cotiza_faov',
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
