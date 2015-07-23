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
                        <b>  Nombre y Apellido:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $model->nombre_completo; ?><br/>
                        <b>Cédula de Identidad:</b> &nbsp;&nbsp;<?php echo nacionalidadCedula('NACIONALIDAD', 'CEDULA', $model->persona_id); ?><br>
                        <b>Fecha de Nacimiento:</b> <?php if($persona->FECHANACIMIENTO == null){ echo "No Posee"; }else{ echo $persona->FECHANACIMIENTO; } ?><br>
                        <b>Teléfono Habitación:</b>&nbsp;&nbsp;&nbsp;<?php  if($persona->TELEFONOHAB == null){ echo "No Posee"; }else{ echo $persona->TELEFONOHAB; } ?> <br>
                        <b>Teléfono Celular: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($persona->TELEFONOMOVIL == null){ echo "No Posee"; }else{ echo $persona->TELEFONOMOVIL; } ?><br>
                        <b>Correo Electrónico:&nbsp;&nbsp;&nbsp;</b> <?php if($persona->CORREO == null){ echo "No Posee"; }else{ echo $persona->CORREO; }   ?>
                    </p>
                </blockquote>
            </div>
            <div class='col-md-6'>
                <div class='text-right' style='margin-right: 1em;'><img src="<?php echo Yii::app()->baseUrl; ?>/images/LOGO_BANAVIH-1.jpg" style="width: 25%;"/></div>
            </div>

        </div>
    </div>
    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-home"></i> Desarrollo</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>  Desarrollo:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <?php echo $model->desarrollo->nombre; ?><br/> 
                        <b> Estado:   </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $model->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion; ?><br/>
                        <b> Municipio:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $model->desarrollo->fkParroquia->clvmunicipio0->strdescripcion; ?><br/>
                        <b> Parroquia:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $model->desarrollo->fkParroquia->strdescripcion; ?><br/>
                        <b>  Unidad Multifamiliar:</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $model->unidadHabitacional->nombre; ?><br/>
                        <b>  Tipo de Inmueble:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $model->unidadHabitacional->genTipoInmueble->descripcion; ?><br/>
                        <b>  Piso:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $model->vivienda->nro_piso; ?><br/>
                        <b>  Número de Vivienda :</b>&nbsp;&nbsp; <?php echo $model->vivienda->nro_vivienda; ?><br/>
                       
                        <b>  Fecha Creación:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo date('d/m/Y', strtotime($model->fecha_creacion)); ?> <br>
                    </p>
                </blockquote>
            </div>


        </div>
    </div>


</div>