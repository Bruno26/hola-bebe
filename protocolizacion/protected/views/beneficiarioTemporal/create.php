<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'beneficiario-temporal-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>
<?php Yii::app()->clientScript->registerScript('BeneficiarioTemporal', "
          $('#guardar').click(function(){
               
                
                 if($('#BeneficiarioTemporal_nacionalidad').val() === 'SELECCIONE'){
                    bootbox.alert('Por favor seleccione Nacionalidad');
                     return false;
                 }

                 if($('#BeneficiarioTemporal_cedula').val() === 'SELECCIONE'){
                    bootbox.alert('Por favor Ingrese Cedula ');
                     return false;
                 }
                

                 if($('#Desarrollo_id_desarrollo').val() === ''){
                  bootbox.alert('Por favor seleccione Nombre del Desarrollo');
                     return false;
                 }

                 });
         
         
        
        ") ?>


<h1>Cargar Nuevo Adjudicado Temporal</h1>
<br><br>


  <?php 
        $this->widget(
                'booster.widgets.TbLabel', array(
            'context' => 'warning',
            'htmlOptions' => array('style' => 'padding:3px;text-aling:center; font-size:13px; span{color:red;}'),
            // 'success', 'warning', 'important', 'info' or 'inverse'
            'label' => 'Los campos marcados con * son requeridos',
                )
        ); ?>
        <br><br>
  <?php      
    /* ------------  Datos Beneficiario  --------- */



    $this->widget(
            'booster.widgets.TbPanel', array(
        'title' => 'Beneficiario',
        'context' => 'primary',
        'headerIcon' => 'user',
       /*  'headerHtmlOptions' => array('style' => 'background-color: #B2D4F1 !important;color: #000000 !important;'), */
        'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model), TRUE),
        #'content' => $this->renderPartial('_form', array('model'=>$model),TRUE),
            )
    );

    /*  ------------------------------------------ */

    /*  *******  Caracteristicas del Desarrollo   ****** */


    $this->widget(
        'booster.widgets.TbPanel', array(
        'title' => 'Caracteristicas del Desarrollo',
        'headerIcon' => 'user',
        'context' => 'primary',
        'headerIcon' => 'home',
        'content' => $this->renderPartial('_desarrollo', array(
            'form' => $form, 'model' => $model,
            'estado' => $estado,'municipio' => $municipio,
            'parroquia'=>$parroquia,'desarrollo'=>$desarrollo
            ), TRUE),
        )
    );

    /*  *********************************************** */


    /*  +++++++++++++  Grupo Familiar    +++++++++ */


        
    /*  ++++++++++++++++++++++++++++++++++++++++++ */

    ?>
</div>

<br>

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
            'label' => $model->isNewRecord ? 'Guardar' : 'Save',
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

<?php  $this->endWidget(); ?>