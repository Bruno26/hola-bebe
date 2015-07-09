<?php
$this->breadcrumbs=array(
	'Analisis Creditos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List AnalisisCredito','url'=>array('index')),
array('label'=>'Create AnalisisCredito','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('analisis-credito-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Analisis Creditos</h1>

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
'id'=>'analisis-credito-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_analisis_credito',
		'nro_serial_bancario',
		'vivienda_id',
		'unidad_familiar_id',
		'tipo_documento_id',
		'ingreso_total_familiar',
		/*
		'monto_credito',
		'monto_inicial',
		'sub_directo_habitacional',
		'sub_vivienda_perdida',
		'plazo_credito_ano',
		'nro_cuotas',
		'monto_cuota_financiera',
		'monto_cuota_f_total',
		'monto_prima_inicial_fg',
		'alicuota_fondo_garantia',
		'fecha_protocolizacion',
		'tasa_interes_id',
		'tasa_mora_id',
		'tasa_fongar_id',
		'plazo_gracia',
		'plazo_diferido',
		'status_migracion_id',
		'gen_banco_id',
		'tipo_cuenta',
		'nro_cuenta_bancario',
		'fuente_datos_entrada_id',
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
