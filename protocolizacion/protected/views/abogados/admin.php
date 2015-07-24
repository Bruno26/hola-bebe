<?php
$this->breadcrumbs=array(
	'Abogadoses'=>array('index'),
	'Manage',
);
$this->menu=array(
array('label'=>'List Abogados','url'=>array('index')),
array('label'=>'Create Abogados','url'=>array('create')),
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



<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
	<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
<!--</div> search-form -->

<?php  
function nombre($selec,$iD){
	    $saime = ConsultaOracle::getPersonaByPk($selec,(int)$iD);
	    return $saime['PRIMER_NOMBRE'];
	}
	function apellido($selec,$iD){
	    $saime = ConsultaOracle::getPersonaByPk($selec,(int)$iD);
	    return $saime['PRIMER_APELLIDO'];
	}


$this->widget('booster.widgets.TbGridView',array(
'id'=>'abogados-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,

    'columns' => array(
    'id' => array(
    'header' => 'N°',
    'name' => 'id',
    'value' => '$data->id',
    //'htmlOptions' => array('width' => '80', 'style' => 'text-align: center;'),

    ),
    
        'primer_nombre' => array(
    'header' => 'Nombre',
    'name' => 'primer_nombre',
    'value' => 'nombre("PRIMER_NOMBRE",$data->persona_id)',
    
    //'htmlOptions' => array('width' => '80', 'style' => 'text-align: center;'),

    ),
    
    'primer_apellido' => array(
    'header' => 'Apellido',
    'name' => 'primer_apellido',
    'value' => 'apellido("PRIMER_APELLIDO",$data->persona_id)',
    // 'value' => '$data->persona_id_jefe',
      ),
        
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
        'filter' => CHtml::listData(Abogados::model()->findall(), 'oficina_id', 'oficina_id'),
//        'filter' => CHtml::listData(Abogados::model()->findall(), 'oficina_id', 'nombre'),
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
                    'icon'  => 'glyphicon glyphicon-file',
                    'size'  => 'medium',
                    'url'   => 'Yii::app()->createUrl("abogados/pdf/", array("id"=>$data->id))',
//                    'visible' => 'Asignar($data->username);'
                ),

            ),
        ),
 ),   
));


?>
