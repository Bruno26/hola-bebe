<?php
$this->breadcrumbs=array(
	'Actualizar la Unidad Habitacional N°'=>array('index'),
	$model->id_unidad_habitacional=>array('view','id'=>$model->id_unidad_habitacional),
	'Update',
);  ?>

    <?php
    if (!empty($model->desarrollo_id)) {
        $id_desarrollo = Desarrollo::model()->findByPk($model->desarrollo_id); // consulta en la tabla ciudad el id_ciudad y id_estado 
        $id_parroquia = $id_desarrollo->parroquia_id;
        $id_municipio = $id_desarrollo->fkParroquia->clvmunicipio0->clvcodigo;
        $id_estado = $id_desarrollo->fkParroquia->clvmunicipio0->clvestado0->clvcodigo; 

//    var_dump($model->desarrollo_id); die();
    } ?>

<?php
Yii::app()->clientScript->registerScript('unidadHabitacional', "
         $('#guardarUnidad').click(function(){

                if($('#Tblestado_clvcodigo').val()==''){
                    bootbox.alert('Por favor seleccione Estado');
                    return false;
                }
                if($('#Tblmunicipio_clvcodigo').val()==''){
                   bootbox.alert('Por favor seleccione Municipio');
                    return false;
                }
                if($('#Tblparroquia_clvcodigo').val()==''){
                    bootbox.alert('Por favor seleccione Parroquia');
                    return false;
                }
                if($('#UnidadHabitacional_desarrollo_id').val()==''){
                    bootbox.alert('Por favor seleccione el Desarrollo');
                    return false;
                }

                if($('#UnidadHabitacional_nombre').val()==''){
                    bootbox.alert('Por favor indique nombre de la unidad habitacional');
                    return false;
                }
                if($('#UnidadHabitacional_gen_tipo_inmueble_id').val()==''){
                    bootbox.alert('Por favor indique tipo de inmueble');
                    return false;
                }
        });

      $(document).ready(function(){
       $('#Tblestado_clvcodigo').val(" . $id_estado . ");
 
         $.get('" . CController::createUrl('ValidacionJs/BuscarMunicipios') . "', {clvcodigo: " . $id_estado . " }, function(data){
                $('#Tblmunicipio_clvcodigo').html(data);
                $('#Tblmunicipio_clvcodigo').val(" . $id_municipio . ");
                
            });
            $.get('" . CController::createUrl('ValidacionJs/BuscarParroquias') . "', {municipio: " . $id_municipio . "}, function(data){
                $('#Tblparroquia_clvcodigo').html(data);
                $('#Tblparroquia_clvcodigo').val(" .$id_parroquia. ");
            });
           
            $.get('" . CController::createUrl('ValidacionJs/BuscarDesarrollo') . "', {desarrollo: " . $id_parroquia . "}, function(data){
                $('#UnidadHabitacional_desarrollo_id').html(data);
                $('#UnidadHabitacional_desarrollo_id').val(" . $model->desarrollo_id. ");
            });
        });



        ");

$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'unidad-habitacional-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));


	$this->menu=array(
	array('label'=>'List UnidadHabitacional','url'=>array('index')),
	array('label'=>'Create UnidadHabitacional','url'=>array('create')),
	array('label'=>'View UnidadHabitacional','url'=>array('view','id'=>$model->id_unidad_habitacional)),
	array('label'=>'Manage UnidadHabitacional','url'=>array('admin')),
	);
	?>

	<h1>Actualizar la Unidad Habitacional N° <?php echo $model->id_unidad_habitacional; ?></h1>

	<div>
	    <?php
	    $this->widget(
	            'booster.widgets.TbPanel', array(
	        'title' => 'Unidad Habitacional',
	        'context' => 'danger',
	        'headerIcon' => 'user',
	//        'headerHtmlOptions' => array('style' => 'background-color: #B2D4F1 !important;color: #000000 !important;'),
	        'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia), TRUE),
	            )
	    );
	    ?>
	</div>


	<div class="well">
	    <div class="pull-center" style="text-align: right;">
				<?php
				$this->widget('booster.widgets.TbButton', array(
						'buttonType' => 'submit',
						'icon' => 'glyphicon glyphicon glyphicon-step-backward',
						'size' => 'large',
						'id' => 'cancelar',
						'context' => 'danger',
						'label' => 'Cancelar',
						//'url' => $this->createURL('/desarrollo/admin'),
						'htmlOptions' => array(
			'onclick' => 'document.location.href ="' . $this->createUrl('unidadHabitacional/admin') . '"'),

				));
				?>
				<?php
	        $this->widget('booster.widgets.TbButton', array(
	            'buttonType' => 'submit',
	            'icon' => 'glyphicon glyphicon-floppy-saved',
	            'size' => 'large',
	            'id' => 'guardar',
	            'context' => 'primary',
	            'label' => $model->isNewRecord ? 'Guardar' : 'Actualizar',
	        ));
	        ?>
	    </div>
	</div>


	<?php $this->endWidget(); ?>
