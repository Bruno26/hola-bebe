<?php /*
$this->breadcrumbs=array(
	'Oficinas'=>array('index'),
	$model->id_oficina=>array('view','id'=>$model->id_oficina),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Oficina','url'=>array('index')),
	array('label'=>'Create Oficina','url'=>array('create')),
	array('label'=>'View Oficina','url'=>array('view','id'=>$model->id_oficina)),
	array('label'=>'Manage Oficina','url'=>array('admin')),
	);
	?>

	<h1>Editar Oficina <?php echo $model->id_oficina; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); 
 */ ?>

<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'oficina-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>
<?php
    
if (!empty($model->parroquia_id)) {
    $id_parroquia = Tblparroquia::model()->findByPk($model->parroquia_id); // consulta en la tabla ciudad el id_ciudad y id_estado 
    $id_municipio = $id_parroquia->clvmunicipio0->clvcodigo;
    $id_estado = $id_parroquia->clvmunicipio0->clvestado0->clvcodigo;

}

?>
<?php Yii::app()->clientScript->registerScript('oficina', "
         $('#guardar').click(function(){
                if($('#Oficina_nombre').val()==''){
                   bootbox.alert('Por favor indique el nombre de la Oficina');
                    return false;
                }

                if($('#Tblestado_clvcodigo').val()==''){
                 alert('Por favor seleccione Estado');
                    return false;
                }
                if($('#Tblmunicipio_clvcodigo').val()==''){
                   alert('Por favor seleccione Municipio');
                    return false;
                }
                if($('#Oficina_parroquia_id').val()==''){
                   alert('Por favor seleccione Parroquia');
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
                $('#Oficina_parroquia_id').html(data);
                $('#Oficina_parroquia_id').val(" . $model->parroquia_id. ");
            });
        });


        ") ?>

<?php
if (isset($sms) && !empty($sms)) {
    $user = Yii::app()->getComponent('user');
    $user->setFlash(
            'warning', "<strong>Ya existe una Oficina con este nombre.</strong>"
    );
    $this->widget('booster.widgets.TbAlert', array(
        'fade' => true,
        'closeText' => '&times;', // false equals no close link
        'events' => array(),
        'htmlOptions' => array(),
        'userComponentId' => 'user',
        'alerts' => array(// configurations per alert type
            'warning' => array('closeText' => false),
        ),
    ));
}
?>

<h1>Oficina</h1>

<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Caracteristica de la Oficina',
            'context' => 'danger',
            // 'headerHtmlOptions' => array('style' => 'background:url(' . Yii::app()->request->baseUrl . '/img/fondo_barra.jpg);color:white;'),
            'headerIcon' => 'globe',
            'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia), TRUE),
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
					//'url' => $this->createURL('/oficina/admin'),
					'htmlOptions' => array(
		'onclick' => 'document.location.href ="' . $this->createUrl('oficina/admin') . '"'),

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

 