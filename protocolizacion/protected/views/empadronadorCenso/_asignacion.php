<?php
Yii::app()->clientScript->registerScript('grupoFamiliar', "
    $(document).ready(function(){
        
    });
    $( '#enviarAsignacion' ).click(function() {
        var UnidaMulti = $('#EmpadronadorCenso_UnidadMultifamiliar').val();
        var BeneficiarioTemp = $('#EmpadronadorCenso_BeneficiarioAdju').val();
        var asgnacion_censo = '" . $_GET['id'] . "';
        var empadronador = $('#EmpadronadorCenso_empadronador_usuario_id').val();
        if(UnidaMulti == ''){
            bootbox.alert('Seleccione una unidad Multifamiliar.');
            return false;
        }
        if(empadronador == ''){
            bootbox.alert('Seleccione una Empadronador.');
            return false;
        }
        $.ajax({
            url: '" . Yii::app()->createAbsoluteUrl('ValidacionJs/AgregarAsignacionesEmpa') . "',
            async: true,
            type: 'POST',
            data: 'UnidaMulti=' +UnidaMulti + '&BeneficiarioTemp='+BeneficiarioTemp+ '&asgnacion_censo='+asgnacion_censo+ '&empadronador='+empadronador,
            dataType: 'json',
            success: function(data,faov) {
                if(data == 2){
                    $('#EmpadronadorCenso_empadronador_usuario_id').val('');
                    $('#EmpadronadorCenso_UnidadMultifamiliar').val('');
                    html = '<option value=\"\">SELECCIONE</option>';
                    $('#EmpadronadorCenso_BeneficiarioAdju').html(html);
                    $.fn.yiiGridView.update('listado_empadronador');
                }
            },
            error: function(data) {
                bootbox.alert('Ocurrio un error');
            }
        });
        
    
    });
");
?>
<div class="row">
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'edoDes', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'munDes', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
    <div class="col-md-4">
        <?php echo $form->textFieldGroup($model, 'parqDes', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <?php echo $form->textFieldGroup($model, 'Des', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 100, 'readonly' => true,)))); ?>
    </div>
    <div class="col-md-4">
        <?php
        echo $form->dropDownListGroup($model, 'UnidadMultifamiliar', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
            'widgetOptions' => array(
                'data' => CHtml::listData(UnidadHabitacional::model()->findAll($unidadHab), 'id_unidad_habitacional', 'nombre'),
                'htmlOptions' => array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarBeneficiariosTemporalEmpadronador'),
                        'update' => '#' . CHtml::activeId($model, 'BeneficiarioAdju'),
                    ),
                    'empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?php
        echo $form->dropDownListGroup($model, 'BeneficiarioAdju', array('wrapperHtmlOptions' => array('class' => 'col-sm-12'),
            'widgetOptions' => array(
                'htmlOptions' => array('empty' => 'SELECCIONE'),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">
        <label><?php echo CHtml::activeLabel($model, 'empadronador_usuario_id'); ?></label>
        <?php
        $n = CrugeStoredUser::model()->findall();
        echo '<select class="form-control" id="EmpadronadorCenso_empadronador_usuario_id" name="EmpadronadorCenso[empadronador_usuario_id]"  placeholder="Empadronador">';
        echo '<option value="">SELECCIONE</option>';
        foreach ($n as $result):
            if ($result->iduser != 1 && $result->iduser != 2) {
                echo '<option value="' . $result->iduser . '">' . $result->username . '</option>';
            }
        endforeach;
        echo '</select>';
        ?>
    </div>
    <div class="col-md-4" id="enviarAsignacion">
        <a>
            <img src="<?php echo Yii::app()->baseUrl; ?>/images/agregar.jpg" width="60px" height="60px" >
        </a>
    </div>
</div>


<div class="row">
    <div class='col-md-12'>
        <?php
        $this->widget(
                'booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'responsiveTable' => true,
            'id' => 'listado_empadronador',
            'dataProvider' => new CActiveDataProvider('AdjudicadoEmpadronador', array(
                'criteria' => array(
                    'with' => array(
                        'beneficiarioTemporal' => array(
                            //'condition' => 'desarrollo_id=' . $_GET['id'] . '',
                        ),
                    ),
                ),
                'pagination' => array(
                    'pageSize' => 5,
                ),
                    )),
//            'template' => "{items}",
            'columns' => array(
                array(
                    'name' => 'beneficiario_temporal_id',
                    'header' => 'Listado de Programas',
                    'value' => '$data->beneficiario_temporal_id',
                ),
                array(
                    'name' => 'beneficiarioTemporal->desarrollo->nombre',
                    'header' => 'Desarrollo',
                    'value' => '$data->beneficiarioTemporal->desarrollo_id',
                ),
            ),
                )
        );
        ?>
    </div>
</div>