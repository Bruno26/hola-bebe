<?php

class CalculosController extends Controller {
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
                'actions' => array('CuotaFinanaciadaMaxima'),
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

    public function actionCuotaFinanaciadaMaxima($ingresoFamiliar) {
        return $ingresoFamiliar * 0.35;
    }

}
