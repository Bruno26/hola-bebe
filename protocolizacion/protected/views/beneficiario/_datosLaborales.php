
<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

<?php Yii::app()->clientScript->registerScript('datos', "
    
            $('#Beneficiario_condicion_trabajo_id').change(function(){
                if( $(this).val() == '111' || $(this).val() == '112' || $(this).val() == '114' ||  $(this).val() == '116' ){
                    $('.relacion').show();
               
                } else {
                    $('.relacion').hide();
                }
            }), 
       
            $('#Beneficiario_sector_trabajo_id').change(function(){
                if( $(this).val() == '133'){
                    $('.empresa').show();
                    $('.direccion').show();
               
                } else {
                    $('.empresa').hide();
                    $('.direccion').hide();
                }
            }), 


");?>


<div class="row">

    <div class="col-md-4">

        <?php
        echo $form->dropDownListGroup($model, 'condicion_trabajo_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(109, 'descripcion DESC'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>

    <div class="col-md-4">

        <?php
        echo $form->dropDownListGroup($model, 'fuente_ingreso_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(102, 'descripcion DESC'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4 relacion" style="display: none">


        <?php
        echo $form->dropDownListGroup($model, 'relacion_trabajo_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(117, 'descripcion DESC'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>

    </div>
</div>


<div class="row">

    <div class="col-md-6">


        <?php
        echo $form->dropDownListGroup($model, 'condicion_laboral', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(126, 'descripcion DESC'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>

    </div>

    <div class="col-md-6 ">
        <?php
        echo $form->dropDownListGroup($model, 'sector_trabajo_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(132, 'descripcion DESC'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>

    </div>

</div>

<div class="row">

    <div class="col-md-6 empresa"  style="display: none">

        <?php echo $form->textFieldGroup($model, 'nombre_empresa', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>

    </div>

    <div class="col-md-6 direccion" style="display: none">
        <?php echo $form->textFieldGroup($model, 'direccion_empresa', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>

    </div>

</div>
<div class="row">
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'telefono_trabajo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 11)))); ?>

    </div>

    <div class="col-md-4">

        <?php
        echo $form->dropDownListGroup($model, 'gen_cargo_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(167, 'descripcion DESC'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>

    </div>
    
    

    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'ingreso_declarado', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 12)))); ?>
    </div>

</div>

<div class="row">

    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model, 'ingreso_mensual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => true)))); ?>

    </div>
    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model, 'ingreso_promedio_faov', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => true)))); ?>

    </div>

</div>

<div class="row">

    <div class='col-md-12'>

        <?php
        echo $form->textAreaGroup($model, 'observacion', array('wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'widgetOptions' => array('htmlOptions' => array('maxlength' => 200),)
        ));
        ?>

    </div>
</div>


