<?php
	function nombre($selec,$iD){
	    $saime = ConsultaOracle::getPersonaByPk($selec,(int)$iD);
	    return $saime['PRIMER_NOMBRE'];
	}
	function apellido($selec,$iD){
	    $saime = ConsultaOracle::getPersonaByPk($selec,(int)$iD);
	    return $saime['PRIMER_APELLIDO'];
	}
        function nacionalidadCedula($selec,$select2,$iD){
	    $saime = ConsultaOracle::getNacionalidadCedulaPersonaByPk($selec,$select2,(int)$iD);
	    return $saime['NACIONALIDAD']." - ".$saime['CEDULA'];
	}
//        $fecha_asignacion = substr($model->fecha_asignacion,0,10);
//        $invert = explode("-",$fecha_asignacion); 
//
//        $fecha_invert = $invert[2]."-".$invert[1]."-".$invert[0]; 

?>

<?php
$this->breadcrumbs=array(
	'Asignacion Censos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List AsignacionCenso','url'=>array('index')),
array('label'=>'Create AsignacionCenso','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('asignacion-censo-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Listado de Asignacion de Censos</h1>


<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'beneficiario-temporal-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
//'columns'=>array(
//		'id_asignacion_censo',
//		'unidad_habitacional_id',
//		'oficina_id',
//		'persona_id',
//		'fecha_asignacion',
//		'censado',
		/*
		'estatus',
		'observaciones',
		'fecha_creacion',
		'fecha_actualizacion',
		'usuario_id_creacion',
		'usuario_id_actualizacion',
		*/
//array(
//'class'=>'booster.widgets.TbButtonColumn',
//),
//),
    'columns' => array(
        'id_asignacion_censo' => array(
            'header' => 'N°',
            'name' => 'id_asignacion_censo',
            'value' => '$data->id_asignacion_censo',
            'htmlOptions' => array('width' => '80', 'style' => 'text-align: center;'),

        ),
        'unidad_habitacional_id' => array(
            'name' => 'unidad_habitacional_id',
            'value' => '$data->unidadHabitacional->nombre',
//            'filter' => Maestro::FindMaestrosByPadreSelect(71),
        ),
        'oficina_id' => array(
            'name' => 'oficina_id',
            'value' => '$data->oficina->nombre',
//            'filter' => Maestro::FindMaestrosByPadreSelect(71),
        ),
        'persona_id' => array(
            'name' => 'persona_id',
            'value' => 'nombre("PRIMER_NOMBRE",$data->persona_id)." ".apellido("PRIMER_APELLIDO",$data->persona_id)',
        ),
        'fecha_asignacion' => array(
            'name' => 'fecha_asignacion',
            #'value' => '$data->fecha_asignacion',
            'value' => 'Yii::app()->dateFormatter->format("d/M/y - hh:mm a", strtotime($data->fecha_asignacion))',
        ),
        'censado' => array(
            'name' => 'censado',
            'value' => '($data->censado)?"SI":"NO"',
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
                    'url' => 'Yii::app()->createUrl("asignacionCenso/view/", array("id"=>$data->id_asignacion_censo))',
                ),
                'modificar' => array(
                    'label' => 'Modificar',
                    'icon' => 'glyphicon glyphicon-pencil',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("asignacionCenso/update/", array("id"=>$data->id_asignacion_censo))',
//                    'visible' => 'Asignar($data->username);'
                ),
                'pdf' => array(
                    'label' => 'Generar PDF',
                    'icon'  => 'glyphicon glyphicon-file',
                    'size'  => 'medium',
                    'url'   => 'Yii::app()->createUrl("asignacionCenso/pdf/", array("id"=>$data->id_asignacion_censo))',
//                    'visible' => 'Asignar($data->username);'
                ),

            ),
        ),
    ),
)); ?>
