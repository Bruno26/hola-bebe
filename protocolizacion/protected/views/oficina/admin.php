<?php
$this->breadcrumbs = array(
    'Oficinas' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Oficina', 'url' => array('index')),
    array('label' => 'Create Oficina', 'url' => array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('oficina-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Gestión de Oficinas</h1>


<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
<?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
?>
<!--</div> search-form -->

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
    'id' => 'oficina-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_oficina' => array(
            'header' => 'N°',
            'name' => 'id_oficina',
            'value' => '$data->id_oficina',
        ),
        'parroquia_id' => array(
            'header' => 'Estado',
            'name' => 'parroquia_id',
            'value' => '$data->parroquia->clvmunicipio0->clvestado0->strdescripcion',
            'filter' => false,
        ),
        'nombre' => array(
            'header' => 'Nombre de Oficina',
            'name' => 'nombre',
            'value' => '$data->nombre',
            'filter' => CHtml::listData(Oficina::model()->findall(), 'nombre', 'nombre'),
        ),
        'persona_id_jefe' => array(
            'header' => 'Jefe de Oficina',
             'name' => 'persona_id_jefe',
            'value' => 'nombre("PRIMER_NOMBRE",$data->persona_id_jefe)." ".apellido("PRIMER_APELLIDO",$data->persona_id_jefe)',
            'filter' => false,
        ),
//        'primer_apellido' => array(
//            'header' => 'Apellido',
//            'name' => 'primer_apellido',
//            'value' => 'apellido("PRIMER_APELLIDO",$data->persona_id_jefe)',
//            'filter'=> false,
//        // 'value' => '$data->persona_id_jefe',
//        ),
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
                    'url' => 'Yii::app()->createUrl("oficina/view/", array("id"=>$data->id_oficina))',
                ),
                'modificar' => array(
                    'label' => 'Modificar',
                    'icon' => 'glyphicon glyphicon-pencil',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("oficina/update/", array("id"=>$data->id_oficina))',
//                    'visible' => 'Asignar($data->username);'
                ),
                'pdf' => array(
                    'label' => 'Generar PDF',
                    'icon' => 'glyphicon glyphicon-file',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("oficina/pdf/", array("id"=>$data->id_oficina))',
//                    'visible' => 'Asignar($data->username);'
                ),
            ),
        ),
)));
?> 

