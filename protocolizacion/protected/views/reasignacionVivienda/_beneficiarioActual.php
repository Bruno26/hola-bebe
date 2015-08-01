<?php echo $form->hiddenField($model, 'beneficiario_id_actual'); ?>
<div class="row">

    <div class='col-md-4'>
        <b>Nacionalidad </b> <span class="required">*</span>
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
    <div class='col-md-4'>
        <b>Cédula del Beneficiario Actual</b> <span class="required">*</span>
        <?php
        echo $form->textFieldGroup($model, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 8,
                    'onblur' => "buscarBenefAnterior($('#ReasignacionVivienda_nacionalidad').val(), $(this).val())"
        ))));
        ?>
        <?php // echo $form->error($model, 'cedula'); ?>
    </div>
    <div class="col-md-4"  id="iconLoding" style="display: none">
        <img src="<?php echo Yii::app()->baseUrl; ?>/images/loading.gif" width="50px" height="60px">
    </div>

</div>


<div class="row">
    <div class='col-md-3'>
        <b>Primer Nombre</b> <span class="required">*</span>
        <?php
        echo $form->textFieldGroup($model, 'primer_nombreActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-3'>
        <b>Segundo Nombre</b> <span class="required">*</span>
        <?php
        echo $form->textFieldGroup($model, 'segundo_nombreActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>


    <div class='col-md-3'>
        <b>Primer Apellido</b> <span class="required">*</span>
        <?php
        echo $form->textFieldGroup($model, 'primer_apellidoActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-3'>
        <b>Segundo Apellido</b> <span class="required">*</span>
        <?php
        echo $form->textFieldGroup($model, 'segundo_apellidoActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>


</div>




<div class="row"> 
    <div class='col-md-4'>
        <b>Fecha de Nacimiento</b> <span class="required">*</span>
        <?php
        echo $form->textFieldGroup($model, 'fecha_nacimientoActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-4'>
        <b>Sexo</b> <span class="required">*</span>
        <?php
        echo $form->dropDownListGroup($model, 'sexoActual', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
            'widgetOptions' => array(
                'data' => array('1' => 'FEMENINO', '2' => 'MASCULINO'),
                'htmlOptions' => array('empty' => 'SELECCIONE'),
            )
                )
        );
        ?>

    </div>

    <div class='col-md-4'>
        <b>Estado Civil</b> <span class="required">*</span>
        <?php
        echo $form->dropDownListGroup($model, 'estado_civilActual', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(162, 'descripcion ASC'),
                'htmlOptions' => array('empty' => 'SELECCIONE'),
            )
                )
        );
        ?>

    </div>
</div> 

<div class="row">
    <div class='col-md-4'>
        <?php
//         echo $form->textFieldGroup($model,'telf_habitacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
        ?>

        <?php
        echo $form->labelEx($model, 'telf_habitacionActual');
        //Inicio Campo de Número de Telefono
        ?><br>
        <?php
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => CHtml::activeId($model, 'telf_habitacionActual'),
            'attribute' => 'telf_habitacionActual',
            'htmlOptions' => array(
                'onchange' => 'telfCheck(this.id);',
            ),
            'options' => array(
                'tags' => array(),
                'class' => 'Limpiar',
                'placeholder' => 'Número teléfonico!',
                'width' => '100%',
                'tokenSeparators' => array(',', ' '),
                'multiple' => true,
                'maximumInputLength' => 11,
                //'minimumInputLength' => 11,
                'maximumSelectionSize' => 1,
                'allowClear' => true,
                'items' => 1,
            )
                )
        );
        ?>
    </div>

    <div class='col-md-4'>
        <?php
        echo $form->labelEx($model, 'telf_celularActual');
        //Inicio Campo de Número de Telefono
        ?><br>
        <?php
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => CHtml::activeId($model, 'telf_celularActual'),
            'attribute' => 'telf_celularActual',
            'htmlOptions' => array(
                'onchange' => 'telfCheck(this.id);',
            ),
            'options' => array(
                'tags' => array(),
                'class' => 'Limpiar',
                'placeholder' => 'Número teléfonico!',
                'width' => '100%',
                'tokenSeparators' => array(',', ' '),
                'multiple' => true,
                'maximumInputLength' => 11,
                //'minimumInputLength' => 11,
                'maximumSelectionSize' => 1,
                'allowClear' => true,
                'items' => 1,
            )
                )
        );
        ?>
        <?php // echo $form->error($model, 'telf_celularActual'); ?>
    </div>

    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($model, 'correo_electronicoActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
        ?>
    </div>
</div>



