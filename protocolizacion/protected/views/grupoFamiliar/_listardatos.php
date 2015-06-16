<?php

function nombre($selec, $iD) {
    $saime = ConsultaOracle::getPersonaByPk($selec, (int) $iD);
    return $saime['PRIMER_NOMBRE'];
}

function apellido($selec, $iD) {
    $saime = ConsultaOracle::getPersonaByPk($selec, (int) $iD);
    return $saime['PRIMER_APELLIDO'];
}

function parentesco($valor) {
    switch ($valor) {
        case 'C':
            return 'CONYUGE';
            break;
        case 'M':
            return 'MADRE';
            break;
        case 'P':
            return 'PADRE';
            break;
        case 'H':
            return 'HIJO(A)';
            break;
        case 'E':
            return 'HERMANO(A)';
            break;
        case 'S':
            return 'SUEGRO(A)';
            break;
        case 'A':
            return 'ABUELO(A)';
            break;
        case 'B':
            return 'SOBRINO(A)';
            break;
        case 'I':
            return 'TIO(A)';
            break;
        case 'U':
            return 'TUTELADOR(A)';
            break;
    }
}
?>
<div class="row">
    <div class='col-md-12'>
        <?php
        $this->widget(
                'booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'responsiveTable' => false,
            'id' => 'listado_familiar',
            'dataProvider' => new CActiveDataProvider('GrupoFamiliar', array(
                'criteria' => array(
                    'condition' => 'unidad_familiar_id=' . $_GET['id'],
                ),
                'pagination' => false,
                    )),
//            'template' => "{items}",
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
                    'name' => 'persona_id',
                    'header' => 'Parentesco',
                    'value' => '$data->genParentesco->descripcion',
                ),
            )
                )
        );
        ?>
    </div>
</div>