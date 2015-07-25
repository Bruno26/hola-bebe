<?php echo $form->hiddenField($model, 'beneficiario_id_actual'); ?>
<div class="row">
    <div class="row-fluid"> 
        <div class='col-md-4'>

            <?php
            echo $form->dropDownListGroup($model, 'nacionalidadActual', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
                'widgetOptions' => array(
                    'data' => Maestro::FindMaestrosByPadreSelect(96, 'descripcion DESC'),
                    'htmlOptions' => array('empty' => 'SELECCIONE'),
                )
                    )
            );
            ?>

        </div>
        <div class='col-md-4'>
            <?php
            echo $form->textFieldGroup($model, 'cedulaActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 8,
                        'onblur' => "buscarPersonaBeneficiarioTemp($('#BeneficiarioTemporal_nacionalidad').val(),$(this).val())"
            ))));

//            echo $form->hiddenField($model, 'persona_id', array('type' => "hidden", 'size' => 2, 'maxlength' => 2));
            ?>
            <?php echo $form->error($model, 'cedula'); ?>
            <span hidden="hidden" class="cargar"><?php echo CHtml::image(Yii::app()->request->baseUrl . "/images/loading.gif"); ?></span>
        </div>


        
        </div> 
    </div>


    <div class="row-fluid">
        <div class='col-md-3'>
            <?php
            echo $form->textFieldGroup($model, 'primer_nombreActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
            ?>
        </div>
        <div class='col-md-3'>
            <?php
            echo $form->textFieldGroup($model, 'segundo_nombreActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
            ?>
        </div>


        <div class='col-md-3'>
            <?php
            echo $form->textFieldGroup($model, 'primer_apellidoActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
            ?>
        </div>
        <div class='col-md-3'>
            <?php
            echo $form->textFieldGroup($model, 'segundo_apellidoActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
            ?>
        </div>


    </div>




    <div class="row-fluid"> 
        <div class='col-md-4'>
            <?php
            echo $form->textFieldGroup($model, 'fecha_nacimientoActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
            ?>
        </div>
        <div class='col-md-4'>
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

    <div class="row-fluid">
        <div class='col-md-4'>
            <?php
            // echo $form->textFieldGroup($model,'telf_habitacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
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
                'attribute' => 'telf_habitacion',
                'htmlOptions' => array(
                    'onchange' => 'telfCheck(this.id);',
                ),
                'options' => array(
                    'tags' => array(),
                    'class' => 'Limpiar',
                    'placeholder' => 'Número teléfonico!',
                    'width' => '80%',
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
            <?php echo $form->error($model, 'telf_habitacionActual'); ?>
        </div>

        <div class='col-md-4'>
            <?php
            // echo $form->textFieldGroup($model,'telf_celular',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
            <?php
            echo $form->labelEx($model, 'telf_celularActual');
            //Inicio Campo de Número de Telefono
            ?><br>
            <?php
            $this->widget(
                    'booster.widgets.TbSelect2', array(
                'asDropDownList' => false,
                'name' => CHtml::activeId($model, 'telf_celularActual'),
                'attribute' => 'telf_celular',
                'htmlOptions' => array(
                    'onchange' => 'telfCheck(this.id);',
                ),
                'options' => array(
                    'tags' => array(),
                    'class' => 'Limpiar',
                    'placeholder' => 'Número teléfonico!',
                    'width' => '60%',
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
            <?php echo $form->error($model, 'telf_celularActual'); ?>
        </div>

        <div class='col-md-4'>
            <?php
            echo $form->textFieldGroup($model, 'correo_electronicoActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
            ?>
        </div>
    </div>





<!--<div class="row">
    <div class="row-fluid">
        <div class="col-md-6">
<?php
//            echo $form->dropDownListGroup($model, 'nacionalidadActual', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
//                'widgetOptions' => array(
//                    'data' => Maestro::FindMaestrosByPadreSelect(96),
//                    'htmlOptions' => array(
//                        'empty' => 'SELECCIONE',
//                    ),
//                )
//                    )
//            );
?>
        </div>
        <div class="col-md-6">
<?php
//            echo $form->textFieldGroup($model, 'cedulaActual', array(
//                'widgetOptions' => array(
//                    'htmlOptions' => array(
//                        'class' => 'span5',
//                        'onblur' => "buscarBenefAnterior($('#ReasignacionVivienda_nacionalidadActual').val(), $(this).val(),2)"
//                    )
//                )
//                    )
//            );
?>
        </div>
    </div>
</div>
<div class="row">
    <div class="row-fluid">
        <div class="col-md-12">
<?php // echo $form->textFieldGroup($model, 'nombreCompletoActual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => true))));  ?>
        </div>
    </div>
</div>-->

