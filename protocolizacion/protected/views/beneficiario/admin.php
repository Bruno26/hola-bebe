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



<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn'));  ?>
<!--<div class="search-form" style="display:none">-->
<?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
?>
<!--</div> search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'beneficiario-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped bordered condensed',
//    'filter' => $model,
    'columns' => array(
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
         array(
             'name' => 'id_beneficiario',
             'header' => 'Porcentaje de Avance',
             'value' => 'traza($data->id_beneficiario)',
         ),
//        'id_beneficiario',
//        'persona_id',
//        'rif',
//        'condicion_trabajo_id',
        // 'fuente_ingreso_id',
//        'relacion_trabajo_id',
        /*
          'sector_trabajo_id',
          'nombre_empresa',
          'direccion_empresa',
          'telefono_trabajo',
          'gen_cargo_id',
          'ingreso_mensual',
          'ingreso_declarado',
          'ingreso_promedio_faov',
          'cotiza_faov',
          'direccion_anterior',
          'parroquia_id',
          'urban_barrio',
          'av_call_esq_carr',
          'zona',
          'fecha_ultimo_censo',
          'protocolizado',
          'fecha_creacion',
          'fecha_actualizacion',
          'usuario_id_creacion',
          'usuario_id_actualizacion',
          'estatus_beneficiario_id',
          'codigo_trab',
          'condicion_laboral',
          'beneficiario_temporal_id',
         */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'header' => 'Acciones',
            'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
            'template' => '{editar}{ver}',
            'buttons' => array(
                'editar' => array(
                    'label' => 'Editar',
                    'icon' => 'edit',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("/Beneficiario/culminarRegistro", array("id"=>$data->id_beneficiario))',
                ),
                'ver' => array(
                    'label' => 'Ver',
                    'icon' => 'list',
                    'size' => 'medium',
                //                  'url' => 'Yii::app()->createUrl("/VswUsuariosActualizados/Historico", array("id"=>$data->id_personal, "caso"=>3))',
                ),
            ),
        ),
    ),
));
?>
