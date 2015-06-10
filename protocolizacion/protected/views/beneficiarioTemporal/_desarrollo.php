
<?php
$baseUrl = Yii::app()->baseUrl;
$Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');
?>

<div class="row">
<div class="row-fluid">
   <div class='col-md-5'>
            <?php
            $criteria = new CDbCriteria;
            $criteria->order = 'strdescripcion ASC';
            echo $form->dropDownListGroup($estado, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
                'widgetOptions' => array(
                    'data' => CHtml::listData(Tblestado::model()->findAll($criteria), 'clvcodigo', 'strdescripcion'),
                    'htmlOptions' => array(
                        'empty' => 'SELECCIONE',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('ValidacionJs/BuscarMunicipios'),
                            'update' => '#' . CHtml::activeId($municipio, 'clvcodigo'),
                        ),
                    // 'title' => 'Por favor, Seleccione el estado de procedencia',
                    // 'data-toggle' => 'tooltip', 'data-placement' => 'right',
                    ),
                )
                    )
            );
            ?>
        </div>
        <div class="col-md-5">
            <?php
            echo $form->dropDownListGroup($municipio, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',),
                'widgetOptions' => array(
                    'htmlOptions' => array(
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('ValidacionJs/BuscarParroquias'),
                            'update' => '#' . CHtml::activeId($parroquia, 'clvcodigo'),
                        ),
                        'empty' => 'SELECCIONE',
                    // 'title' => 'Por favor, Seleccione su municipio de procedencia',
                    //'data-toggle' => 'tooltip', 'data-placement' => 'right',
                    ),
                )
                    )
            );
            ?>
        </div>
</div>
        <div class="row-fluid">
                <div class="col-md-5">

                    <?php
                    echo $form->dropDownListGroup($parroquia, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar',),
                        'widgetOptions' => array(
                            'htmlOptions' => array(
                                'empty' => 'SELECCIONE',
                            ),
                        )
                            )
                    );
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
</div>