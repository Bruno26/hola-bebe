<?php
$this->breadcrumbs=array(
	'Programas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Programa','url'=>array('index')),
array('label'=>'Manage Programa','url'=>array('admin')),
);
?>

<h1>Create Programa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>