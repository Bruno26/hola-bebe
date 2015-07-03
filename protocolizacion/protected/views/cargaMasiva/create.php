<?php
$this->breadcrumbs=array(
	'Carga Masivas'=>array('index'),
	'Create',
);
?>

<h1>Realizar Carga Masiva</h1>

<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>

<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget(
            'booster.widgets.TbPanel', array(
            'title' => 'Carga Masiva - ',
            'context' => 'info',
            'headerHtmlOptions' => array('style' => 'background: linear-gradient(#1fb5ad, #1fd0ff) !important;color: #FFFFFF !important;'),
            'headerIcon' => 'glyphicon glyphicon-list-alt',
            'content' => $this->renderPartial('_form', array( 'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'desarrollo' => $desarrollo ), TRUE),)
        );
        ?>
    </div>
</div>
