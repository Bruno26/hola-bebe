<?php

function nombre($selec, $iD) {
    $saime = ConsultaOracle::getPersonaByPk($selec, (int) $iD);
    return $saime['PRIMER_NOMBRE'];
}

function apellido($selec, $iD) {
    $saime = ConsultaOracle::getPersonaByPk($selec, (int) $iD);
    return $saime['PRIMER_APELLIDO'];
}

function nacionalidadCedula($selec, $select2, $iD) {
    $saime = ConsultaOracle::getNacionalidadCedulaPersonaByPk($selec, $select2, (int) $iD);
    return $saime['NACIONALIDAD'] . " - " . $saime['CEDULA'];
}
?>
<div class="row">
    <div class="col-md-12">
        <div>
            <h4><i class="glyphicon glyphicon-home"></i> Datos Personales</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b>Nombre:</b> <?php echo nombre('PRIMER_NOMBRE', $model->persona_id) ?><br/>
                        <b>Apellido:</b> <?php echo apellido('PRIMER_APELLIDO', $model->persona_id) ?><br/>
                        <b>Cedula de Identidad:</b> <?php echo nacionalidadCedula('NACIONALIDAD', 'CEDULA', $model->persona_id) ?>
                    </p>

                </blockquote>
            </div>
            <div class='col-md-6'>
                <div class='text-right' style='margin-right: 1em;'><img src="<?php echo Yii::app()->baseUrl; ?>/images/LOGO_BANAVIH-1.jpg" style="width: 25%;"/></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <h4><i class="glyphicon glyphicon-folder-close"></i> Datos Jurídico</h4>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <?php if ($model->tipo_abogado_id ==101) { ?>
                    <b>Tipo de Abogado:</b> <?php echo $model->tipoAbogado->descripcion; ?><br/>
                    <b>Inpreabogado:</b> <?php echo $model->inpreabogado; ?><br/>
                    </p>
                </blockquote>

            </div>
        <div class='col-md-6'> 
            <blockquote>
                <p>
                    <?php }else { ?>
                    <b>Rif de Abogado:</b> <?php echo $model->rif_abogado;?><br/>
                    <b>Tipo de Abogado:</b> <?php echo $model->tipoAbogado->descripcion;?><br/>
                    <b>Registro Público:</b> <?php echo $model->registroPublico->nombre_registro_publico;?><br/>
                    <b>Número protocolo:</b> <?php echo $model->nunProtocolo->descripcion;?><br/>
                    <b>Folio:</b> <?php echo $model->folio;?><br/>
                    <b>Tomo:</b> <?php echo $model->tomo;?><br/>
                    <b>Año:</b> <?php echo $model->anio;?><br/>
                    
                    
                   <?php } ?><br/>
                    </p>
                </blockquote>

            </div>
        </div>

        <?php // if (!empty($model->inpreabogado)) { ?>
                                                    <!--<b>Inpreabogado:</b> <?php // echo $model->inpreabogado;       ?><br/>-->
        <?php // } else {
        ?>
        <?php
//                            echo 'No Posee';
//                        }
        ?>

        <div class="col-md-12">
            <h4><i class="glyphicon glyphicon-globe"></i> Oficina Asignada</h4>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b> Oficina:</b> <?php echo $model->oficinaId->nombre ?><br/>
                    </p>
                </blockquote>
            </div>
            <div class='col-md-6'> 
                <blockquote>
                    <p>
                        <b> Observaciones:</b> <?php echo $model->observaciones ?><br/>
                </p>
            </blockquote>
        </div>
    </div>
</div>