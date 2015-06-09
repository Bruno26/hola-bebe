<?php
$this->breadcrumbs=array(
	'Registro Publicos'=>array('index'),
	$model->id_registro_publico=>array('view','id'=>$model->id_registro_publico),
	'Update',
);

	$this->menu=array(
	array('label'=>'List RegistroPublico','url'=>array('index')),
	array('label'=>'Create RegistroPublico','url'=>array('create')),
	array('label'=>'View RegistroPublico','url'=>array('view','id'=>$model->id_registro_publico)),
	array('label'=>'Manage RegistroPublico','url'=>array('admin')),
	);
	?>

	<h1>Update RegistroPublico <?php echo $model->id_registro_publico; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>