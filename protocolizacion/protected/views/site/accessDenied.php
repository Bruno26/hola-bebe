<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="text-center col-md-12" style="background-color: white">
    <img src="<?= Yii::app()->baseUrl ?>/images/acceso_denegado.jpg" width="80%"/>
</div>

<?php if (Yii::app()->user->isGuest) { ?>
    <div class="text-center col-md-12" style="margin-top: 1%">
        <a class="btn btn-success btn-lg" href="<?php echo Yii::app()->baseUrl ?>/cruge/ui/login"><i class="glyphicon glyphicon-lock"></i> Iniciar Sesión</a>
    </div>
<?php } ?>

