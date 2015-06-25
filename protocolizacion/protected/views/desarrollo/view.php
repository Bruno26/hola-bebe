<?php
// echo '<pre>';var_dump($estado);die();
$this->breadcrumbs = array(
    'Desarrollos' => array('index'),
    $model->id_desarrollo,
);

$this->menu = array(
    array('label' => 'List Desarrollo', 'url' => array('index')),
    array('label' => 'Create Desarrollo', 'url' => array('create')),
    array('label' => 'Update Desarrollo', 'url' => array('update', 'id' => $model->id_desarrollo)),
    array('label' => 'Delete Desarrollo', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_desarrollo), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Desarrollo', 'url' => array('admin')),
);
?>

<center><h2><br> <?php echo $model->nombre . '<br>' . date('d/m/Y', strtotime($model->fecha_creacion)); ?></h2></center>

<?php
$this->widget('booster.widgets.TbPanel', array(
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
            'onclick' => 'document.location.href ="' . $this->createUrl('/desarrollo/admin') . '"',
        )
    ));
    ?>
</div>