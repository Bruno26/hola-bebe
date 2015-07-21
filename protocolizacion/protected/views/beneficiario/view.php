
<h1>Detalle del Beneficiario #<?php echo $model->id_beneficiario; ?></h1>

<?php $this->widget('booster.widgets.TbPanel', array(
    'context' => 'primary',
    'content' => $this->renderPartial('_view', array('model' => $model), TRUE),
        )
);
?>

<?php // $this->widget('booster.widgets.TbDetailView',array(
//'data'=>$model,
//'attributes'=>array(
//		'id_beneficiario',
//		'persona_id',
//		'rif',
//		'condicion_trabajo_id',
//		'fuente_ingreso_id',
//		'relacion_trabajo_id',
//		'sector_trabajo_id',
//		'nombre_empresa',
//		'direccion_empresa',
//		'telefono_trabajo',
//		'gen_cargo_id',
//		'ingreso_mensual',
//		'ingreso_declarado',
//		'ingreso_promedio_faov',
//		'cotiza_faov',
//		'direccion_anterior',
//		'geo_estado_id',
//		'geo_municipio_id',
//		'geo_parroquia_id',
//		'urban_barrio',
//		'av_call_esq_carr',
//		'zona',
//		'fecha_ultimo_censo',
//		'protocolizado',
//		'fecha_creacion',
//		'fecha_actualizacion',
//		'usuario_id_creacion',
//		'usuario_id_actualizacion',
//		'estatus_beneficiario_id',
//		'codigo_trab',
//),
//)); ?>
