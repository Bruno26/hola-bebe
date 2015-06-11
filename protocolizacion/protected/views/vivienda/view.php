<?php // echo '<pre>';var_dump($model->fecha_creacion);die();?>

<center><h1>Detalle de la Vivienda Id: <?php echo  $model->id_vivienda.' - ' .date('d/m/Y', strtotime($model->fecha_creacion)); ?></h1></center>

<?php $this->widget('booster.widgets.TbPanel', array(
    'context' => 'primary',
    'content' => $this->renderPartial('_view', array('model' => $model), TRUE),
        )
);

?>