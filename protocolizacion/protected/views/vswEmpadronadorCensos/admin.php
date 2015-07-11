

<h1>Gestión de Empadronador</h1>



<?php
//$this->widget('booster.widgets.TbGridView', array(
//    'id' => 'vsw-empadronador-censos-grid',
//    'dataProvider' => $model->search(),
//    'filter' => $model,
//    'columns' => array(
//        'id_desarrollo',
//        'nombre_desarrollo',
//        'id_unidad_habitacional',
//        'nombre_unidad_multifamiliar',
//        'id_beneficiario_temporal',
//        'persona_id',
//        /*
//          'cedula',
//          'nombre_adjudicado',
//          'estatus',
//          'iduser',
//          'empadronador_usuario',
//          'nro_piso',
//          'nro_vivienda',
//         */
//        array(
//            'class' => 'booster.widgets.TbButtonColumn',
//        ),
//    ),
//));
?>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'vsw-empadronador-censos-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'columns' => array(
        'id_beneficiario_temporal' => array(
            'header' => 'Id Beneficiario',
            'name' => 'id_beneficiario_temporal',
            'value' => '$data->id_beneficiario_temporal',
        ),
        'cedula' => array(
            'header' => 'Cedula',
            'name' => 'cedula',
            'value' => '$data->cedula',
        ),
        'nombre_adjudicado' => array(
            'header' => 'Adjudicado',
            'name' => 'nombre_adjudicado',
            'value' => '$data->nombre_adjudicado',
        ),
        'nombre_desarrollo' => array(
            'header' => 'Nombre del Desarrollo ',
            'name' => 'nombre_desarrollo',
            'value' => '$data->nombre_desarrollo',
        ),
        'nombre_unidad_multifamiliar' => array(
            'header' => 'Unidad Familiar',
            'name' => 'nombre_unidad_multifamiliar',
            'value' => '$data->nombre_unidad_multifamiliar',
        ),
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'header' => 'Acciones',
            'template' => '{reasignacionv}{censo}',
            'buttons' => array(
                'reasignacionv' => array(
                    'label' => 'Re-asignacion Vivienda',
                    'icon' => 'glyphicon glyphicon-user',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("reasignacionVivienda/create/", array("id"=>$data->id_beneficiario_temporal))',
                ),
                'censo' => array(
                    'label' => 'Generar Censo',
                    'icon' => 'glyphicon glyphicon-new-window',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("beneficiario/culminarRegistro", array("id"=>$data->id_beneficiario_temporal))',
                ),
             
            ),
        ),
    ),
));
?>