<?php
$this->breadcrumbs=array(
	'Beneficiarios'=>array('index'),
	'Create',
);
$this->menu=array(
array('label'=>'List Beneficiario','url'=>array('index')),
array('label'=>'Manage Beneficiario','url'=>array('admin')),
);
?>


<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'unidad-habitacional-form',
    'enableAjaxValidation' => false,
        ));




    $this->widget('booster.widgets.TbProgress',
        array(
            'striped' => true,
            'animated' => true,            
            'stacked' => array(
                array(
                    'context' => 'warning',
                    'percent' => 30,             
                    
                    'htmlOptions' => array(
                        'data-toggle' => 'tooltip',
                        'data'=>'Paso 1',
                        'title' => 'Paso 1'
                    )
                ), /* 
                 array('context' => 'info',
                    'percent' => 35,               
                    'htmlOptions' => array(
                        'data-toggle' => 'tooltip',
                        'title' => 'Paso 2'
                    )), 

                   array('context' => 'danger', 'percent' => 35,'animated' => true,'htmlOptions' => array(
                        'data-toggle' => 'tooltip',
                        'title' => 'Paso 3'
                    )),  */
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
                            'context' => 'primary',
                            'headerIcon' => 'home',
                           /*  'headerHtmlOptions' => array('style' => 'background-color: #B2D4F1 !important;color: #000000 !important;'), */
                            'content' => $this->renderPartial('_desarrollo', array('form' => $form, 'desarrollo' => $desarrollo,'model' => $model,'estado' => $estado,'municipio' => $municipio,'parroquia'=>$parroquia), TRUE),
                            #'content' => $this->renderPartial('_form', array('model'=>$model),TRUE),
                                )
                        );

    /*  *********************************************** */


    

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
                    'onclick' => 'document.location.href ="' . $this->createUrl('site/index') . '";'
                )
            ));
        ?>
    </div>
</div>


    <!-- *********** -->

   
</div>

<?php  $this->endWidget(); ?>
