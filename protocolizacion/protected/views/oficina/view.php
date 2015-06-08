<?php
$this->breadcrumbs = array(
    'Oficinas' => array('index'),
    $model->id_oficina,
);

$this->menu = array(
    array('label' => 'List Oficina', 'url' => array('index')),
    array('label' => 'Create Oficina', 'url' => array('create')),
    array('label' => 'Update Oficina', 'url' => array('update', 'id' => $model->id_oficina)),
    array('label' => 'Delete Oficina', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_oficina), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Oficina', 'url' => array('admin')),
);
?>

<h1>View Oficina #<?php echo $model->id_oficina; ?></h1>
<?php //var_dump($model->parroquia->strdescripcion); ?>
<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'nombre',
        array(// related city displayed as a link
            'label' => 'Parroquia',
           // 'type' => 'raw',
            'value' => $model->parroquia->strdescripcion,
        ),
        //'parroquia_id->parroquia->strdescripcion',
        'persona_id_jefe',
        'observaciones',
        'fecha_creacion',
        'fecha_actualizacion',
    ),
));
?>
