<div class='row'>
    <div class='col-md-2'>
        <?php
        echo $form->textFieldGroup($beneficiario, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'value'=>$beneficiario->beneficiarioTemporal->fkNacionalidad->descripcion.' - '.$beneficiario->beneficiarioTemporal->cedula,'maxlength' => 8,'readonly'=>'readonly'

             
        ))));
        ?>
       
    </div>
    <div class='col-md-4'>
        <?php
        echo $form->textFieldGroup($beneficiario, 'nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'value'=>$beneficiario->beneficiarioTemporal->nombre_completo,'maxlength' => 8,'readonly'=>'readonly'
        ))));
        ?>

    </div>
</div>


