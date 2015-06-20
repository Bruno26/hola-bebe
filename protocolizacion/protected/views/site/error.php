<?php

?>
<?php
switch ($code) {
    case 404:
        ?>
        <div class="text-center col-md-12" style="background-color: white">
            <img src="<?= Yii::app()->baseUrl ?>/images/error404notfound.png" width="80%"/>
        </div>
        <?php
        break;
    case 400:
        ?>
        <div class="text-center col-md-12" style="background-color: white">
            <img src="<?= Yii::app()->baseUrl ?>/images/400.png" width="80%"/>
        </div>
        <?php
        break;
    default :
        ?>
        <h2>Error <?php echo $code; ?></h2>

        <div class="error">
            <?php echo CHtml::encode($message); ?>
        </div>
        <?php
        break;
}
?>