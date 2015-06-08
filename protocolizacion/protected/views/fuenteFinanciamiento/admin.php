<?php
$this->breadcrumbs=array(
	'Fuente Financiamientos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List FuenteFinanciamiento','url'=>array('index')),
array('label'=>'Create FuenteFinanciamiento','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('fuente-financiamiento-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Gestión de Fuentes de Financiamientos</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'fuente-financiamiento-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_fuente_financiamiento',
		'nombre_fuente_financiamiento',
		'estatus',

        array(
            'name' => 'fecha_creacion',
            'value' => 'Yii::app()->dateFormatter->format("d/M/y - hh:mm a", strtotime($data->fecha_creacion))',
            'header' => 'Creación',
        ),

        'usuario_id_creacion' => array(
            'header' => 'Usuario',
            'name' => 'usuario_id_creacion',
            //'value' => '$data->usuarioIdCreacion->username',
            'filter' => CHtml::listData(CrugeStoredUser::model()->findall(), 'iduser', 'username'),
        ),
		/*
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_actualizacion',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
