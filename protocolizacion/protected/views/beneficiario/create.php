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
?>
<h1 class="text-center">Censo Socio Económico</h1>


<div>
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
            'icon' => 'glyphicon glyphicon-log-in',
            'size' => 'large',
            'id' => 'guardar',
            'context' => 'primary',
            'label' => 'Siguiente',
             'htmlOptions' => array(
                    'onclick' => 'document.location.href ="' . $this->createUrl('site/index') . '";'
                )
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