<?php
$this->breadcrumbs=array(
	'Empadronador Censos'=>array('index'),
	$model->id_empadronador_censo=>array('view','id'=>$model->id_empadronador_censo),
	'Update',
);

	$this->menu=array(
	array('label'=>'List EmpadronadorCenso','url'=>array('index')),
	array('label'=>'Create EmpadronadorCenso','url'=>array('create')),
	array('label'=>'View EmpadronadorCenso','url'=>array('view','id'=>$model->id_empadronador_censo)),
	array('label'=>'Manage EmpadronadorCenso','url'=>array('admin')),
	);
	?>

	<h1>Update EmpadronadorCenso <?php echo $model->id_empadronador_censo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>