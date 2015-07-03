 <?php
 $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'carga-masiva-form',
	'enableAjaxValidation'=>false,
    //'enableAjaxValidation' =>false,
       'enableClientValidation'=>true,
        'clientOptions' => array(
        'validateOnSubmit' => true,
        ),
     'type'=>'horizontal',
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
));

 ?>
	 <div class="alert alert-info"><i class="icon-info-sign"></i> Para realizar la carga masiva de adjudicados adjunte el archivo .csv que desea importar dando clic en el boton "Examinar". Una vez seleccionado el archivo de clic en el boton "Subir archivo"; el sistema evaluará que el archivo cumpla con todos los parametros requeridos y procedera a guardar en el sistema.</div>

	 <p class="help-block"><span class="required">*</span>Campos de llenado obligatorio.</p></br>
	 <?php
	 $this->widget('booster.widgets.TbAlert', array(
  //  'block' => true, // display a larger alert block?
    'fade' => true, // use transitions?
    'closeText' => '×', // close link text - if set to false, no close link is displayed
    'alerts' => array(// configurations per alert type
    'error' => array('block' => true, 'fade' => true, 'closeText' => '×'), // success, info, warning, error or danger
    ),
));

	 ?>
         <?php echo $form->errorSummary($model); ?>
         <fieldset>
         <legend>Buscar archivo</legend>
         <div class='row'>
            <div class='span4'>
               <?php echo CHtml::label('<b>Seleccione archivo csv</b> <span class="required"> *</span>','');?>
               <?php
                echo $form->fileField($model,'nombre_archivo');
		echo $form->error($model, 'nombre_archivo');

               ?>
            </div>
         </div>
         </fieldset>
         <br /><br />

				<p align='center'> <a title="Descargar" href='doc/carga_masiva.csv'>
						<b>El archivo a subir debe de ajustarse al siguiente formato .csv </b>
          </a> </p>

         <div class="form-actions">
		<?php
		$this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
		//	'type'=>'success',
			'label'=>'Subir archivo',
		)); ?>


		<?php
		    $this->widget('booster.widgets.TbButton',array(
		   //'type'=>'primary',
		   'label'=>'Regresar',
		   'buttonType' =>'link',
		   'url'=> CHtml::normalizeUrl(array('admin')),
		));
		?>

	</div>




<?php $this->endWidget(); ?>
