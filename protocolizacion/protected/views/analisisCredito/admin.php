<?php
 function traza($iD) {
     $traza = Traza::getTraza($iD);
     return $traza;
 }

function nombre($selec, $iD) {
    $saime = ConsultaOracle::getPersonaByPk($selec, (int) $iD);
    return $saime['PRIMER_NOMBRE'];
}

function apellido($selec, $iD) {
    $saime = ConsultaOracle::getPersonaByPk($selec, (int) $iD);
    return $saime['PRIMER_APELLIDO'];
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('beneficiario-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1 class="text-center">Gestión de Censo</h1>

<?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
?>
<!--</div> search-form -->

<div style="text-align: right;vertical-align: middle;">
    <div align="right" class="row">
        <?php
        $this->widget('application.extensions.PageSize.PageSize', array(
            'mGridId' => 'beneficiario-grid', //Gridview id
            'mPageSize' => @$_GET['pageSize'],
            'mDefPageSize' => Yii::app()->params['defaultPageSize'],
        ));
        ?>
    </div>
</div>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'beneficiario-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped bordered condensed',
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id_beneficiario',
            'header' => 'N°',
            'value' => '$data->id_beneficiario',
            'htmlOptions' => array('style' => 'text-align: center', 'width' => '90px'),            
        ),
        array(
            'name' => 'persona_id',
            'header' => 'Nombre',
            'value' => 'nombre("PRIMER_NOMBRE",$data->persona_id)',
        ),
        array(
            'name' => 'persona_id',
            'header' => 'Apellido',
            'value' => 'apellido("PRIMER_APELLIDO",$data->persona_id)',
        ),
        'Estado' => array(
            'header' => 'Estado',
            'name' => 'beneficiarioTemporal',
            'value' => 'Tblparroquia::model()->findByPK(Desarrollo::model()->findByPK($data->beneficiarioTemporal->desarrollo_id)->parroquia_id)->clvmunicipio0->clvestado0->strdescripcion',
            'filter' => CHtml::listData(Tblestado::model()->findall(), 'clvcodigo', 'strdescripcion'),
        ),
        'Desarrollo' => array(
            'header' => 'Desarrollo',
            'name' => 'beneficiarioTemporal',
            'value' => '$data->beneficiarioTemporal->desarrollo->nombre',
            'filter' => CHtml::listData(Desarrollo::model()->findall(), 'id_desarrollo', 'nombre'),
        ),
//        'Grupo Familiar' => array(
//            'header' => 'Grupo Familiar',
//            'name' => 'beneficiarioTemporal',
//           // "type" => "raw",
////
//            //'value' => 'UnidadFamiliar::model()->findByAttributes(array("beneficiario_id"=>"27"))->id_unidad_familiar',
//            'value' => 'GrupoFamiliar::model()->countByAttributes(array("unidad_familiar_id"=> UnidadFamiliar::model()->findByAttributes(array("beneficiario_id"=>$data))->id_unidad_familiar))',
////            //'filter' => CHtml::listData(Desarrollo::model()->findall(), 'id_desarrollo', 'nombre'),
//            'htmlOptions' => array('style' => 'text-align: center', 'width' => '50px'),
////
//        ),
        array(
            'name' => 'fecha_ultimo_censo',
            'value' => 'Yii::app()->dateFormatter->format("d/MM/y", strtotime($data->fecha_ultimo_censo))',
            'htmlOptions' => array('style' => 'text-align: center', 'width' => '100px'),

        //'header' => 'Creación',
        ),
        array(
             'name' => 'id_beneficiario',
             'header' => 'Avance',
             'value' => 'traza($data->id_beneficiario)',
             'htmlOptions' => array('style' => 'text-align: center', 'width' => '10px'),

         ),
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'header' => 'Acciones',
            'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
            'template' => '{ver}{acreditacion}',
            'buttons' => array(


                'ver' => array(
                    'label' => 'Ver',
                    'icon' => 'eye-open',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("beneficiario/view/", array("id"=>$data->id_beneficiario))',
                ),

                'acreditacion' => array(
                    'label' => 'Continuar Censo',
                    'icon' => 'glyphicon glyphicon-euro',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("/analisisCredito/create", array("id"=>$data->id_beneficiario))',
                    'visible' => 'traza($data->id_beneficiario)==100'
                ),

            ),
        ),
    ),
));
?>
