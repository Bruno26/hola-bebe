<div class="row">
    <div class="col-md-12">

        <h4><i class="glyphicon glyphicon-user"></i> Datos del Beneficiario</h4>
        <div class='col-md-6'> 
            <blockquote>

                <b>Cédula:</b> <?php echo $model->beneficiarioTemporal->cedula; ?> <br>
                <b>Nombre Completo:</b> <?php echo $model->beneficiarioTemporal->nombre_completo; ?> <br>
                <b>Rif:</b> <?php echo $model->rif; ?> <br>

            </blockquote>
        </div>
        <div class="col-md-6">
            <blockquote>
                <b>Fecha Ultimo Censo:</b> <?php echo $model->fecha_ultimo_censo; ?> <br>
            </blockquote>
        </div>
    </div>
    
    
</div>

<?php // echo CHtml::encode($data->getAttributeLabel('id_beneficiario'));      ?>
<?php // echo CHtml::link(CHtml::encode($data->id_beneficiario),array('view','id'=>$data->id_beneficiario));    ?>

<?php // echo CHtml::encode($data->getAttributeLabel('persona_id'));      ?>
<?php // echo CHtml::encode($data->persona_id);    ?>


<?php // echo CHtml::encode($data->getAttributeLabel('rif'));      ?>
<?php // echo CHtml::encode($data->rif);    ?>


<?php // echo CHtml::encode($data->getAttributeLabel('condicion_trabajo_id'));      ?>
<?php // echo CHtml::encode($data->condicion_trabajo_id);    ?>


<?php // echo CHtml::encode($data->getAttributeLabel('fuente_ingreso_id'));      ?>
<?php // echo CHtml::encode($data->fuente_ingreso_id);    ?>


<?php // echo CHtml::encode($data->getAttributeLabel('relacion_trabajo_id'));      ?>
<?php // echo CHtml::encode($data->relacion_trabajo_id);    ?>


<b><?php // echo CHtml::encode($data->getAttributeLabel('sector_trabajo_id'));            ?>
    <?php // echo CHtml::encode($data->sector_trabajo_id);    ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('nombre_empresa')); ?>:</b>
      <?php echo CHtml::encode($data->nombre_empresa); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('direccion_empresa')); ?>:</b>
      <?php echo CHtml::encode($data->direccion_empresa); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('telefono_trabajo')); ?>:</b>
      <?php echo CHtml::encode($data->telefono_trabajo); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('gen_cargo_id')); ?>:</b>
      <?php echo CHtml::encode($data->gen_cargo_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('ingreso_mensual')); ?>:</b>
      <?php echo CHtml::encode($data->ingreso_mensual); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('ingreso_declarado')); ?>:</b>
      <?php echo CHtml::encode($data->ingreso_declarado); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('ingreso_promedio_faov')); ?>:</b>
      <?php echo CHtml::encode($data->ingreso_promedio_faov); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('cotiza_faov')); ?>:</b>
      <?php echo CHtml::encode($data->cotiza_faov); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('direccion_anterior')); ?>:</b>
      <?php echo CHtml::encode($data->direccion_anterior); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('geo_estado_id')); ?>:</b>
      <?php echo CHtml::encode($data->geo_estado_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('geo_municipio_id')); ?>:</b>
      <?php echo CHtml::encode($data->geo_municipio_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('geo_parroquia_id')); ?>:</b>
      <?php echo CHtml::encode($data->geo_parroquia_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('urban_barrio')); ?>:</b>
      <?php echo CHtml::encode($data->urban_barrio); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('av_call_esq_carr')); ?>:</b>
      <?php echo CHtml::encode($data->av_call_esq_carr); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('zona')); ?>:</b>
      <?php echo CHtml::encode($data->zona); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ultimo_censo')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_ultimo_censo); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('protocolizado')); ?>:</b>
      <?php echo CHtml::encode($data->protocolizado); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_creacion); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_actualizacion')); ?>:</b>
      <?php echo CHtml::encode($data->fecha_actualizacion); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id_creacion')); ?>:</b>
      <?php echo CHtml::encode($data->usuario_id_creacion); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id_actualizacion')); ?>:</b>
      <?php echo CHtml::encode($data->usuario_id_actualizacion); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('estatus_beneficiario_id')); ?>:</b>
      <?php echo CHtml::encode($data->estatus_beneficiario_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('codigo_trab')); ?>:</b>
      <?php echo CHtml::encode($data->codigo_trab); ?>
      <br />

     */ ?>

</div>