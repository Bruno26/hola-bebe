<?php
$this->breadcrumbs=array(
	'Reasignacion Viviendas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ReasignacionVivienda','url'=>array('index')),
array('label'=>'Manage ReasignacionVivienda','url'=>array('admin')),
);
?>

<h1>Create ReasignacionVivienda</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>