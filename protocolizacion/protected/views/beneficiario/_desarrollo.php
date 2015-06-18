
<?php
$baseUrl = Yii::app()->baseUrl;
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');
?>

<div class="row">

    <div class='col-md-4'>

        <?php
        echo $form->textFieldGroup($model, 'estado', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200,'readonly' => true))));
        ?>
    </div>
    <div class="col-md-4">
        <?php
        echo $form->textFieldGroup($model, 'municipio', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200,'readonly' => true))));
        ?>
    </div>
    <div class="col-md-4">
        <?php
        echo $form->textFieldGroup($model, 'parroquia', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200,'readonly' => true))));
        ?>
    </div>
</div>
<div class="row">

    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($model, 'nombre_desarrollo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200,'readonly' => true))));
        ?>
    </div>
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($desarrollo, 'urban_barrio', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($desarrollo, 'av_call_esq_carr', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
</div>


<div class="row">
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($desarrollo, 'zona', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($desarrollo, 'lote_terreno_mt2', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($model, 'nomb_edif', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
</div>


<div class="row">
    <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($model, 'piso', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>
    <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($model, 'numero_vivienda', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));
        ?>
    </div>


    <div class='col-md-3'>
        <?php

        echo $form->textFieldGroup($model, 'tipo_vivienda', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly' => true))));


        ?>
    </div>
    <div class='col-md-3'>
        <?php
        echo $form->textFieldGroup($vivienda, 'construccion_mt2', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 4))));
        
        ?>
    </div>
</div>


<div class="row">

    <div class='col-md-12'>

        <?php
        echo $form->textAreaGroup($model, 'observacion', array('wrapperHtmlOptions' => array('class' => 'col-sm-5'), 'widgetOptions' => array('htmlOptions' => array('maxlength' => 200),)
        ));
        ?>

    </div>
</div>