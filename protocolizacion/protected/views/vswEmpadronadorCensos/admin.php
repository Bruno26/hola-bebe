

<?php

function prueba($id) {
    $vswEmpadronador = VswEmpadronadorCensos::model()->findByAttributes(array('id_beneficiario_temporal' => $id));

    if (!empty($vswEmpadronador->id_beneficiario)) {
        $n = 'Yii::app()->createUrl("beneficiario/culminarRegistro", array("id"=>' . $vswEmpadronador->id_beneficiario . ')))';
        return $n;
    } else {
        return 'Yii::app()->createUrl("/Beneficiario/createCenso", array("id"=>' . $id . '))';
    }
}
?>

<h1>Gestión de Empadronador</h1>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'vsw-empadronador-censos-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'columns' => array(
        'id_beneficiario_temporal' => array(
            'header' => 'Id Beneficiario Temporal',
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
//              array(
//             'name' => 'id_beneficiario',
//             'header' => 'Avance',
//             'value' => 'traza($data->id_beneficiario)',
//             'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px'),
//
//         ),
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
                    //'url' => 'Yii::app()->createUrl("beneficiario/culminarRegistro", array("id"=>$data->id_beneficiario))',
                    //'url' => 'Yii::app()->createUrl("/Beneficiario/createCenso", array("id"=>$data->id_beneficiario_temporal))',
                    'url' => 'prueba($data->id_beneficiario)',
                ),
            ),
        ),
    ),
));
?>