<?php
$this->breadcrumbs=array(
	'Viviendas'=>array('index'),
	$model->id_vivienda=>array('view','id'=>$model->id_vivienda),
	'Update',
);

$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'desarrollo-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>

	<div class="row">
	    <div class="col-md-12">
	        <?php
	        $this->widget(
	                'booster.widgets.TbPanel', array(
	            'title' => 'Actualización de la vivienda N° '.$model->id_vivienda,
	            'context' => 'danger',
	            // 'headerHtmlOptions' => array('style' => 'background:url(' . Yii::app()->request->baseUrl . '/img/fondo_barra.jpg);color:white;'),
	            'headerIcon' => 'globe',
	            'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'desarrollo' => $desarrollo), TRUE),
	                )
	        );
	        ?>
	    </div>
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
			'onclick' => 'document.location.href ="' . $this->createUrl('vivienda/admin') . '"'),

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

	<?php //echo $this->renderPartial('_form', array('model'=>$model));  ?>

	<?php $this->endWidget(); ?>
