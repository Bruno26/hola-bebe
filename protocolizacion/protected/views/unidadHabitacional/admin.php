<?php
$this->breadcrumbs = array(
    'Unidad Habitacionals' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List UnidadHabitacional', 'url' => array('index')),
    array('label' => 'Create UnidadHabitacional', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('unidad-habitacional-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1 class="text-center">Listado de Unidad Habitacionales</h1>

<?php //echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'unidad-habitacional-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_unidad_habitacional',
        'nombre',
        'desarrollo_id',
        'gen_tipo_inmueble_id',
        'total_unidades',
        'registro_publico_id',
        /*
          'tipo_documento_id',
          'fecha_registro',
          'nro_documento',
          'tomo',
          'ano',
          'nro_protocolo',
          'asiento_registral',
          'folio_real',
          'nro_matricula',
          'fuente_datos_entrada_id',
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
