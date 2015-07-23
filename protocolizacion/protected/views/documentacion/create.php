<?php
$this->breadcrumbs=array(
	'Documentacions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Documentacion','url'=>array('index')),
array('label'=>'Manage Documentacion','url'=>array('admin')),
);
?>

<h1>Create Documentacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>