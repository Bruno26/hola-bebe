<?php
$this->breadcrumbs = array(
    'Viviendas' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Vivienda', 'url' => array('index')),
    array('label' => 'Create Vivienda', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('vivienda-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1 class="text-center">Listado de Viviendas</h1>


<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'vivienda-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_vivienda',
        'tipo_vivienda_id',
        'unidad_habitacional_id',
        'construccion_mt2',
        'nro_piso',
        'nro_vivienda',
        /*
          'sala',
          'comedor',
          'lavandero',
          'lindero_norte',
          'lindero_sur',
          'lindero_este',
          'lindero_oeste',
          'coordenadas',
          'precio_vivienda',
          'nro_estacionamientos',
          'descripcion_estac',
          'nro_habitaciones',
          'nro_banos',
          'fuente_datos_entrada_id',
          'estatus_vivienda_id',
          'cocina',
          'fecha_creacion',
          'fecha_actualizacion',
          'usuario_id_creacion',
          'usuario_id_actualizacion',
         */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
));
?>
