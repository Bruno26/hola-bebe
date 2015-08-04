<?php
//$this->breadcrumbs=array(
//	'Beneficiario Temporals'=>array('index'),
//	$model->id_beneficiario_temporal=>array('view','id'=>$model->id_beneficiario_temporal),
//	'Update',
//);
//
//	$this->menu=array(
//	array('label'=>'List BeneficiarioTemporal','url'=>array('index')),
//	array('label'=>'Create BeneficiarioTemporal','url'=>array('create')),
//	array('label'=>'View BeneficiarioTemporal','url'=>array('view','id'=>$model->id_beneficiario_temporal)),
//	array('label'=>'Manage BeneficiarioTemporal','url'=>array('admin')),
//	);
//	
?>

        <!--<h1>Actualizar Adjudicado//<?php // echo $model->id_beneficiario_temporal;    ?></h1>-->

<?php
// echo $this->renderPartial('_form',array('model'=>$model)); 

$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'beneficiario-temporal-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        // 'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>
<?php
if (!empty($model->desarrollo_id)) {
    $id_desarrollo = Desarrollo::model()->findByPk($model->desarrollo_id); // consulta en la tabla ciudad el id_ciudad y id_estado 
    $id_parroquia = $id_desarrollo->parroquia_id;
    $id_municipio = $id_desarrollo->fkParroquia->clvmunicipio0->clvcodigo;
    $id_estado = $id_desarrollo->fkParroquia->clvmunicipio0->clvestado0->clvcodigo;

//    var_dump($model->desarrollo_id); die();
}
?>
<?php Yii::app()->clientScript->registerScript('desarrollo', "

      $(document).ready(function(){
       $('#Tblestado_clvcodigo').val(" . $id_estado . ");
 
         $.get('" . CController::createUrl('ValidacionJs/BuscarMunicipios') . "', {clvcodigo: " . $id_estado . " }, function(data){
                $('#Tblmunicipio_clvcodigo').html(data);
                $('#Tblmunicipio_clvcodigo').val(" . $id_municipio . ");
                
            });
            $.get('" . CController::createUrl('ValidacionJs/BuscarParroquias') . "', {municipio: " . $id_municipio . "}, function(data){
                $('#Tblparroquia_clvcodigo').html(data);
                $('#Tblparroquia_clvcodigo').val(" . $id_parroquia . ");
            });
           
            $.get('" . CController::createUrl('ValidacionJs/BuscarDesarrollo') . "', {desarrollo: " . $id_parroquia . "}, function(data){
                $('#Desarrollo_id_desarrollo').html(data);
                $('#Desarrollo_id_desarrollo').val(" . $model->desarrollo_id . ");
            });
        });



        ") ?>
<?php
//  var_dump($_GET); die();
$id_adjudicado = $_GET['id'];
?>


<h1>Modificar Adjudicado</h1>
<br><br>


<?php
$this->widget(
        'booster.widgets.TbLabel', array(
    'context' => 'warning',
    'htmlOptions' => array('style' => 'padding:3px;text-aling:center; font-size:13px; span{color:red;}'),
    // 'success', 'warning', 'important', 'info' or 'inverse'
    'label' => 'Los campos marcados con * son requeridos',
        )
);
?>
<br><br>
<div class="row">
    <div class="col-md-12">
        <?php
        /* ------------  Datos Beneficiario  --------- */

        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Beneficiario',
            'context' => 'primary',
            'headerIcon' => 'user',
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
            'content' => $this->renderPartial('_form', array('form' => $form, 'model' => $model), TRUE),
                #'content' => $this->renderPartial('_form', array('model'=>$model),TRUE),
                )
        );
        echo '<br>';
        /*  ------------------------------------------ */

        /*         * ******  Caracteristicas del Desarrollo   ****** */


        $this->widget(
                'booster.widgets.TbPanel', array(
            'title' => 'Características del Desarrollo',
            'headerIcon' => 'user',
            'context' => 'primary',
            'headerIcon' => 'home',
            'headerHtmlOptions' => array('style' => 'background-color: #1fb5ad !important;color: #FFFFFF !important;'),
            'content' => $this->renderPartial('_desarrollo', array(
                'form' => $form, 'model' => $model,
                'estado' => $estado, 'municipio' => $municipio,
                'parroquia' => $parroquia, 'desarrollo' => $desarrollo
                    ), TRUE),
                )
        );

        /*         * ********************************************** */


        /*  +++++++++++++  Grupo Familiar    +++++++++ */



        /*  ++++++++++++++++++++++++++++++++++++++++++ */
        ?>
    </div>
</div>

<br>

<div class="form-actions">


    <div class="well">
        <div class="pull-center" style="text-align: right;">
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'icon' => 'glyphicon glyphicon-floppy-saved',
                'size' => 'large',
                'id' => 'guardar',
                'context' => 'primary',
                'label' => $model->isNewRecord ? 'Guardar' : 'Guardar',
            ));
            ?>


            <?php
            $this->widget('booster.widgets.TbButton', array(
                'context' => 'danger',
                'label' => 'Cancelar',
                'size' => 'large',
                'id' => 'CancelarForm',
                'icon' => 'ban-circle',
                'htmlOptions' => array(
                    'onclick' => 'document.location.href ="' . $this->createUrl('admin') . '";'
                )
            ));
            ?>
        </div>
    </div>

</div>

<?php $this->endWidget(); ?>

