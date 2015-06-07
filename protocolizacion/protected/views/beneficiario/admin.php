<?php
$this->breadcrumbs=array(
	'Beneficiarios'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Beneficiario','url'=>array('index')),
array('label'=>'Create Beneficiario','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('beneficiario-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Beneficiarios</h1>

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
'id'=>'beneficiario-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_beneficiario',
		'persona_id',
		'rif',
		'condicion_trabajo_id',
		'fuente_ingreso_id',
		'relacion_trabajo_id',
		/*
		'sector_trabajo_id',
		'nombre_empresa',
		'direccion_empresa',
		'telefono_trabajo',
		'gen_cargo_id',
		'ingreso_mensual',
		'ingreso_declarado',
		'ingreso_promedio_faov',
		'cotiza_faov',
		'direccion_anterior',
		'geo_estado_id',
		'geo_municipio_id',
		'geo_parroquia_id',
		'urban_barrio',
		'av_call_esq_carr',
		'zona',
		'fecha_ultimo_censo',
		'protocolizado',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
		'estatus_beneficiario_id',
		'codigo_trab',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
