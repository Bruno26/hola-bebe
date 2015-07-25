<?php

class AjaxController extends Controller {
    /**
     * @return array action filters
     */
//    public function filters() {
//        return array(array('CrugeAccessControlFilter'));
//    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('TipoInterresAplicable'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /*
     * 
     */

    public function actionTipoInterresAplicable() {
        $SalarioFamiliar = (float) $_POST['SalarioFamiliar'];
        $SueldoMinimo =  str_replace(".", "", Maestro::model()->findByPk(238)->descripcion);
        $cantidadSalarios = round($SalarioFamiliar / $SueldoMinimo);
       
        switch ($cantidadSalarios){
            case ($cantidadSalarios >= 1 && $cantidadSalarios <= 4):
                $cantidad = 1;
                break;
            case ($cantidadSalarios > 4 && $cantidadSalarios <= 6):
                $cantidad = 2;
                break;
            case ($cantidadSalarios > 6 && $cantidadSalarios <= 8):
                $cantidad = 3;
                break;
            case ($cantidadSalarios > 8 && $cantidadSalarios <= 10):
                $cantidad = 4;
                break;
        }
        echo CJSON::encode($cantidad);
    }
}
