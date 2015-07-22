
<h1>Gestión de Unidades Multifamiliares</h1>
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'unidad-habitacional-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,

    'columns' => array(
      'id_unidad_habitacional' => array(
          'header' => 'N°',
          'name' => 'id_unidad_habitacional',
          'value' => '$data->id_unidad_habitacional',
//            'filter' => Maestro::FindMaestrosByPadreSelect(71),
      ),
        'nombre_unidad_habitacional' => array(
            'header' => 'Unidad Multifamiliar',
            'name' => 'nombre_unidad_habitacional',
            'value' => '$data->nombre_unidad_habitacional',
            'filter' => CHtml::listData(UnidadHabitacional::model()->findAll(array('order' => 'nombre ASC')), 'nombre', 'nombre')

        ),
        'nombre_desarrollo' => array(
            'header' => 'Nombre de Desarrollo',
            'name' => 'nombre_desarrollo',
            'value' => '$data->nombre_desarrollo',
            'filter' => CHtml::listData(Desarrollo::model()->findAll(array('order' => 'nombre ASC')), 'nombre', 'nombre')

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
            'template' => '{ver} {modificar} {pdf}',
            'buttons' => array(
                'ver' => array(
                    'label' => 'Ver',
                    'icon' => 'eye-open',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("UnidadHabitacional/view/", array("id"=>$data->id_unidad_habitacional))',
                ),
                'pdf' => array(
                    'label' => 'Generar PDF',
                    'icon' => 'glyphicon glyphicon-file',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("UnidadHabitacional/pdf/", array("id"=>$data->id_unidad_habitacional))',
                ),
                'modificar' => array(
                    'label' => 'Modificar',
                    'icon' => 'glyphicon glyphicon-pencil',
                    'size' => 'medium',
                    'url' => 'Yii::app()->createUrl("UnidadHabitacional/update/", array("id"=>$data->id_unidad_habitacional))',

                ),

            ),
        ),
    ),
));
?>



<?php // $this->widget('booster.widgets.TbGridView',array(
//'id'=>'vsw-multifamiliar-grid',
//'dataProvider'=>$model->search(),
//'filter'=>$model,
//'columns'=>array(
//		'id_desarrollo',
//		'nombre_desarrollo',
//		'id_unidad_habitacional',
//		'nombre_unidad_habitacional',
//		'cod_estado',
//		'estado',
//		/*
//		'cantidad_vivienda',
//		'id_estatus',
//		'estatus',
//		*/
//array(
//'class'=>'booster.widgets.TbButtonColumn',
//),
//),
//)); ?>
