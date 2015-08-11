<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'beneficiario-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
        )));

if (isset($error) && !empty($error)) {
    $user = Yii::app()->getComponent('user');
    switch ($error) {
        case 1:
            $tipo = 'warning';
            $sms = "<strong>Disculpe.Esta persona no se encuentra Adjudicada a una vivienda.</strong> ";
            break;
        case 2:
            $tipo = 'info';
            $sms = "<strong>Esta persona ya se encuentra registrada.</strong> ";
            break;
    }
    $user->setFlash(
            $tipo, $sms
    );
    $this->widget('booster.widgets.TbAlert', array(
        'userComponentId' => 'user',
        'alerts' => array(// configurations per alert type
            $tipo => array('closeText' => false),
        ),
    ));
}
?>
<?php
$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/js_jquery.numeric.js');
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');
$mascara = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/jquery.mask.min.js');

Yii::app()->clientScript->registerScript('Beneficiario', "
    $(document).ready(function(){
    cedula = '".$beneficiarioTmp->cedula."';
    nacionalidad = '".$beneficiarioTmp->nacionalidad."';
        buscarBeneficiarioTemporal(nacionalidad, cedula);

         $('#Beneficiario_rif').mask('A-BBBBBBBB-9', {translation: { 'A': {pattern: /[VEve]/}, 'B':{pattern: /[0-9]/}}, clearIfNotMatch: true});
         $('#Beneficiario_cedula').numeric();
         $('#Beneficiario_cedula').val(cedula).attr('readonly', true);
         $('#Beneficiario_nacionalidad').val(nacionalidad).attr('disabled', true);
         $('#Vivienda_construccion_mt2').numeric();
    }); 

    $('#guardar').click(function(){
 
         
         if($('#Beneficiario_cedula').val()==''){
                    bootbox.alert('Por favor indique cedula');
                    return false;
         }    
         
        if($('#UnidadFamiliar_condicion_unidad_familiar_id').val()==''){
            bootbox.alert('Por favor indique Condición de la Unidad Familiar');
            return false;
         }   
         
        if($('#Beneficiario_fecha_ultimo_censo').val()==''){
            bootbox.alert('Por favor indique Fecha del censo');
            return false;
         }   
        
        if($('#Vivienda_construccion_mt2').val()==''){
            bootbox.alert('Por favor indique Construcción metros cuadrados de la vivienda');
            return false;
         }   
         

    });


  ");
?>

<?php
$this->widget('booster.widgets.TbProgress', array(
    'striped' => true,
    'animated' => true,
    'stacked' => array(
        array(
            'context' => 'warning',
            'percent' => 30,
            'htmlOptions' => array(
                'data-toggle' => 'tooltip',
                'data' => 'Paso 1',
                'title' => 'Paso 1'
            )
        ),
    )
        )
);
?>
<h1 class="text-center">Censo Socioeconómico</h1>


<div>

    <?php
    $this->widget(
            'booster.widgets.TbLabel', array(
        'context' => 'warning',
        'htmlOptions' => array('style' => 'padding:3px;text-aling:center; font-size:13px; span{color:red;}'),
        // 'success', 'warning', 'important', 'info' or 'inverse'
        'label' => 'Los campos marcados con * son requeridos',
            )
    );
    ?>
    <br><br>


    <?php
    /* ------------  Datos Beneficiario  --------- */



    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Beneficiario',
        'context' => 'primary',
        'headerIcon' => 'user',
        'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
        'content' => $this->renderPartial('_form_censo', array('form' => $form, 'model' => $model, 'unidad_familiar' => $unidad_familiar), TRUE),
            #'content' => $this->renderPartial('_form', array('model'=>$model),TRUE),
            )
    );

    /*  ------------------------------------------ */

    /*     * ******  Caracteristicas del Desarrollo   ****** */


    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Caracteristicas del Desarrollo',
        'context' => 'primary',
        'headerIcon' => 'home',
        'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
        'content' => $this->renderPartial('_desarrollo', array('form' => $form, 'desarrollo' => $desarrollo, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'vivienda' => $vivienda), TRUE),
            )
    );

    /*     * ********************************************** */
    ?>
</div>

<br><br>

<div class="form-actions">


    <div class="well">
        <div class="pull-center" style="text-align: right;">
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'icon' => 'glyphicon glyphicon-floppy-saved',
                'size' => 'large',
                'id' => 'guardar',
                'context' => 'primary',
                'label' => $model->isNewRecord ? 'Guardar y Continuar' : 'Save',
            ));
            ?>

            <?php
            $this->widget('booster.widgets.TbButton', array(
                'context' => 'danger',
                'label' => 'Cancelar',
                'size' => 'large',
                'id' => 'CancelarForm',
                'icon' => 'ban-circle',
                'htmlOptions' => array(
                    'onclick' => 'document.location.href ="' . $this->createUrl('admin') . '";'
                )
            ));
            ?>
        </div>
    </div>

    <!-- *********** -->

</div>

<?php $this->endWidget(); ?>