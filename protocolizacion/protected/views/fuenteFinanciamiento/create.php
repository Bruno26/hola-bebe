<?php
$this->breadcrumbs=array(
	'Fuente Financiamientos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List FuenteFinanciamiento','url'=>array('index')),
array('label'=>'Manage FuenteFinanciamiento','url'=>array('admin')),
);
?>

<h1>Create FuenteFinanciamiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>