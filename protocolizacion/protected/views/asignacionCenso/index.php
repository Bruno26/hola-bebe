<?php
$this->breadcrumbs=array(
	'Asignacion Censos',
);

$this->menu=array(
array('label'=>'Create AsignacionCenso','url'=>array('create')),
array('label'=>'Manage AsignacionCenso','url'=>array('admin')),
);
?>

<h1>Asignacion Censos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
