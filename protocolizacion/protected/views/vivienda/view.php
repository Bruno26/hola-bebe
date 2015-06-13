<?php // echo '<pre>';var_dump($model->fecha_creacion);die();?>

<center><h1>Detalle de la Vivienda</h1></center>

<?php $this->widget('booster.widgets.TbPanel', array(
    'context' => 'primary',
    'content' => $this->renderPartial('_view', array('model' => $model), TRUE),
        )
);

?>