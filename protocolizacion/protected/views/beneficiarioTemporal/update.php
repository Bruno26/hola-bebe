<?php
$this->breadcrumbs=array(
	'Beneficiario Temporals'=>array('index'),
	$model->id_beneficiario_temporal=>array('view','id'=>$model->id_beneficiario_temporal),
	'Update',
);

	$this->menu=array(
	array('label'=>'List BeneficiarioTemporal','url'=>array('index')),
	array('label'=>'Create BeneficiarioTemporal','url'=>array('create')),
	array('label'=>'View BeneficiarioTemporal','url'=>array('view','id'=>$model->id_beneficiario_temporal)),
	array('label'=>'Manage BeneficiarioTemporal','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Adjudicado<?php echo $model->id_beneficiario_temporal; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>