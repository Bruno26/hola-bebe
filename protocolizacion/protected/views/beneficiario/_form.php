


<?php echo $form->hiddenField($model, 'id_beneficiario');  ?>


<div class="row">

    <div class='col-md-3'>
        <?php
        echo $form->datePickerGroup($model, 'fecha_censo', array('widgetOptions' =>
            array(
                'options' => array(
                    'language' => 'es',
                    'format' => 'dd/mm/yyyy',
                    'startView' => 0,
                    'minViewMode' => 0,
                    'todayBtn' => 'linked',
                    'weekStart' => 0,
                    'endDate' => 'now()',
                    'autoclose' => true,
                ),
                'htmlOptions' => array(
                    /* 'class' => 'span5 limpiar', */
                    'readonly' => true,
                ),
            ),
            'prepend' => '<i class="glyphicon glyphicon-calendar"></i>',
            'beforeShowDay' => 'DisableDays',
                )
        );
        ?>
    </div>
      <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($model, 'rif', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20,))));
        ?>
    </div>
    <div class="col-md-3">
        <?php
        echo $form->dropDownListGroup($model, 'nacionalidad', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(96, 'descripcion DESC'),
                'htmlOptions' => array('empty' => 'SELECCIONE'),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-3">
        <?php
        echo $form->textFieldGroup($model, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 8,
                    'onblur' => "buscarBeneficiarioTemporal($('#Beneficiario_nacionalidad').val(),$(this).val())"
        ))));
        ?>
        <?php echo $form->error($model, 'cedula'); ?>
    </div>
</div>

<div class="row">
    <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($model, 'primer_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($model, 'segundo_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($model, 'primer_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($model, 'segundo_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
</div>


<div class="row">
    <div class='col-md-4'>
        <?php
        echo $form->datePickerGroup($model, 'fecha_nacimiento', array('widgetOptions' =>
            array(
                'options' => array(
                    'language' => 'es',
                    'format' => 'dd/mm/yyyy',
                    'startView' => 0,
                    'minViewMode' => 0,
                    'todayBtn' => 'linked',
                    'weekStart' => 0,
                    'endDate' => 'now()',
                    'autoclose' => true,
                ),
                'htmlOptions' => array(
                    'class' => 'span5 limpiar',
                    'readonly' => true,
                ),
            ),
            'prepend' => '<i class="glyphicon glyphicon-calendar"></i>',
            'beforeShowDay' => 'DisableDays',
                )
        );
        ?>
    </div>

    <div class='col-md-4'>

        <?php echo CHtml::activeLabel($model, 'sexo'); ?><br>
        <?php
        $this->widget('booster.widgets.TbSwitch', array(
            'name' => 'sexo',
            'options' => array(
                'size' => 'large',
                'onText' => 'Masculino',
                'offText' => 'Femenino',
            ),
            'htmlOptions' => array(
                'class' => 'span5',
            
            )
                )
        );
        ?> 

    </div>    
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($model, 'estado_civil', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true))));
        ?>
    </div>
</div>


<div class="row">
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($model, 'telf_habitacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200,'readonly' => true))));
        ?>
    </div>
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($model, 'telf_celular', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-4'>
        <?php echo $form->labelEx($model, 'correo'); ?>
        <?php
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => CHtml::activeId($model, 'correo'),
            'attribute' => 'correo',
            'htmlOptions' => array(
                'onchange' => 'emailCheck(this.value,this.id);',
            ),
            'options' => array(
                'tags' => array(),
                'placeholder' => 'Ingrese su Correo Electrónico!',
                'width' => '100%',
                'tokenSeparators' => array(',', ' '),
                'multiple' => true,
                'maximumInputLength' => 150,
                //'minimumInputLength' => ,
                'maximumSelectionSize' => 2,
                'allowClear' => true,
                'items' => 4,
            )
                )
        );
        ?>
        <?php // echo $form->error($model, 'correo'); ?>
    </div>

</div>
