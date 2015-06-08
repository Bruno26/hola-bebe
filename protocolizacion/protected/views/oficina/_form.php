<?php #$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	#'id'=>'oficina-form',
	#'enableAjaxValidation'=>false,
#)); ?>

<p class="help-block">Los Campos con <span class="required">*</span> son obligatorios.</p>

<?php #echo $form->errorSummary($model); ?>


  <div class="row">
       <div class="row-fluid">
        <div class='col-md-4'>
        <?php
        $criteria = new CDbCriteria;
        $criteria->order = 'strdescripcion ASC';
        echo $form->dropDownListGroup($estado, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
            'widgetOptions' => array(
                'data' => CHtml::listData(Tblestado::model()->findAll($criteria), 'clvcodigo', 'strdescripcion'),
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarMunicipios'),
                        'update' => '#' . CHtml::activeId($municipio, 'clvcodigo'),
                    ),
                // 'title' => 'Por favor, Seleccione el estado de procedencia',
                // 'data-toggle' => 'tooltip', 'data-placement' => 'right',
                ),
            )
                )
        );
        ?>
        </div>
    <div class="col-md-4">
        <?php
        echo $form->dropDownListGroup($municipio, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',),
            'widgetOptions' => array(
                'htmlOptions' => array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarParroquias'),
                        'update' => '#' . CHtml::activeId($model, 'parroquia_id'),
                    ),
                    'empty' => 'SELECCIONE',
                // 'title' => 'Por favor, Seleccione su municipio de procedencia',
                //'data-toggle' => 'tooltip', 'data-placement' => 'right',
                ),
            )
                )
        );
        ?>
    </div>
       <div class="col-md-4">

        <?php
        echo $form->dropDownListGroup($model, 'parroquia_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar',),
            'widgetOptions' => array(
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',

                ),
            )
                )
        );
        ?>
    </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
         <div class='col-md-6'>
            <?php echo $form->textFieldGroup($model,'nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
        </div>
        <div class='col-md-6'>
            <?php echo $form->textFieldGroup($model,'persona_id_jefe',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        </div>
</div>
</div>
      <div class="row">
    <div class="row-fluid">
        <div class='col-md-12'>
           <?php # echo $form->textFieldGroup($model,'observaciones',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','height'=>50,'maxlength'=>200)))); ?>
            <?php
                echo $form->textAreaGroup(
                        $model, 'observaciones', array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-5',
                    ),
                    'widgetOptions' => array(
                        'htmlOptions' => array('rows' => 2, 'maxlength' => 200,
                        ),
                    )
                        )
                );
            ?>
        </div>
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

<?php #$this->endWidget(); ?>
