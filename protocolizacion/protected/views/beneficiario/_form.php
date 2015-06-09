<!--<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'beneficiario-form',
	'enableAjaxValidation'=>false,
));  ?>-->

<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

<?php #echo $form->errorSummary($model); ?>

<div class="row">
    <div class="row-fluid">

        <div class='col-md-5'>
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
        <div class="col-md-1">
            <?php   echo $form->labelEx($model, 'nacionalidad'); ?>
            <?php  

                     $criteria = new CDbCriteria;
                     $criteria->condition = 'padre =1 and hijo in(1,2,3,4)';
                     $criteria->order = 'hijo ASC';
                    echo $form->dropDownList($model, 'nacionalidad', CHtml::listData(Maestro::model()->findAll($criteria), 'hijo', 'descripcion'), 
                        array(
                        'title' => 'Seleccione Nacionalidad',
                        'class' => 'span9',                        
                        'prompt' => 'Cargando...'
                    ));  ?>
        </div>
         <div class="col-md-4">
               <?php     echo $form->textFieldGroup($model,'cedula',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>200))));
            ?>
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
            <?php   echo $form->labelEx($model, 'estado_civil'); ?>
            <?php
                     $criteria = new CDbCriteria;
                     $criteria->condition = 'padre =1 and hijo in(1,2,3,4)';
                     $criteria->order = 'hijo ASC';
                    echo $form->dropDownList($model, 'estado_civil', CHtml::listData(Maestro::model()->findAll($criteria), 'hijo', 'descripcion'), 
                        array(
                        'title' => 'Seleccione Estado Civil',
                        'class' => 'span5',                        
                        'prompt' => 'Cargando...'
                    ));
                    ?>
        </div>
        <div class='col-md-5'>
             <?php
                    echo $form->labelEx($model, 'telefono');
                    //Inicio Campo de Número de Telefono
            ?>
            <?php
          
                    $this->widget(
                            'booster.widgets.TbSelect2', array(
                        'asDropDownList' => false,
                        'name' => CHtml::activeId($model, 'telefono'),
                        'attribute' => 'telefono',
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
                            'maximumSelectionSize' => 2,
                            'allowClear' => true,
                            'items' => 4,
                        )
                            )
                    );
            ?>
                <?php echo $form->error($model,'telefono'); ?>
        </div>
    </div>
</div>



<div class="row">
    <div class="row-fluid">
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
