<p class="help-block">Fields with <span class="required">*</span> are required.</p>


<?php echo $form->textFieldGroup($model, 'beneficiario_id_actual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
<div class="row">
    <div class="row-fluid">
        <div class="col-md-6">
            <?php 
            echo $form->dropDownListGroup($model, 'nacionalidadActual', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
                'widgetOptions' => array(
                    'data' => Maestro::FindMaestrosByPadreSelect(96),
                    'htmlOptions' => array(
                        'empty' => 'SELECCIONE',
                    ),
                )
                    )
            );
            ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model, 'cedulaActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="row-fluid">
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model, 'nombreActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => true)))); ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model, 'apellidoActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => true)))); ?>
        </div>
    </div>
</div>