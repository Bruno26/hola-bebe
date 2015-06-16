<?php
$Validacion = Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/js_jquery.numeric.js');
Yii::app()->clientScript->registerScript('camara', "
   $(document).ready(function(){
        $('#GrupoFamiliar_tipo_sujeto_atencion').numeric(); 
        $('#GrupoFamiliar_ingreso_mensual').numeric(); 
    });
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
        var IdUnidadF = '" . $_GET['id'] . "';
        
        if(cedula == ''){
            bootbox.alert('Ingrese un número de cédula!');
            $('#GrupoFamiliar_gen_parentesco_id').val('');
            return false;
        }
        
        if(ingresoM == ''){
            bootbox.alert('Indique el Ingreso Mensual.');
            return false;
        }
        if(tipoSujeto == ''){
            bootbox.alert('Indique el Tipo Sujeto.');
            return false;
        }
        
        contadorPadre = parseInt(0);
        contadorConyuge = parseInt(0);
        contadorMadre = parseInt(0);
        contadorSuegro = parseInt(0);
        contadorAbuelo = parseInt(0);
        contadorConcubina = parseInt(0);
        $('#listado_familiar tr').each(function () {
            var parentescoTable = $(this).find('td:eq(2)').html();
            if (parentescoTable == 'PADRE') {
                contadorPadre++
            }
            if (parentescoTable == 'MADRE') {
                contadorMadre++
            }
            if (parentescoTable == 'CÓNYUGE') {
                contadorConyuge++
            }
            if (parentescoTable == 'ABUELO(A)') {
                contadorAbuelo++
            }
            if (parentescoTable == 'SUEGRO') {
                contadorSuegro++
            }
            if (parentescoTable == 'CONCUBINO(A)') {
                contadorConcubina++
            }
        });


        if (parentesco == 161) {
            if (contadorConyuge > 0) {
                bootbox.alert('Usted ya tiene registrado un Conyuge.');
                $('#GrupoFamiliar_gen_parentesco_id').val('');
                return false;
            }
        } else if (parentesco == 152) {
            if (contadorMadre > 0) {
                bootbox.alert('Usted ya tiene registrado a su Madre.');
                $('#GrupoFamiliar_gen_parentesco_id').val('');
                return false;
            }
        } else if (parentesco == 150) {
            if (contadorPadre > 0) {
                bootbox.alert('Usted ya tiene registrado a su Padre.');
                $('#GrupoFamiliar_gen_parentesco_id').val('');
                return false;
            }
        } else if (parentesco == 157) {
            if (contadorSuegro >= 2) {
                bootbox.alert('Usted ya posee asociado dos Suegros.');
                $('#GrupoFamiliar_gen_parentesco_id').val('');
                return false;
            }
        } else if (parentesco == 156) {
            if (contadorAbuelo >= 4) {
                bootbox.alert('Usted ya posee asociado cuatro Abuelos.');
                $('#GrupoFamiliar_gen_parentesco_id').val('');
                return false;
            }
        } else if (parentesco == 161) {
            if (contadorConcubina > 0) {
                bootbox.alert('Usted ya posee una Concubina(o) asociada(o).');
                $('#GrupoFamiliar_gen_parentesco_id').val('');
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
                    $('#GrupoFamiliar_primer_nombre').val('');
                    $('#GrupoFamiliar_cedula').val('');
                    $('#GrupoFamiliar_segundo_nombre').val('');
                    $('#GrupoFamiliar_persona_id').val('');
                    $('#GrupoFamiliar_primer_apellido').val('');
                    $('#GrupoFamiliar_segundo_apellido').val('');
                    $('#GrupoFamiliar_fecha_nacimiento').val('');
                    $('#GrupoFamiliar_ingreso_mensual_faov').val('');
                    $('#GrupoFamiliar_gen_parentesco_id').val('');
                    $('#GrupoFamiliar_tipo_sujeto_atencion').val('');
                    $('#GrupoFamiliar_ingreso_mensual').val('');
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


