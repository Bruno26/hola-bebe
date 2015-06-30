<?php

function nacionalidadCedula($selec, $select2, $iD) {
    $saime = ConsultaOracle::getNacionalidadCedulaPersonaByPk($selec, $select2, (int) $iD);
    return $saime['NACIONALIDAD'] . " - " . $saime['CEDULA'];
}

$persona = (object) ConsultaOracle::getPersonaBeneficiario($model->nacionalidad, $model->cedula);
//echo '<pre>';
//var_dump($persona);
//die;
?>

<div class="row">
    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-user"></i> Datos Personales</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>  Nombre y Apellido:</b> <?php echo $model->nombre_completo ?><br/>
                        <b>Cédula de Identidad:</b> <?php echo nacionalidadCedula('NACIONALIDAD', 'CEDULA', $model->persona_id) ?><br>
                        <b>Fecha de Nacimiento:</b> <?php echo $persona->FECHANACIMIENTO ?>
                    </p>
                </blockquote>
            </div>
            <div class='col-md-6'>
                <div class='text-right' style='margin-right: 1em;'><img src="<?php echo Yii::app()->baseUrl; ?>/images/banavih_ndice1.png" style="width: 25%;"/></div>
            </div>

        </div>
    </div>
    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-home"></i> Desarrollo</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>  Desarrollo:</b> <?php echo $model->desarrollo->nombre ?><br/>
                        <b>  Unidad Multifamiliar:</b> <?php echo $model->unidadHabitacional->nombre ?><br/>
                        <b>  Tipo de Inmueble:</b> <?php echo $model->unidadHabitacional->genTipoInmueble->descripcion ?><br/>
                        <b>  Fecha Creación:</b> 
<?php echo date('d/m/Y', strtotime($model->fecha_creacion)); ?> <br>
                    </p>
                </blockquote>
            </div>


        </div>
    </div>


</div>