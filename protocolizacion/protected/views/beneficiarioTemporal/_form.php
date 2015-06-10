<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'beneficiarioTemporal-form',
	'enableAjaxValidation'=>false,
));  ?>

<?php
 $baseUrl = Yii::app()->baseUrl;
 $numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
 $Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');


Yii::app()->clientScript->registerScript('Beneficiario_temporal', "



    $(document).ready(function(){
         $('#BeneficiarioTemporal_cedula').numeric();

         /*  ------  Bloqueo campos    ------- */

           $('#BeneficiarioTemporal_primer_apellido').attr('readonly', true);
           $('#BeneficiarioTemporal_segundo_apellido').attr('readonly', true);
           $('#BeneficiarioTemporal_primer_nombre').attr('readonly', true);
           $('#BeneficiarioTemporal_segundo_nombre').attr('readonly', true);
           $('#BeneficiarioTemporal_fecha_nacimiento').attr('readonly', true);
           $('#BeneficiarioTemporal_sexo').attr('disabled', true);
           $('#BeneficiarioTemporal_estado_civil').attr('readonly', true);
           $('#BeneficiarioTemporal_telf_habitacion').attr('readonly', true);
           $('#BeneficiarioTemporal_telf_celular').attr('readonly', true);
           $('#BeneficiarioTemporal_correo_electronico').attr('readonly', true);  
           
         /*   -------------------------------- */                
             
    }); 


  ");

?>

<div class="row">
    <div class="row-fluid"> 
           <div class='col-md-5'>
                   
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
           <div class='col-md-5'>
                <?php
            echo $form->textFieldGroup($model, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 8,
                        'onblur' => "buscarPersonaBeneficiario($('#BeneficiarioTemporal_nacionalidad').val(),$(this).val())"
            ))));
            ?>
               <?php echo $form->error($model,'cedula'); ?>
               <span hidden="hidden" class="cargar"><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/loading.gif"); ?></span>
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




    <div class="row-fluid"> 
           <div class='col-md-5'>
                <?php
                 echo $form->textFieldGroup($model,'fecha_nacimiento',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
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
			                      'class' => 'span4',
			                // 'onChange' => '',
			                )
			                    )
			            );
	            ?> 
   
           </div>
    </div>


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

    <div class="row-fluid"> 
           

            <div class='col-md-5'>
                <?php
                 echo $form->textFieldGroup($model,'telf_celular',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
                 ?>
           </div>

            <div class='col-md-5'>
                <?php
                 echo $form->textFieldGroup($model,'correo_electronico',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
                ?>
           </div>
    </div>
    
</div>           	

	<?php // echo $form->textFieldGroup($model,'persona_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'desarrollo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'unidad_habitacional_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'id_control',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'nacionalidad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'cedula',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'nombre_completo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

	<?php // echo $form->textFieldGroup($model,'nombre_archivo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

	<?php // echo $form->textFieldGroup($model,'fecha_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'fecha_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'usuario_id_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'usuario_id_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>


<?php $this->endWidget(); ?>