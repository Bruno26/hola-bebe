<?php
Yii::app()->clientScript->registerScript('camara', "
    
    $('#GuardarFamiliar').click(function(){
        var idPersona = $('#GrupoFamiliar_persona_id').val();
        var cedula = $('#GrupoFamiliar_cedula').val();
        var nacionalidad = $('#GrupoFamiliar_nacionalidad').val();
        var primerNombre = $('#GrupoFamiliar_primer_nombre').val();
        var segundoNombre = $('#GrupoFamiliar_segundo_nombre').val();
        var primerApellido = $('#GrupoFamiliar_primer_apellido').val();
        var segundoApellido = $('#GrupoFamiliar_segundo_apellido').val();
        var parentesco = $('#GrupoFamiliar_gen_parentesco_id').val();
        var tipoSujeto = $('#GrupoFamiliar_tipo_sujeto_atencion').val();
        var ingresoM = $('#GrupoFamiliar_ingreso_mensual').val();
        var fechaNac = $('#GrupoFamiliar_fecha_nacimiento').val();
        var IdUnidadF = '".$_GET['id']."';
        
        if(cedula == ''){
             bootbox.alert('Ingrese un número de cédula!');
            $('#GrupoFamiliar_gen_parentesco_id').val('');
            return false;
        }
        
        contadorPadre = parseInt(0);
        contadorConyuge = parseInt(0);
        contadorMadre = parseInt(0);
        contadorSuegro = parseInt(0);
        contadorAbuelo = parseInt(0);
        $('#listado_familiar tr').each(function () {
            var parentesco = $(this).find('td:eq(2)').html();
            alert(parentesco);
            if (parentesco == 'PADRE') {
                contadorPadre++
            }
            if (parentesco == 'CONYUGE') {
                contadorConyuge++
            }
            if (parentesco == 'MADRE') {
                contadorMadre++
            }
            if (parentesco == 'SUEGRO(A)') {
                contadorSuegro++
            }
            if (parentesco == 'ABUELO(A)') {
                contadorAbuelo++
            }
        });


        if (valor == 'C') {
            if (contadorConyuge > 0) {
                bootbox.alert('Usted ya tiene registrado un Conyuge.');
                $('#Familiar_parentesco').val('');
                return false;
            }
        } else if (valor == 'M') {
            if (contadorMadre > 0) {
                bootbox.alert('Usted ya tiene registrado a su Madre.');
                $('#Familiar_parentesco').val('');
                return false;
            }
        } else if (valor == 'P') {
            if (contadorPadre > 0) {
                bootbox.alert('Usted ya tiene registrado a su Padre.');
                $('#Familiar_parentesco').val('');
                return false;
            }
        } else if (valor == 'S') {
            if (contadorSuegro >= 2) {
                bootbox.alert('Usted ya posee asociado dos Suegros.');
                $('#Familiar_parentesco').val('');
                return false;
            }
        } else if (valor == 'A') {
            if (contadorAbuelo >= 4) {
                bootbox.alert('Usted ya posee asociado cuatro Abuelos.');
                $('#Familiar_parentesco').val('');
                return false;
            }
        }

        if ($('#GrupoFamiliar_cotiza_faov').is(':checked')) {var faov = '1';}else{var faov = '0';}
        
         $.ajax({
            url: '" . Yii::app()->createAbsoluteUrl('GrupoFamiliar/InsertFamiliar') . "',
            async: true,
            type: 'POST',
            data: 'cedula=' +cedula + '&nacionalida=' +nacionalidad + '&primerNombre=' + primerNombre +'&segundoNombre=' +segundoNombre + '&primerApellido=' +primerApellido +'&segundoApellido=' +segundoApellido +'&idPersona=' +idPersona +'&parentesco=' +parentesco +'&tipoSujeto=' +tipoSujeto +'&ingresoM='+ ingresoM+ '&faov='+faov+'&fechaNac='+fechaNac+'&IdUnidadF='+IdUnidadF,
            dataType: 'json',
            success: function(data,faov) {
                if(data == 3){
                    $.fn.yiiGridView.update('listado_familiar');
                }
            },
            error: function(data) {
                bootbox.alert('Ocurrio un error');
            }
        });

    });
");

$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'desarrollo-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>
<h1>Grupo Familiar</h1>
<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Grupo Familiar',
            'context' => 'primary',
            'headerIcon' => 'user',
            'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model), TRUE),
                )
        );
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Listar Grupo Familiar',
            'context' => 'primary',
            // 'headerHtmlOptions' => array('style' => 'background:url(' . Yii::app()->request->baseUrl . '/img/fondo_barra.jpg);color:white;'),
            'headerIcon' => 'user',
            'content' => $this->renderPartial('_listardatos', array('form' => $form), TRUE),
                )
        );
        ?>
    </div>
</div>



<?php //echo $this->renderPartial('_form', array('model'=>$model));  ?>

<?php $this->endWidget(); ?>


