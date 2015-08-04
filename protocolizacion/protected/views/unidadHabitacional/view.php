<?php
$this->breadcrumbs=array(
	'Unidad Habitacionals'=>array('index'),
	$model->id_unidad_habitacional,
);

$this->menu=array(
array('label'=>'List UnidadHabitacional','url'=>array('index')),
array('label'=>'Create UnidadHabitacional','url'=>array('create')),
array('label'=>'Update UnidadHabitacional','url'=>array('update','id'=>$model->id_unidad_habitacional)),
array('label'=>'Delete UnidadHabitacional','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_unidad_habitacional),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage UnidadHabitacional','url'=>array('admin')),
);
?>

<h1 class="text-center">Unidad Multifamiliar <?php echo $model->nombre; ?></h1>


<?php $this->widget('booster.widgets.TbPanel', array(
    'context' => 'primary',
    'content' => $this->renderPartial('_view', array('model' => $model, 'estado' => $estado, 'municipio' => $municipio), TRUE),
        )
);
?>
<div class="row text-right" style="margin-right: 1em">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'button',
        'context' => 'danger',
        'size' => 'large',
        'label' => 'Regresar',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('/VswMultifamiliar/admin') . '"',
        )
    ));
    ?>
    </div>

               
