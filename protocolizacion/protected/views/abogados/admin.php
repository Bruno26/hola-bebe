<?php
$this->breadcrumbs = array(
    'Abogadoses' => array('index'),
    'Manage',
);
$this->menu = array(
    array('label' => 'List Abogados', 'url' => array('index')),
    array('label' => 'Create Abogados', 'url' => array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('abogados-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Gestión de Agente de Documentación y Cobranzas</h1>

<?php
$v = "SELECT ofi.id_oficina, ofi.nombre FROM abogados ab
        JOIN oficina ofi on ofi.id_oficina=ab.oficina_id
        GROUP BY  ofi.id_oficina, ofi.nombre";
$conexion = Yii::app()->db->createCommand($v)->queryAll();
?>

<?php

function nombre($selec, $iD) {
    $saime = ConsultaOracle::getPersonaByPk($selec, (int) $iD);
    return $saime['PRIMER_NOMBRE'];
}

function apellido($selec, $iD) {
    $saime = ConsultaOracle::getPersonaByPk($selec, (int) $iD);
    return $saime['PRIMER_APELLIDO'];
}

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'abogados-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id' => array(
            'header' => 'N°',
            'name' => 'id',
            'value' => '$data->id',
        //'htmlOptions' => array('width' => '80', 'style' => 'text-align: center;'),
        ),
        'persona_id' => array(
            'header' => 'Agente Documentación y Cobranzas',
            'name' => 'persona_id',
            'value' => 'nombre("PRIMER_NOMBRE",$data->persona_id)."   ".apellido("PRIMER_APELLIDO",$data->persona_id)',
            'filter' => TRUE,
        //'htmlOptions' => array('width' => '80', 'style' => 'text-align: center;'),
        ),
//        'primer_apellido' => array(
//            'header' => 'Apellido',
//            'name' => 'primer_apellido',
//            'value' => 'apellido("PRIMER_APELLIDO",$data->persona_id)',
//        // 'value' => '$data->persona_id_jefe',
//        ),
        'tipo_abogado_id' => array(
            'header' => 'Tipo Abogado',
            'name' => 'tipo_abogado_id',
            'value' => '$data->tipoAbogado->descripcion',
            'filter' => Maestro::FindMaestrosByPadreSelect(99),
        //'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px'),
        ),
        'oficina_id' => array(
            'header' => 'Oficina',
            'name' => 'oficina_id',
            'value' => '$data->oficinaId->nombre',
            'filter' => CHtml::listData($conexion, 'id_oficina', 'nombre'),
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
                    'url' => 'Yii::app()->createUrl("abogados/view/", array("id"=>$data->id))',
                ),
                'modificar' => array(
                    'label' => 'Modificar',
                    'icon' => 'glyphicon glyphicon-pencil',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("abogados/update/", array("id"=>$data->id))',
//                    'visible' => 'Asignar($data->username);'
                ),
                'pdf' => array(
                    'label' => 'Generar PDF',
                    'icon' => 'glyphicon glyphicon-file',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("abogados/pdf/", array("id"=>$data->id))',
//                    'visible' => 'Asignar($data->username);'
                ),
            ),
        ),
    ),
));
?>
