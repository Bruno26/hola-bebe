<?php
$this->breadcrumbs=array(
	'Beneficiario Temporals',
);

$this->menu=array(
array('label'=>'Create BeneficiarioTemporal','url'=>array('create')),
array('label'=>'Manage BeneficiarioTemporal','url'=>array('admin')),
);
?>

<h1>Beneficiario Temporals</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
