
<div class="alert alert-info">
    <i class="icon-info-sign"></i>
    <h4><center> 
    Para realizar la carga masiva de adjudicados adjunte el <b>archivo .csv</b> que desea importar dando clic en el boton 
    <b>"Examinar"</b>. Una vez seleccionado el archivo de clic en el boton <b>"Subir archivo"</b>; el sistema evaluará que el archivo cumpla con todos los parametros requeridos y 
    procedera a guardar en el sistema. 
    <br/>
    </center></h4>
</div>


<?php $this->beginWidget('booster.widgets.TbModal', array('id'=>'modal')); ?>

<div class="modal-header" >
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Indicaciones y recomendaciones carga masiva</h4>
</div>
<div class="modal-body">
<?php echo $this->renderPartial('instrucciones', array('model'=>$model));  // I need $productId to by dynamic related to link 
                ?>   
</div>
<div class="modal-footer">
    <?php $this->widget('booster.widgets.TbButton', array(
        'label'=>'Cerrar',
        'icon' => 'glyphicon glyphicon-chevron-left',
        'context' => 'danger',        
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>

<?php $this->endWidget(); ?>
 <div class="pull-left">
<?php 
    $this->widget('booster.widgets.TbButton', array(
        //'type'=>'primary',
        'label' => 'Archivo maestro',
        'icon' => 'glyphicon glyphicon-download',
        'context' => 'success',
        'buttonType' => 'link',
        'url' => Yii::app()->baseUrl.'/doc/carga_masiva.csv',
        ));
?>    
<?php 
    $this->widget(
    'booster.widgets.TbButton',
    array(
        'label' => 'Leer Instrucciones',
        'icon' => 'glyphicon glyphicon-eye-open',
        'context' => 'info',
        'htmlOptions' => array(
            'data-toggle' => 'modal',
            'data-target' => '#modal',
        ),
    )
);
?>
</div>

<br/><br/><br/>
<div class="row">
    <div class="col-md-4">

        <?php
        $criteria = new CDbCriteria;
        $criteria->order = 'strdescripcion ASC';
        echo $form->dropDownListGroup($estado, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
            'widgetOptions' => array(
                'data' => CHtml::listData(Tblestado::model()->findAll($criteria), 'clvcodigo', 'strdescripcion'),
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarMunicipios'),
                        'update' => '#' . CHtml::activeId($municipio, 'clvcodigo'),
                    ),
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">
        <?php
        echo $form->dropDownListGroup($municipio, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12',),
            'widgetOptions' => array(
                'htmlOptions' => array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarParroquias'),
                        'update' => '#' . CHtml::activeId($parroquia, 'clvcodigo'),
                    ),
                    'empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">

        <?php
        echo $form->dropDownListGroup($parroquia, 'clvcodigo', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar',),
            'widgetOptions' => array(
                'htmlOptions' => array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('ValidacionJs/BuscarDesarrollo'),
                        'update' => '#' . CHtml::activeId($unidadHabitacional, 'desarrollo_id'),
                    ),
                    'empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>

</div>
<div class="row">
    <div class='col-md-4'>
        <?php
        echo $form->dropDownListGroup($unidadHabitacional, 'desarrollo_id', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'htmlOptions' => array('empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>


</div>


<?php
$this->widget('booster.widgets.TbAlert', array(
    //  'block' => true, // display a larger alert block?
    'fade' => true, // use transitions?
    'closeText' => '×', // close link text - if set to false, no close link is displayed
    'alerts' => array(// configurations per alert type
        'error' => array('block' => true, 'fade' => true, 'closeText' => '×'), // success, info, warning, error or danger
    ),
));
?>

<?php echo $form->errorSummary($model); ?>
<fieldset>
    <legend>Buscar archivo</legend>
    <div class='well'>
        <div class='span4'>
            <?php echo CHtml::label('<b>Seleccione archivo csv</b> <span class="required"> *</span>', ''); ?>
            <?php
            echo $form->fileField($model, 'nombre_archivo');
            echo $form->error($model, 'nombre_archivo');
            ?>

        </div>
    </div>
</fieldset>
<br><br>



<div class="form-actions">
    <div class="pull-right">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'icon' => 'glyphicon glyphicon-cloud-upload',
            'context' => 'primary',
            'size' => 'large',
            'id' => 'subirArchivo',
            'label' => 'Subir archivo',
        ));
        ?>

        <?php
        $this->widget('booster.widgets.TbButton', array(
            //'type'=>'primary',
            'label' => 'Regresar',
            'icon' => 'glyphicon glyphicon-chevron-left',
            'size' => 'large',
            'context' => 'danger',
            'buttonType' => 'link',
            'url' => CHtml::normalizeUrl(array('admin')),
        ));
        ?>
    </div>
</div>




