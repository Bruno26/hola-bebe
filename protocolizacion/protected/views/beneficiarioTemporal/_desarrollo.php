<?php
 $baseUrl = Yii::app()->baseUrl;
 $Validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validacion.js');



Yii::app()->clientScript->registerScript('desarollo', "

      $(document).ready(function(){
                $('#Desarrollo_zona').attr('readonly', true);
                $('#Desarrollo_urban_barrio').attr('readonly', true);
                $('#Desarrollo_av_call_esq_carr').attr('readonly', true);
                $('#BeneficiarioTemporal_nomb_edif').attr('readonly', true);

      });  


   /*  +++++++++++++++++++++++++++++++++++++++ */



   /*  ++++++++++++++++++++++++++++++++++++++++ */




   /* -----------  Validacion de desarrollo habitacional   ----------------- */
         $('#Desarrollo_id_desarrollo').focusout(function(){

                                var id_desarrollo = $('#Desarrollo_id_desarrollo').val();
                              
                                $.ajax({
                                    url: '" . CController::createUrl('ValidacionJs/BuscarDesarrolloBeneficiario') . "',
                                    async: true,
                                    type: 'POST',
                                    data: 'id_desarrollo='+id_desarrollo,
                                    dataType:'json',
                                    success: function(datos){
                                         
                                          if(datos != 'vacio'){
                                            /*  ++ datos del desarollo habitacional  ++  */
                                             
                                                 var nomb_desar = datos['nombre'];
                                                 var sector = datos['sector'];
                                                 var urban_barrio = datos['urban_barrio'];
                                                 var av_calle = datos['av_calle'];
                                                 var nomb_edif = datos['nomb_edif'];


                                                 
                                                 $('#Desarrollo_zona').val(sector); 
                                                 $('#Desarrollo_urban_barrio').val(urban_barrio); 
                                                 $('#Desarrollo_av_call_esq_carr').val(av_calle); 
                                                 $('#BeneficiarioTemporal_nomb_edif').val(nomb_edif); 




                                            /*   ++  ++  ++  ++  ++  ++  ++  ++  ++ ++ ++  + */
                                          }
 

                                    }
                                });

         });

  /*  --------------------------------------------------------------------------- */
");

?>

<div class="row">
<div class="row-fluid">
   <div class='col-md-4'>
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
                    ),
                )
                    )
            );
            ?>
        </div>
        <div class="col-md-4">
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
       
                <div class="col-md-4">

                    <?php
                    echo $form->dropDownListGroup($parroquia, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar',),
                        'widgetOptions' => array(
                            'htmlOptions' => array(
                                'empty' => 'SELECCIONE',
                                        'ajax'   => array(
                                        'type'   => 'POST',
                                        'url'    => CController::createUrl('ValidacionJs/BuscarDesarrollo'),
                                        'update' => '#' . CHtml::activeId($desarrollo, 'id_desarrollo'),
                                        ),

                            ),
                        )
                            )
                    );
                    ?>
                </div>
</div>
<div class="row-fluid">
                <div class='col-md-4'>
                     <?php
                            echo $form->dropDownListGroup($desarrollo, 'id_desarrollo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar',),
                                'widgetOptions' => array(
                                                            'htmlOptions' => array(
                                                                                    'ajax' => array(
                                                                                                        'type'   => 'POST',
                                                                                                        'url'    => CController::createUrl('ValidacionJs/BuscarUnidadHabitacional'),
                                                                                                        'update' => '#' . CHtml::activeId($model, 'unidad_habitacional_id'),
                                                                                                    ),
                                                                                    'empty' => 'SELECCIONE',
                                                                                        
                                                                                   ),
                                                            )
                                                        )
                            );
                     ?>
                          
                </div>

                <div class='col-md-4'>
                    <?php
                      echo $form->textFieldGroup($desarrollo,'urban_barrio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
                    ?>
                </div>
               
                <div class='col-md-4'>
                    <?php
                       echo $form->textFieldGroup($desarrollo,'zona',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
                    ?>
                </div>
</div>

 
 <div class="row-fluid">
        <div class='col-md-4'>
            <?php
                  echo $form->textFieldGroup($desarrollo,'av_call_esq_carr',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200))));
            ?>
        </div>
        <div class='col-md-4'>
           <?php
            echo $form->dropDownListGroup($model, 'unidad_habitacional_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
                'widgetOptions' => array(
                                            'htmlOptions' => array(
                                                                    'ajax' => array(
                                                                                    'type' => 'POST',
                                                                                    'url' => CController::createUrl('ValidacionJs/BuscarPisoVivienda'),
                                                                                    'update' => '#' . CHtml::activeId($model, 'piso')
                                                                                   ),
                                                                  )
                                        )
            ));
        ?>
        </div>

        <div class='col-md-4'>

             <?php
            echo $form->dropDownListGroup($model, 'piso', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
                'widgetOptions' => array(
                    //   'data' => Maestro::FindMaestrosByPadreSelect(694, 'descripcion ASC'),
                    'htmlOptions' => array( 'ajax' => array(
                                                        'type' => 'POST',
                                                        'url' => CController::createUrl('ValidacionJs/BuscarVivienda'),
                                                        'update' => '#' . CHtml::activeId($model, 'vivienda_nro')
                                                        ),
                                            'empty' => 'SELECCIONE',
                    ),
                )
                    )
            );
        ?>
            
        </div>
</div>

 <div class="row-fluid">       
        <div class='col-md-4'>

        	  <?php
            echo $form->dropDownListGroup($model, 'vivienda_nro', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
                'widgetOptions' => array(
                    //   'data' => Maestro::FindMaestrosByPadreSelect(694, 'descripcion ASC'),
                    'htmlOptions' => array('empty' => 'SELECCIONE',
                    ),
                )
                    )
            );
            ?>
            
        </div>

        <div class='col-md-4'>

             <?php
                    echo $form->dropDownListGroup($model, 'tipo_vivienda', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
                        'widgetOptions' => array(
                            'data' => Maestro::FindMaestrosByPadreSelect(92, 'descripcion ASC'),
                            'htmlOptions' => array('empty' => 'SELECCIONE'),
                        )
                    )
            );
            ?>
            
        </div>

</div>    

</div>
</div>
</div>