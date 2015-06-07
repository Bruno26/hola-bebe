<?php
$this->breadcrumbs=array(
	'Fuente Financiamientos'=>array('index'),
	$model->id_fuente_financiamiento=>array('view','id'=>$model->id_fuente_financiamiento),
	'Update',
);

	$this->menu=array(
	array('label'=>'List FuenteFinanciamiento','url'=>array('index')),
	array('label'=>'Create FuenteFinanciamiento','url'=>array('create')),
	array('label'=>'View FuenteFinanciamiento','url'=>array('view','id'=>$model->id_fuente_financiamiento)),
	array('label'=>'Manage FuenteFinanciamiento','url'=>array('admin')),
	);
	?>

	<h1>Update FuenteFinanciamiento <?php echo $model->id_fuente_financiamiento; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>