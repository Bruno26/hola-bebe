

<?php
 $baseUrl = Yii::app()->baseUrl;
 $numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
 $Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');


Yii::app()->clientScript->registerScript('Beneficiario_temporal', "



    $(document).ready(function(){
         $('#BeneficiarioTemporal_cedula').numeric();
         $('#BeneficiarioTemporal_telf_habitacion').numeric();
         $('#BeneficiarioTemporal_telf_celular').numeric();

         /*  ------  Bloqueo campos    ------- */

            $('#BeneficiarioTemporal_primer_apellido').attr('readonly', true);
            $('#BeneficiarioTemporal_segundo_apellido').attr('readonly', true);
            $('#BeneficiarioTemporal_primer_nombre').attr('readonly', true);
            $('#BeneficiarioTemporal_segundo_nombre').attr('readonly', true);
            $('#BeneficiarioTemporal_fecha_nacimiento').attr('readonly', true);
            $('#BeneficiarioTemporal_sexo').attr('readonly', true);
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
                        'onblur' => "buscarPersonaBeneficiarioTemp($('#BeneficiarioTemporal_nacionalidad').val(),$(this).val())"
            ))));

              echo $form->hiddenField($model,'persona_id',array('type'=>"hidden",'size'=>2,'maxlength'=>2)); 
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



