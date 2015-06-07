<?php
$this->breadcrumbs=array(
	'Beneficiarios'=>array('index'),
	$model->id_beneficiario=>array('view','id'=>$model->id_beneficiario),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Beneficiario','url'=>array('index')),
	array('label'=>'Create Beneficiario','url'=>array('create')),
	array('label'=>'View Beneficiario','url'=>array('view','id'=>$model->id_beneficiario)),
	array('label'=>'Manage Beneficiario','url'=>array('admin')),
	);
	?>

	<h1>Update Beneficiario <?php echo $model->id_beneficiario; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>