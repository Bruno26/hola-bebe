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

<h1>Gestión de Desarrollos</h1>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>
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

	'ente_ejecutor_id' => array(
            'name' => 'ente_ejecutor_id',
            'value' => '$data->enteEjecutor->nombre_ente_ejecutor',
            'filter' => CHtml::listData(EnteEjecutor::model()->findall(), 'id_ente_ejecutor', 'nombre_ente_ejecutor'),
        ),

	'fuente_financiamiento_id' => array(
            'name' => 'fuente_financiamiento_id',
            'value' => '$data->fuenteFinanciamiento->nombre_fuente_financiamiento',
            'filter' => CHtml::listData(FuenteFinanciamiento::model()->findall(), 'id_fuente_financiamiento', 'nombre_fuente_financiamiento'),
        ),

	'total_viviendas',
	//		'parroquia_id',
            'parroquia_id' => array(
                'name' => 'parroquia_id',
               // 'value' => '$data->ParroquiaId->clvmunicipio0->clvestado0->strdescripcion',
                'header' => 'Estado',
            ),

        array(
            'name' => 'fecha_transferencia',
            'value' => 'Yii::app()->dateFormatter->format("d/M/y - hh:mm a", strtotime($data->fecha_transferencia))',
            //'header' => 'Creación',
        ),
		/*
		'parroquia_id',
		'descripcion',
		'urban_barrio',
		'av_call_esq_carr',
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
		'total_viviendas_protocolizadas',
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
