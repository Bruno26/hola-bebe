<?php
$this->breadcrumbs=array(
	'Analisis Creditos'=>array('index'),
	$model->id_analisis_credito,
);

$this->menu=array(
array('label'=>'List AnalisisCredito','url'=>array('index')),
array('label'=>'Create AnalisisCredito','url'=>array('create')),
array('label'=>'Update AnalisisCredito','url'=>array('update','id'=>$model->id_analisis_credito)),
array('label'=>'Delete AnalisisCredito','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_analisis_credito),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage AnalisisCredito','url'=>array('admin')),
);
?>

<h1>View AnalisisCredito #<?php echo $model->id_analisis_credito; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_analisis_credito',
		'nro_serial_bancario',
		'vivienda_id',
		'unidad_familiar_id',
		'tipo_documento_id',
		'ingreso_total_familiar',
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
),
)); ?>
