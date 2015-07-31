<?php


 /* ---------------------------------------------- */

$baseUrl = Yii::app()->baseUrl;
$file = fopen(Yii::app()->request->hostInfo.'/'.$baseUrl ."/documentos/doc_unifamiliar.txt", "r");

$texto = " ";
while(!feof($file)) {

$texto .= fgets($file);

}
fclose($file);

/*  ----------------------------------------------- */
?>

<h1 class="text-center">Gestión de Documentos UniFamiliares</h1> <br>
<?php

$this->widget('ext.redactor.ERedactorWidget',array(
    'model'=>$model,
    'name'=>'Documento Unifamiliar',
    'value'=>$texto,
    'options'=>array(
        'lang'=>'es',

        'airButtons'=>array(
                            'formatting', '|', 'bold', 'italic', 'deleted', '|',
                            'fontcolor','backcolor','|',
                            'unorderedlist', 'orderedlist', 'outdent', 'indent', '|',
                            'image', 'video', 'link', '|',  'horizontalrule','html',
                        ),

    ),
));  

?>

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
                    'onclick' => 'document.location.href ="' . $this->createUrl('vswUnifamiliar/admin') . '";'
                )
            ));
        ?>
    </div>
</div>


    <!-- *********** -->

   
</div>
