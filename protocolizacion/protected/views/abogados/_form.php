<p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

<?php #echo $form->errorSummary($model); ?>

<div class="row">
    <div class="row-fluid">
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model,'persona_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model,'inpreabogado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class="col-md-6">
            <?php #echo $form->textFieldGroup($model, 'tipo_abogado_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>
            <?php echo $form->dropDownListGroup($model, 'tipo_abogado_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
                'widgetOptions' => array(
                    #'data' => CHtml::listData(Oficina::model()->findAll(), 'id_oficina', 'nombre'),
                    'htmlOptions' => array('empty' => 'SELECCIONE'),
                )
                    )
            );
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $form->dropDownListGroup($model, 'oficina_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
                'widgetOptions' => array(
                    'data' => CHtml::listData(Oficina::model()->findAll(), 'id_oficina', 'nombre'),
                    'htmlOptions' => array('empty' => 'SELECCIONE'),
                )
                    )
            );
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="row-fluid">
        <div class="col-md-12">
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
