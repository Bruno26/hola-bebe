<?php // echo '<pre>';var_dump($model->fecha_creacion);die();    ?>


<center><h1><b>Detalle: </b><?php echo $model->unidadHabitacional->desarrollo->nombre . ' / ' . $model->unidadHabitacional->nombre . ' / ' . $model->nro_vivienda; ?></h1></center>


<?php
$this->widget('booster.widgets.TbPanel', array(
    'context' => 'primary',
    'content' => $this->renderPartial('_view', array('model' => $model), TRUE),
        )
);
?>
<div class="row text-right" style="margin-right: 1em">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'context' => 'danger',
        'label' => 'Cancelar',
        'size' => 'large',
        'id' => 'CancelarForm',
        'icon' => 'ban-circle',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('admin') . '";'
        )
    ));
    ?>
</div>
