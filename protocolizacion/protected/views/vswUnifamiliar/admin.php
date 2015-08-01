


<h1 class="text-center">Gestión de Unidades UniFamiliares</h1>


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
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
           'nombre_desarrollo' => array(
            'header' => 'Nombre de Desarrollo',
            'name' => 'nombre_desarrollo',
            'value' => '$data->nombre_desarrollo',
            'filter' => CHtml::listData(Desarrollo::model()->findAll(array('order' => 'nombre ASC')), 'nombre', 'nombre')

        ),

        'nombre_unidad_habitacional' => array(
            'name' => 'nombre_unidad_habitacional',
            'header' => 'Unidad Multifamiliar',
            'value' => '$data->nombre_unidad_habitacional',
            'filter' => CHtml::listData(UnidadHabitacional::model()->findAll(array('order' => 'nombre ASC')), 'nombre', 'nombre'),
        ),
        'tipo_vivienda' => array(
            'name' => 'tipo_vivienda',
            'header' => 'Tipo de Vivienda',
            'value' => '$data->tipo_vivienda',
            'filter' => Maestro::FindMaestrosByPadreSelect(92, 'descripcion'),
        ),

        'estado' => array(
            'header' => 'Estado',
            'name' => 'estado',
            'value' => '$data->estado',
            'filter' => CHtml::listData(Tblestado::model()->findAll(array('order' => 'strdescripcion ASC')), 'strdescripcion', 'strdescripcion')

        ),
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'header' => 'Acciones',
            'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
            'template' => '{ver} {modificar} {pdf} {documento}',
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

                 'documento' => array(
                    'label' => 'Generar Documento',
                    'icon' => 'glyphicon glyphicon-list-alt',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("vivienda/documento/", array("id"=>$data->id_vivienda))',
//                    'visible' => 'Asignar($data->username);'
                ),
            ),
        ),
    ),
));
?>
