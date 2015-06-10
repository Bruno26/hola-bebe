<?php
$this->breadcrumbs=array(
	'Grupo Familiars',
);

$this->menu=array(
array('label'=>'Create GrupoFamiliar','url'=>array('create')),
array('label'=>'Manage GrupoFamiliar','url'=>array('admin')),
);
?>

<h1>Grupo Familiars</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
