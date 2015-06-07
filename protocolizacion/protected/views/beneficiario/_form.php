<!--<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'beneficiario-form',
	'enableAjaxValidation'=>false,
));  ?>-->

<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

<?php #echo $form->errorSummary($model); ?>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'cedula',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'primer_nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'primer_apellido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'nacionalidad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'persona_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'rif',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'condicion_trabajo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'fuente_ingreso_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'relacion_trabajo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'sector_trabajo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'nombre_empresa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'direccion_empresa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'telefono_trabajo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>7))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'gen_cargo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'ingreso_mensual',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'ingreso_declarado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'ingreso_promedio_faov',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->checkBoxGroup($model,'cotiza_faov');
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'direccion_anterior',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'geo_estado_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'geo_municipio_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'geo_parroquia_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'urban_barrio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'av_call_esq_carr',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'zona',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));  
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            #echo $form->textFieldGroup($model,'fecha_ultimo_censo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            echo $form->datePickerGroup($model, 'fecha_ultimo_censo', array('widgetOptions' =>
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
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->checkBoxGroup($model,'protocolizado'); 
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            #echo $form->textFieldGroup($model,'fecha_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            echo $form->datePickerGroup($model, 'fecha_creacion', array('widgetOptions' =>
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
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            #echo $form->textFieldGroup($model,'fecha_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            echo $form->datePickerGroup($model, 'fecha_actualizacion', array('widgetOptions' =>
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
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'usuario_id_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'usuario_id_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); 
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'estatus_beneficiario_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'estatus_beneficiario_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            ?>
        </div>
        <div class='col-md-6'>
            <?php
            echo $form->textFieldGroup($model,'codigo_trab',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>4))));
            ?>
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

        <?php #echo $form->textFieldGroup($model,'persona_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'rif',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	<?php #echo $form->textFieldGroup($model,'condicion_trabajo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'fuente_ingreso_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'relacion_trabajo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'sector_trabajo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'nombre_empresa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

	<?php #echo $form->textFieldGroup($model,'direccion_empresa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

	<?php #echo $form->textFieldGroup($model,'telefono_trabajo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>7)))); ?>

	<?php #echo $form->textFieldGroup($model,'gen_cargo_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'ingreso_mensual',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'ingreso_declarado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        
        <?php #echo $form->textFieldGroup($model,'ingreso_promedio_faov',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->checkBoxGroup($model,'cotiza_faov'); ?>

	<?php #echo $form->textFieldGroup($model,'direccion_anterior',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

	<?php #echo $form->textFieldGroup($model,'geo_estado_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'geo_municipio_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'geo_parroquia_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'urban_barrio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

	<?php #echo $form->textFieldGroup($model,'av_call_esq_carr',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

	<?php #echo $form->textFieldGroup($model,'zona',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

	<?php #echo $form->textFieldGroup($model,'fecha_ultimo_censo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->checkBoxGroup($model,'protocolizado'); ?>

	<?php #echo $form->textFieldGroup($model,'fecha_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        
        <?php #echo $form->textFieldGroup($model,'fecha_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'usuario_id_creacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'usuario_id_actualizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'estatus_beneficiario_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php #echo $form->textFieldGroup($model,'codigo_trab',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>4)))); ?>