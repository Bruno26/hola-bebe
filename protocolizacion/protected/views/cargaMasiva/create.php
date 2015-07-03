<?php
$this->breadcrumbs=array(
	'Carga Masivas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CargaMasiva','url'=>array('index')),
array('label'=>'Manage CargaMasiva','url'=>array('admin')),
);
?>

<h1>Create CargaMasiva</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>