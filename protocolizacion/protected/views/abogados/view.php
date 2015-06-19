<?php
$this->breadcrumbs=array(
	'Abogadoses'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Abogados','url'=>array('index')),
array('label'=>'Create Abogados','url'=>array('create')),
array('label'=>'Update Abogados','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Abogados','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Abogados','url'=>array('admin')),
);
?>
<h1> Detalle de Agente de Documentación</h1>

<?php $this->widget('booster.widgets.TbPanel', array(
    'context' => 'primary',
    'content' => $this->renderPartial('_view', array('model' => $model), TRUE),
        )
);
?>
<?php /*$this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'persona_id',
		'inpreabogado',
		'tipo_abogado_id',
		'oficina_id',
		'observaciones',
		'estatus',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
),
)); */?>
<div class="row text-right" style="margin-right: 1em">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'button',
        'context' => 'danger',
        'size' => 'large',
        'label' => 'Regresar',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('/abogados/admin') . '"',
        )
    ));
    ?>
    </div>
