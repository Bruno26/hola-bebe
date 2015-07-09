<div class="row">
    <div class="col-md-2">
        <?php
        echo $form->dropDownListGroup($beneficiario, 'nacionalidad', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar','disabled'=>'disabled'),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(96, 'descripcion DESC'),
                'htmlOptions' => array('empty' => 'SELECCIONE'),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-8">

    </div>
</div>