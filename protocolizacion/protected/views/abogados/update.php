<?php /*
$this->breadcrumbs=array(
	'Abogadoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Abogados','url'=>array('index')),
	array('label'=>'Create Abogados','url'=>array('create')),
	array('label'=>'View Abogados','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Abogados','url'=>array('admin')),
	);
	?>

	<h1>Update Abogados <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); */?>

<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'abogados-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>
<?php Yii::app()->clientScript->registerScript('abogados', "
         $('#guardar').click(function(){
                if($('#Abogados_inpreabogado').val()==''){
                   bootbox.alert('Por favor indique el Inpreabogado');
                    return false;
                }
                if($('#Abogados_tipo_abogado_id').val()=='SELECCIONE'){
                   bootbox.alert('Por favor indique el Tipo de Abogado');
                    return false;
                }
                if($('#Abogados_oficina_id').val()==''){
                   bootbox.alert('Por favor indique la oficina');
                    return false;
                }

                });

        ") ?>
<h1>Abogados</h1>

<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Caracteristica del Abogado',
            'context' => 'danger',
            // 'headerHtmlOptions' => array('style' => 'background:url(' . Yii::app()->request->baseUrl . '/img/fondo_barra.jpg);color:white;'),
            'headerIcon' => 'globe',
            'content' => $this->renderPartial('_form_update', array('form' => $form, 'model' => $model, 'consulta' => $consulta), TRUE),
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
		'onclick' => 'document.location.href ="' . $this->createUrl('desarrollo/admin') . '"'),

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
