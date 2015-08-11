

<?php
// var_dump($_GET["id"]); die();
$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');

if (isset($_GET["id"])) {

    // Formulario en estado Update

    Yii::app()->clientScript->registerScript('Beneficiario_temporal', "

                 buscarPersonaBeneficiarioTemp2($('#BeneficiarioTemporal_nacionalidad').val(),$('#BeneficiarioTemporal_cedula').val())
  ");
} else {

    Yii::app()->clientScript->registerScript('Beneficiario_temporal', "

    $(document).ready(function(){


               $('#BeneficiarioTemporal_cedula').numeric();
               $('#s2id_autogen1').numeric();
               $('#s2id_autogen2').numeric();

               /*  ------  Bloqueo campos    ------- */

                  $('#BeneficiarioTemporal_primer_apellido').attr('readonly', true);
                  $('#BeneficiarioTemporal_segundo_apellido').attr('readonly', true);
                  $('#BeneficiarioTemporal_primer_nombre').attr('readonly', true);
                  $('#BeneficiarioTemporal_segundo_nombre').attr('readonly', true);
                  $('#BeneficiarioTemporal_fecha_nacimiento').attr('readonly', true);
                  $('#BeneficiarioTemporal_sexo').attr('readonly', true);
                 /* $('#BeneficiarioTemporal_sexo').attr('disabled', true); */
                  $('#BeneficiarioTemporal_estado_civil').attr('readonly', true);
                  $('#BeneficiarioTemporal_estado_civil').attr('disabled', true);
                  $('#BeneficiarioTemporal_telf_habitacion').attr('readonly', true);
                  $('#BeneficiarioTemporal_telf_celular').attr('readonly', true);
                  $('#BeneficiarioTemporal_correo_electronico').attr('readonly', true);

               /*   -------------------------------- */
         
    });


  ");
}
?>

<div class="row">
    <div class='col-md-4'>

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
        <?php
        echo $form->textFieldGroup($model, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 8,
                    'onblur' => "buscarPersonaBeneficiarioTemp($('#BeneficiarioTemporal_nacionalidad').val(),$(this).val())"
        ))));

        echo $form->hiddenField($model, 'persona_id', array('type' => "hidden", 'size' => 2, 'maxlength' => 2));
        ?>
    </div>
    <?php echo $form->error($model, 'cedula'); ?>
    <div class="col-md-4"  id="iconLoding" style="display: none">
        <img src="<?php echo Yii::app()->baseUrl; ?>/images/loading.gif" width="50px" height="60px">
    </div>

</div>


<div class="row">
    <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($model, 'primer_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
        ?>
    </div>
    <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($model, 'segundo_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
        ?>
    </div>


    <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($model, 'primer_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
        ?>
    </div>
    <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($model, 'segundo_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
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
                    /* 'class' => 'span5 limpiar', */
                ),
            ),
            'prepend' => '<i class="glyphicon glyphicon-calendar"></i>',
            'beforeShowDay' => 'DisableDays',
                )
        );
        ?>
    </div>
    <div class='col-md-4'>
        <?php
        echo $form->dropDownListGroup($model, 'sexo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
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
        echo $form->dropDownListGroup($model, 'estado_civil', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
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
// echo $form->textFieldGroup($model,'telf_habitacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
        ?>

        <?php
        echo $form->labelEx($model, 'telf_habitacion');
        //Inicio Campo de Número de Telefono
        ?><br>
        <?php
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => CHtml::activeId($model, 'telf_habitacion'),
            'attribute' => 'telf_habitacion',
//            'htmlOptions' => array(
//                'onchange' => 'telfCheck(this.id);',
//            ),
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
        <?php echo $form->error($model, 'telf_habitacion'); ?>
    </div>

    <div class='col-md-4'>
        <?php
        // echo $form->textFieldGroup($model,'telf_celular',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
        ?>
        <?php
        echo $form->labelEx($model, 'telf_celular');
        //Inicio Campo de Número de Telefono
        ?><br>
        <?php
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => CHtml::activeId($model, 'telf_celular'),
            'attribute' => 'telf_celular',
//            'htmlOptions' => array(
//                'onchange' => 'telfCheck(this.id);',
//            ),
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
        <?php echo $form->error($model, 'telf_celular'); ?>
    </div>

    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($model, 'correo_electronico', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200))));
        ?>
    </div>
</div>
