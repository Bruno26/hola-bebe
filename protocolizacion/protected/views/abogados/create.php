<?php
$this->breadcrumbs=array(
	'Abogadoses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Abogados','url'=>array('index')),
array('label'=>'Manage Abogados','url'=>array('admin')),
);
?>

<h1>Create Abogados</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>