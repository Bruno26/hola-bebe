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
                'actions' => array('CalculoTasaAmortizacion'),
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

    public function actionCalculoTasaAmortizacion() {
        //echo CJSON::encode(1);
        echo '<pre>';
        var_dump($_POST);
        die;
    }

}
