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


<div style="text-align: right;vertical-align: middle;">
    <div align="right" class="row">
        <?php
        $this->widget('application.extensions.PageSize.PageSize', array(
            'mGridId' => 'vivienda-grid', //Gridview id
            'mPageSize' => @$_GET['pageSize'],
            'mDefPageSize' => Yii::app()->params['defaultPageSize'],
        ));
        ?>
    </div>
</div>
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'vivienda-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_vivienda',

        'unidad_habitacional_id' => array(
            'name' => 'unidad_habitacional_id',
            'header' => 'Unidad Habitacional',
            'value' => '$data->unidadHabitacional->nombre',
            'filter' => CHtml::listData(UnidadHabitacional::model()->findall(), 'id_unidad_habitacional', 'nombre'),
        ),

        'tipo_vivienda_id' => array(
            'name' => 'tipo_vivienda_id',
            'value' => '$data->tipoVivienda->descripcion',
            'filter' => Maestro::FindMaestrosByPadreSelect(92),
            'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px'),
        ),
        'Estado' => array(
            'header' => 'Estado',
            'name' => 'unidad_habitacional_id',
            //'value' => '$data->fkParroquia->clvmunicipio0->clvestado0->strdescripcion',
            //$data->unidadHabitacional->desarrollo_id
            //'value' => '$data->unidadHabitacional->desarrollo_id',
            //$info_usuario = Desarrollo::model()->find('desarrollo_id=?', array($data->unidadHabitacional->desarrollo_id));

            //'value' => 'Desarrollo::model()->findByPK($data->unidadHabitacional->desarrollo_id)->parroquia_id',

            'value' => 'Tblparroquia::model()->findByPK(Desarrollo::model()->findByPK($data->unidadHabitacional->desarrollo_id)->parroquia_id)->clvmunicipio0->clvestado0->strdescripcion',



            //'value' => 'Tblparroquia->::model()->findByPK(Desarrollo::model()->findByPK($data->unidadHabitacional->desarrollo_id)->parroquia_id)->strdescripcion',

            //BuscarDesarrollo()
            //fkParroquia->clvmunicipio0->clvestado0->strdescripcion',
            //'filter' => CHtml::listData(Tblestado::model()->findall(), 'clvcodigo', 'strdescripcion'),
//            'filter' => Maestro::FindMaestrosByPadreSelect(71),
        ),
        array(
            'name' => 'construccion_mt2',
            'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px'),
        ),
        array(
            'name' => 'nro_piso',
            'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px'),
        ),
        array(
            'name' => 'nro_vivienda',
            'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px'),
        ),

        array(
            'name' => 'precio_vivienda',
            'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px'),
        ),
        array(
            'name' => 'fecha_creacion',
            'value' => 'Yii::app()->dateFormatter->format("d/M/y - hh:mm a", strtotime($data->fecha_creacion))',
        //'header' => 'Creación',
        ),
        /*
          'sala',
          'comedor',
          'lavandero',
          'lindero_norte',
          'lindero_sur',
          'lindero_este',
          'lindero_oeste',
          'coordenadas',
          'nro_estacionamientos',
          'descripcion_estac',
          'nro_habitaciones',
          'nro_banos',
          'fuente_datos_entrada_id',
          'estatus_vivienda_id',
          'cocina',
          'fecha_actualizacion',
          'usuario_id_creacion',
          'usuario_id_actualizacion',
         */
         array(
             'class' => 'booster.widgets.TbButtonColumn',
             'header' => 'Acciones',
             'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
             'template' => '{ver} {modificar}',
             'buttons' => array(
                 'ver' => array(
                     'label' => 'Ver',
                     'icon' => 'eye-open',
                     'size' => 'medium',
                     'url' => 'Yii::app()->createUrl("vivienda/view/", array("id"=>$data->id_vivienda))',
                 ),
                 'modificar' => array(
                     'label' => 'Modificar',
                     'icon' => 'glyphicon glyphicon-pencil',
                     'size' => 'medium',
                     'url' => 'Yii::app()->createUrl("vivienda/update/", array("id"=>$data->id_vivienda))',
 //                    'visible' => 'Asignar($data->username);'
                 ),

             ),
         ),
    ),
));
?>
