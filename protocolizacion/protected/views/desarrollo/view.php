<?php
// echo '<pre>';var_dump($estado);die();
$this->breadcrumbs=array(
	'Desarrollos'=>array('index'),
	$model->id_desarrollo,
);

$this->menu=array(
array('label'=>'List Desarrollo','url'=>array('index')),
array('label'=>'Create Desarrollo','url'=>array('create')),
array('label'=>'Update Desarrollo','url'=>array('update','id'=>$model->id_desarrollo)),
array('label'=>'Delete Desarrollo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_desarrollo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Desarrollo','url'=>array('admin')),
);
?>

<center><h1>Detalle del Desarrollo <?php echo  $model->nombre.' - ' .date('d/m/Y', strtotime($model->fecha_creacion)); ?></h1></center>

<?php $this->widget('booster.widgets.TbPanel', array(
    'context' => 'primary',
    'content' => $this->renderPartial('_view', array('model' => $model, 'estado' => $estado, 'municipio' => $municipio), TRUE),
        )
);
//		'id_desarrollo',
//		'nombre',
//		'parroquia_id',
//		'descripcion',
//		'urban_barrio',
//		'av_call_esq_carr',
//		'zona',
//		'lindero_norte',
//		'lindero_sur',
//		'lindero_este',
//		'lindero_oeste',
//		'coordenadas',
//		'lote_terreno_mt2',
//		'fuente_financiamiento_id',
//		'ente_ejecutor_id',
//		'titularidad_del_terreno',
//		'total_viviendas',
//		'total_viviendas_protocolizadas',
//		'fecha_transferencia',
//		'fuente_datos_entrada_id',
//		'fecha_creacion',
//		'fecha_actualizacion',
//		'usuario_id_creacion',
//		'usuario_id_actualizacion',
//		'programa_id',
//		'total_unidades',
//),
//)); 
?>
<div class="row text-right" style="margin-right: 1em">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'button',
        'context' => 'danger',
        'size' => 'large',
        'label' => 'Regresar',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('/desarrollo/admin') . '"',
        )
    ));
    ?>
    </div>