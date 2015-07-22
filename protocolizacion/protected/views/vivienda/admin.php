

<h1 class="text-center">Gestión de Unidades UniFamiliares</h1>


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
            'header' => 'Unidad Multifamiliar',
            'value' => '$data->unidadHabitacional->nombre',
            'filter' => CHtml::listData(UnidadHabitacional::model()->findall(), 'id_unidad_habitacional', 'nombre'),
        ),
        'tipo_vivienda_id' => array(
            'name' => 'tipo_vivienda_id',
            'header' => 'Tipo de Vivienda',
            'value' => '$data->tipoVivienda->descripcion',
            'filter' => Maestro::FindMaestrosByPadreSelect(92),
        ),
        'Estado' => array(
            'header' => 'Estado',
            'name' => 'unidad_habitacional_id',
            'value' => 'Tblparroquia::model()->findByPK(Desarrollo::model()->findByPK($data->unidadHabitacional->desarrollo_id)->parroquia_id)->clvmunicipio0->clvestado0->strdescripcion',
        ),
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'header' => 'Acciones',
            'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
            'template' => '{ver} {modificar} {pdf}',
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
                'pdf' => array(
                    'label' => 'Generar PDF',
                    'icon' => 'glyphicon glyphicon-file',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("vivienda/pdf/", array("id"=>$data->id_vivienda))',
//                    'visible' => 'Asignar($data->username);'
                ),
            ),
        ),
    ),
));
?>
