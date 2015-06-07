<?php
$this->breadcrumbs=array(
	'Desarrollos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Desarrollo','url'=>array('index')),
array('label'=>'Create Desarrollo','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('desarrollo-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Desarrollos</h1>

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
'id'=>'desarrollo-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_desarrollo',
		'nombre',
		'parroquia_id',
		'descripcion',
		'urban_barrio',
		'av_call_esq_carr',
		/*
		'zona',
		'lindero_norte',
		'lindero_sur',
		'lindero_este',
		'lindero_oeste',
		'coordenadas',
		'lote_terreno_mt2',
		'fuente_financiamiento_id',
		'ente_ejecutor_id',
		'titularidad_del_terreno',
		'total_viviendas',
		'total_viviendas_protocolizadas',
		'fecha_transferencia',
		'fuente_datos_entrada_id',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
		'programa_id',
		'total_unidades',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
