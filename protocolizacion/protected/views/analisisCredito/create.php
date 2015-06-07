<?php
$this->breadcrumbs=array(
	'Analisis Creditos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List AnalisisCredito','url'=>array('index')),
array('label'=>'Manage AnalisisCredito','url'=>array('admin')),
);
?>

<h1>Create AnalisisCredito</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>