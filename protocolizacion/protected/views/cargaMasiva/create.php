<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'carga-masiva-form',
    'enableAjaxValidation' => false,
    //'enableAjaxValidation' =>false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
//    'type' => 'horizontal',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
<?php Yii::app()->clientScript->registerScript('desarrollo', "
         $('#subirArchivo').click(function(){
         
                if ($('#Tblestado_clvcodigo').val()==''){
                    bootbox.alert('Por favor seleccione estado');
                    return false;
                }
                if ($('#Tblmunicipio_clvcodigo').val()==''){
                    bootbox.alert('Por favor seleccione municipio');
                    return false;
                }
                if ($('#Tblparroquia_clvcodigo').val()==''){
                    bootbox.alert('Por favor seleccione parroquia');
                    return false;
                }
                if ($('#UnidadHabitacional_desarrollo_id').val()==''){
                    bootbox.alert('Por favor seleccione el nombre del desarrollo');
                    return false;
                }
                if ($('#CargaMasiva_nombre_archivo').val()==''){
                    bootbox.alert('Por favor seleccione un archivo.csv');
                    return false;
                }
                
            });
$('a[data-toggle=modal]').click(function(){
    var target = $(this).attr('data-target');
    var url = $(this).attr('href');
    if(url){
        $(target).find('.modal-body').load(url);
    }
});

") ?>

<h1>Realizar Carga Masiva</h1>


<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Carga Masiva',
            'context' => 'info',
            'headerHtmlOptions' => array('style' => 'background: linear-gradient(#1fb5ad, #1fd0ff) !important;color: #FFFFFF !important;'),
            'headerIcon' => 'glyphicon glyphicon-list-alt',
            'content' => $this->renderPartial('_form', array('model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'desarrollo' => $desarrollo, 'form'=>$form, 'unidadHabitacional'=>$unidadHabitacional), TRUE),)
        );
        ?>
    </div>
</div>


<?php $this->endWidget(); ?>
