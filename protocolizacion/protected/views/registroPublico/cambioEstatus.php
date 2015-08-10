<?php 
Yii::app()->clientScript->registerScript('anulacion', "
    $('#btn-estatus').click(function(){
        valueAnulacion = $('#cambioEstatu').val();
        idSolicitud = '".$model."';
        if(valueAnulacion == ''){
            bootbox.alert('Por favor cambie el estatus del Registro Público.');
            return false;
        }
        $.ajax({
            url: '" . Yii::app()->createAbsoluteUrl('ValidacionJs/CambioEstatus') . "',
            async: true,
            type: 'POST',
            data: 'value='+valueAnulacion+ '&idSolicitud=' + idSolicitud,
            success: function(data){
                if(data == 1){
                    $(location).attr('href', '".$this->createUrl('/registroPublico/create')."');
                }
            },
        });
            
    });
");

?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cambio de Estatus del Registro Público N°<?= $model ?></h4>
        </div>
        <div class="modal-body">
            <div class="well-large">
                <div class="col-lg-12">
                    <label>Seleccione el estatus </label>
                    <select id="cambioEstatu" class="form-control" name="TestForm[dropdown]" placeholder="Select list">
                        <?php
                        $estatus = Maestro::FindMaestrosByPadreSelect(55);
                        echo '<option value="">SELECCION</option>';
                        foreach ($estatus as $data => $value):
                            echo '<option value="' . $data. '">' . $value . '</option>';
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div style="margin-bottom:12%"></div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" id="btn-estatus" href="#" data-dismiss="modal">Aceptar</button>
            <button class="btn btn-danger" href="#" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
</div>