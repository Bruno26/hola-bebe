<?php
$this->breadcrumbs=array(
	'Unidad Habitacionals'=>array('index'),
	$model->id_unidad_habitacional=>array('view','id'=>$model->id_unidad_habitacional),
	'Update',
);

	$this->menu=array(
	array('label'=>'List UnidadHabitacional','url'=>array('index')),
	array('label'=>'Create UnidadHabitacional','url'=>array('create')),
	array('label'=>'View UnidadHabitacional','url'=>array('view','id'=>$model->id_unidad_habitacional)),
	array('label'=>'Manage UnidadHabitacional','url'=>array('admin')),
	);
	?>

	<h1>Update UnidadHabitacional <?php echo $model->id_unidad_habitacional; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>