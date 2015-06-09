<?php
//echo '<pre>';var_dump($model);die();


$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'vsw-solicitud-recibido-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class='row'>
    <div class="col-md-6"> 
        <?php echo $form->textFieldGroup($model, 'id_desarrollo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
    <div class="col-md-6"> 
        <?php echo $form->textFieldGroup($model, 'nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
</div>

<div class='row'>
    <div class="col-md-4"> 
        <?php echo $form->textFieldGroup($estado, 'strdescripcion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true, 'value' => $model->fkParroquia->clvmunicipio0->clvestado0->strdescripcion)))); ?>
    </div>
    <div class="col-md-4"> 
        <?php echo $form->textFieldGroup($municipio, 'strdescripcion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true, 'value' => $model->fkParroquia->clvmunicipio0->strdescripcion)))); ?>
    </div>
    <div class="col-md-4"> 
        <?php echo $form->textFieldGroup($model, 'parroquia_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true, 'value' => $model->fkParroquia->strdescripcion)))); ?>
    </div>
</div>

<div class='row'>
    <div class="col-md-4"> 
        <?php echo $form->textFieldGroup($model, 'urban_barrio', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
    <div class="col-md-4"> 
        <?php echo $form->textFieldGroup($model, 'av_call_esq_carr', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
    <div class="col-md-4"> 
        <?php echo $form->textFieldGroup($model, 'zona', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
</div>

<div class='row'>
    <div class="col-md-3"> 
        <?php echo $form->textFieldGroup($model, 'lindero_norte', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
    <div class="col-md-3"> 
        <?php echo $form->textFieldGroup($model, 'lindero_sur', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
    <div class="col-md-3"> 
        <?php echo $form->textFieldGroup($model, 'lindero_este', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
    <div class="col-md-3"> 
        <?php echo $form->textFieldGroup($model, 'lindero_oeste', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
</div>
    
<div class='row'>
    <div class="col-md-6"> 
        <?php echo $form->textFieldGroup($model, 'coordenadas', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
    <div class="col-md-6"> 
        <?php echo $form->textFieldGroup($model, 'lote_terreno_mt2', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
</div>

<div class='row'>
    <div class="col-md-4"> 
        <?php echo $form->textFieldGroup($model, 'programa_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true, 'value' => $model->programa->nombre_programa)))); ?>
    </div>
    <div class="col-md-4"> 
        <?php echo $form->textFieldGroup($model, 'fuente_financiamiento_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true, 'value' => $model->fuenteFinanciamiento->nombre_fuente_financiamiento)))); ?>
    </div>
    <div class="col-md-4"> 
        <?php echo $form->textFieldGroup($model, 'ente_ejecutor_id', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true, 'value' => $model->enteEjecutor->nombre_ente_ejecutor)))); ?>
    </div>
</div>

<div class='row'>
    <div class="col-md-6"> 
        <?php echo CHtml::activeLabel($model, 'titularidad_del_terreno'); ?><br>
        <?php
        $this->widget('booster.widgets.TbSwitch', array(
            'name' => 'titularidad_del_terreno',
            'options' => array(
                'size' => 'large',
                'onText' => 'SI',
                'offText' => 'NO',
            ),
            'htmlOptions' => array(
                'class' => 'titularidad',
                'onChange' => 'Terreno()',
                'readOnly' => true,
            )
                )
        );
        ?>
    </div>
    <?php if (!empty($participacion->titularidad_del_terreno)): ?>
    <div class="col-md-6"> 
        <?php echo $form->textFieldGroup($model, 'fecha_transferencia', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'readOnly' => true)))); ?>
    </div>
    <?php endif; ?>
</div>


<?php $this->endWidget(); ?>