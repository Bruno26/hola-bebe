<?php
$this->breadcrumbs=array(
	'Registro Documentos'=>array('index'),
	$model->id_registro_documento=>array('view','id'=>$model->id_registro_documento),
	'Update',
);

	$this->menu=array(
	array('label'=>'List RegistroDocumento','url'=>array('index')),
	array('label'=>'Create RegistroDocumento','url'=>array('create')),
	array('label'=>'View RegistroDocumento','url'=>array('view','id'=>$model->id_registro_documento)),
	array('label'=>'Manage RegistroDocumento','url'=>array('admin')),
	);
	?>

	<h1>Update RegistroDocumento <?php echo $model->id_registro_documento; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>