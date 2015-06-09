
<div class="row">
 <div class="row-fluid">
        <div class='col-md-5'>
            <?php
           echo $form->textFieldGroup($desarrollo,'nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-5'>
            <?php
            echo $form->textFieldGroup($desarrollo,'zona',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
 </div>

 <div class="row-fluid">
        <div class='col-md-5'>
            <?php
           echo $form->textFieldGroup($model,'estado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-5'>
            <?php
            echo $form->textFieldGroup($model,'municipio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
 </div>


 <div class="row-fluid">
        <div class='col-md-5'>
            <?php
           echo $form->textFieldGroup($desarrollo,'parroquia_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-5'>
            <?php
            echo $form->textFieldGroup($desarrollo,'urban_barrio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
 </div>


 <div class="row-fluid">
        <div class='col-md-5'>
            <?php
           echo $form->textFieldGroup($desarrollo,'av_call_esq_carr',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-5'>
            <?php
            echo $form->textFieldGroup($model,'nomb_edif',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
 </div>


  <div class="row-fluid">
        <div class='col-md-5'>
            <?php
           echo $form->textFieldGroup($model,'piso',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-5'>
            <?php
            echo $form->textFieldGroup($model,'numero',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
 </div>

 <div class="row-fluid">
        <div class='col-md-5'>
            <?php
           echo $form->textFieldGroup($model,'area_vivienda',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-5'>
            <?php
            echo $form->textFieldGroup($desarrollo,'lote_terreno_mt2',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
 </div>


 <div class="row-fluid">
        <div class='col-md-5'>
            <?php
           echo $form->textFieldGroup($model,'tipo_vivienda',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-5'>

        	<?php echo $form->textAreaGroup($model,'observacion',array('wrapperHtmlOptions' => array('class' => 'col-sm-5'),'widgetOptions' => array('htmlOptions' => array('rows' => 5),)
			) ); ?>
            
        </div>
 </div>


</div>