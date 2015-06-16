<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'beneficiario-form',
	'enableAjaxValidation'=>false,
));  ?>


<?php
 $baseUrl = Yii::app()->baseUrl;
 $numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
 $Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');


Yii::app()->clientScript->registerScript('Beneficiario', "



    $(document).ready(function(){
         $('#Beneficiario_cedula').numeric();

         /*  ------  Bloqueo campos    ------- */

           $('#Beneficiario_primer_apellido').attr('readonly', true);
           $('#Beneficiario_segundo_apellido').attr('readonly', true);
           $('#Beneficiario_primer_nombre').attr('readonly', true);
           $('#Beneficiario_segundo_nombre').attr('readonly', true);
           $('#Beneficiario_fecha_nacimiento').attr('readonly', true);
           $('#Beneficiario_sexo').attr('disabled', true);
           $('#Beneficiario_estado_civil').attr('readonly', true);
           $('#Beneficiario_telf_habitacion').attr('readonly', true);
           $('#Beneficiario_telf_celular').attr('readonly', true);
           $('#Beneficiario_correo').attr('readonly', true);  
           
         /*   -------------------------------- */                
             
    }); 


  ");

?>

<?php #echo $form->errorSummary($model); ?>

<div class="row">
    <div class="row-fluid">

        <div class='col-md-4'>
            <?php
            #echo $form->textFieldGroup($model,'fecha_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
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
        <div class="col-md-4">
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
         <div class="col-md-4">
              <?php
            echo $form->textFieldGroup($model, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 8,
                        'onblur' => "buscarBeneficiarioTemporal($('#Beneficiario_nacionalidad').val(),$(this).val())"
            ))));
            ?>
               <?php echo $form->error($model,'cedula'); ?>
        </div>
  </div>

     <div class="row-fluid">
        <div class='col-md-5'>
            <?php
           echo $form->textFieldGroup($model,'primer_apellido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-5'>
            <?php
            echo $form->textFieldGroup($model,'segundo_apellido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
    </div>

     <div class="row-fluid">
        <div class='col-md-5'>
            <?php
           echo $form->textFieldGroup($model,'primer_nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-5'>
            <?php
            echo $form->textFieldGroup($model,'segundo_nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
    </div>
 </div>


<div class="row">
    <div class="row-fluid">
        <div class='col-md-5'>
            <?php
            #echo $form->textFieldGroup($model,'fecha_ultimo_censo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
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

        <div class='col-md-5'>
         
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
                // 'onChange' => '',
                )
                    )
            );
            ?> 
   
        </div>    
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-5'>
             <?php
                 echo $form->textFieldGroup($model,'estado_civil',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100))));
                ?>
        </div>
         <div class='col-md-5'>
                <?php
                 echo $form->textFieldGroup($model,'telf_habitacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
                ?>
           </div>
    </div>
</div>



<div class="row">
    <div class="row-fluid">
        <div class='col-md-5'>
                <?php
                 echo $form->textFieldGroup($model,'telf_celular',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
                 ?>
           </div>


        <div class='col-md-5'>
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
         <?php echo $form->error($model,'correo'); ?>
        </div>
    </div> 
</div>           

<div class="form-actions">
	<?php /*$this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); */ ?>
</div>

<?php $this->endWidget(); ?>
