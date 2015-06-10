<?php
$cedula = Yii::app()->getSession()->get('CedulaUser');
$personal = Personal::model()->findByAttributes(array('cedula' => $cedula));

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
            'dataProvider' => new CActiveDataProvider('Familiar', array(
                'criteria' => array(
                    'condition' => 'id_personal=' . $personal->id_personal,
                ),
                'pagination' => false,
                    )),
//            'template' => "{items}",
            'columns' => array(
                array(
                    'name' => 'cedula_familiar',
                    'header' => 'Cedula del Familiar',
                ),
                array(
                    'name' => 'primer_nombre',
                    'header' => 'Primer Nombre',
                ),
                array(
                    'name' => 'segundo_nombre',
                    'header' => 'Segundo Nombre',
                ),
                array(
                    'name' => 'primer_apellido',
                    'header' => 'Primer Apellido',
                ),
                array(
                    'name' => 'segundo_apellido',
                    'header' => 'Segundo Apellido',
                ),
                array(
                    'name' => 'fecha_nacimiento',
                    'header' => 'Fecha De Nacimiento',
                    'value' => 'Yii::app()->dateFormatter->format("dd/MM/yyy", $data->fecha_nacimiento)',
                ),
                array(
                    'name' => 'parentesco',
                    'header' => 'Parentesco',
                    'value' => 'parentesco($data->parentesco)',
                ),
                array(
                    'class' => 'booster.widgets.TbButtonColumn',
                    'header' => 'Acción',
                    'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
                    'template' => '{update}',
                    'buttons' => array(
                        'update' => array(
                            'url' => '$this->grid->controller->createUrl("familiar/update", array("id"=>$data->id_familiar))',
                        ),
                    ),
                ),
            )
                )
        );
        ?>
    </div>
</div>