
<?php
Yii::app()->clientScript->registerScript('desarrollo', "
  $(document).ready(function(){
    $.get('" . CController::createUrl('ValidacionJs/CargarPrograma') . "', {fuente_financiamiento_id: " . $desarrollo->fuente_financiamiento_id . " }, function(data){
    $('#Desarrollo_programa_id').html(data);
    $('#Desarrollo_programa_id').val(" . $desarrollo->programa_id . ");
    });
  });
");
?>



<?php echo $form->hiddenField($model, 'unidad_familiar_id'); ?>

<div class='row'>
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($beneficiario, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'value' => $beneficiario->beneficiarioTemporal->fkNacionalidad->descripcion . ' - ' . $beneficiario->beneficiarioTemporal->cedula, 'maxlength' => 8, 'readonly' => 'readonly'
        ))));
        ?>
    </div>
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($beneficiario, 'nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'value' => $beneficiario->beneficiarioTemporal->nombre_completo, 'maxlength' => 8, 'readonly' => 'readonly'
        ))));
        ?>
    </div>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'costo_vivienda', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'value' => $beneficiario->beneficiarioTemporal->vivienda->precio_vivienda, 'readonly' => 'readonly')))); ?>
    </div>
</div>
<div class='row'>
    <div class='col-md-6'>
        <?php
        echo $form->dropDownListGroup($desarrollo, 'fuente_financiamiento_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
        'widgetOptions' => array(
        'data' => CHtml::listData(FuenteFinanciamiento::model()->findAll(), 'id_fuente_financiamiento', 'nombre_fuente_financiamiento'),

                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                    //'onchange'=>'calcularSueldo($(this).val())',
                    'ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('ValidacionJs/CargarPrograma'),
                            'update' => '#' . CHtml::activeId($desarrollo, 'programa_id'),
                        )),
            )
                )
        );
        ?>
    </div>
    <div class='col-md-6'>
        <?php
        echo $form->dropDownListGroup($desarrollo, 'programa_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => CHtml::listData(Programa::model()->findAll(), 'id_programa', 'nombre_programa'),
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
          )
        );
        ?>
    </div>
</div>