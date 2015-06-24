<div class="row">
    <div class="col-md-4">

        <?php echo $form->textFieldGroup($model, 'asignacion_censo_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class="col-md-4">

        <?php echo $form->textFieldGroup($model, 'empadronador_usuario_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'estatus', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'usuario_creacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class="col-md-4">

        <?php echo $form->textFieldGroup($model, 'fecha_creacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'usuario_modificacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

    </div>
</div>






<?php echo $form->textFieldGroup($model, 'fecha_actualizacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
