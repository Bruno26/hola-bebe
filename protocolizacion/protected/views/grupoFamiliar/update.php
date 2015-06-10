<?php
$this->breadcrumbs=array(
	'Grupo Familiars'=>array('index'),
	$model->id_grupo_familiar=>array('view','id'=>$model->id_grupo_familiar),
	'Update',
);

	$this->menu=array(
	array('label'=>'List GrupoFamiliar','url'=>array('index')),
	array('label'=>'Create GrupoFamiliar','url'=>array('create')),
	array('label'=>'View GrupoFamiliar','url'=>array('view','id'=>$model->id_grupo_familiar)),
	array('label'=>'Manage GrupoFamiliar','url'=>array('admin')),
	);
	?>

	<h1>Update GrupoFamiliar <?php echo $model->id_grupo_familiar; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>