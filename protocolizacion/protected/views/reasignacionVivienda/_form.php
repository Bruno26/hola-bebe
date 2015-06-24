
<div class="row">
    <div class="row-fluid">
        <div class="col-md-3">
            <?php echo $form->textFieldGroup($model, 'vivienda_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->textFieldGroup($model, 'tipo_reasignacion_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->textFieldGroup($model, 'persona_id_autoriza', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->textFieldGroup($model, 'fecha_reasignacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="row-fluid">
        <div class="col-md-12">
            <?php echo $form->textFieldGroup($model, 'observaciones', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
        </div>
    </div>
</div>






