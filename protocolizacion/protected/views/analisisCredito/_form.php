<?php $Validacion = Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/js_jquery.numeric.js'); ?>
<?php Yii::app()->clientScript->registerScript('desarrolloVal', "
         $(document).ready(function(){
            $('#AnalisisCredito_plazo_credito_ano').numeric(); 
            $('#AnalisisCredito_monto_inicial').numeric(); 
            $('#AnalisisCredito_monto_inicial').val('0'); 
        });
        $('#AnalisisCredito_plazo_credito_ano').keypress(function(event) {
            return false;
        });
        $('#CalcCalculo').click(function() {
            if($('#AnalisisCredito_monto_inicial').val() ==''){
                bootbox.alert('Indique un monto inicial');
                return false;
            }
        });
        
"); ?>

<?php echo $form->hiddenField($model, 'vivienda_id'); ?>
<div class='row'>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'monto_inicial', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'sub_directo_habitacional', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readonly' => 'readonly')))); ?>
    </div>
    <div class='col-md-4'>
        <?php echo CHtml::activeLabel($model, 'sub_vivienda_perdida'); ?><br>
        <?php
        $this->widget('booster.widgets.TbSwitch', array('name' => 'sub_vivienda_perdida',
            'options' => array(
                'size' => 'large',
                'onText' => 'SI',
                'offText' => 'NO',
            ),
            'htmlOptions' => array(
        )));
        ?> 
    </div>
</div>
<div class='row'>
    <div class='col-md-6' id='ingreso_declarado'> <?php echo $TableSueldo ?></div>
    <div class='col-md-6' id='ingreso_faov'><?php echo $TableSueldoFaov ?></div>
</div>
<div class='row' style="margin-bottom: 1%"></div>
<div class='row'>
    <div class='col-md-4'>
        <?php
        $criteria = new CDbCriteria;
        $criteria->order = 'id_tasa_interes ASC';
        echo $form->dropDownListGroup($model, 'tasa_interes_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-4'),
            'widgetOptions' => array(
                'data' => CHtml::listData(TasaInteres::model()->findAll($criteria), 'id_tasa_interes', 'tasa_interes'),
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                    'disabled' => 'true'
                ),
            )
                )
        );
        ?>
    </div>
    <div class='col-md-4'>
        <?php echo $form->textFieldGroup($model, 'ultimo_sueldo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>
    </div>
    <div class='col-md-4'>
        <label class="control-label required" for="AnalisisCredito_plazo_credito_ano">Plazo Credito Ano <span class="required"><i>*</i></span></label>
        <input type="number" step="any" step="5"  max="35" min="2" class="span5 form-control" placeholder="Plazo Credito Ano" name="AnalisisCredito[plazo_credito_ano]" id="AnalisisCredito_plazo_credito_ano">
    </div>
</div>
<div class='row'>
    <div class='col-md-4'>
        <?php
        echo $form->datePickerGroup($model, 'fecha_protocolizacion', array('widgetOptions' =>
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
</div>
<div class="row text-center">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'context' => 'success',
        'label' => 'Generar Calculo',
        //'size' => 'large',
        'id' => 'CalcCalculo',
        'icon' => 'search',
        'htmlOptions' => array(
//                'onclick' => 'document.location.href ="' . $this->createUrl('admin') . '";'
        )
    ));
    ?>

</div>


