<?php
$this->breadcrumbs=array(
	'Carga Masivas'=>array('index'),
	$model->id_carga_masiva=>array('view','id'=>$model->id_carga_masiva),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CargaMasiva','url'=>array('index')),
	array('label'=>'Create CargaMasiva','url'=>array('create')),
	array('label'=>'View CargaMasiva','url'=>array('view','id'=>$model->id_carga_masiva)),
	array('label'=>'Manage CargaMasiva','url'=>array('admin')),
	);
	?>

	<h1>Update CargaMasiva <?php echo $model->id_carga_masiva; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>