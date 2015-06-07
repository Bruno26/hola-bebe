<?php
$this->breadcrumbs=array(
	'Analisis Creditos'=>array('index'),
	$model->id_analisis_credito=>array('view','id'=>$model->id_analisis_credito),
	'Update',
);

	$this->menu=array(
	array('label'=>'List AnalisisCredito','url'=>array('index')),
	array('label'=>'Create AnalisisCredito','url'=>array('create')),
	array('label'=>'View AnalisisCredito','url'=>array('view','id'=>$model->id_analisis_credito)),
	array('label'=>'Manage AnalisisCredito','url'=>array('admin')),
	);
	?>

	<h1>Update AnalisisCredito <?php echo $model->id_analisis_credito; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>