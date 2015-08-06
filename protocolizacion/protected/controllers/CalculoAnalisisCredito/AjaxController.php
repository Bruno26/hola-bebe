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
                'actions' => array('TipoInterresAplicable','CalculoTasaAmortizacion'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /*
     * FUNCTION QUE DETERMINAL EL TIPO DE INTERES APLICABLE SEGUN CADA CASO
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
            case ($cantidadSalarios > 8):
                $cantidad = 4;
                break;
        }
        echo CJSON::encode($cantidad);
    }
    
    /*
     * 
     */

    public function actionCalculoTasaAmortizacion() {
    	$fuenteFinanciamineto = $_POST['fuenteFinanciamineto'];
    	$programa = $_POST['programa'];
    	$montoInical = $_POST['montoInical'];
    	$montoVivienda = $_POST['montoVivienda'];
    	$idUnidadFamiliar = $_POST['idUnidadFamiliar'];
    	$igresoFamiliar =  $_POST['valorSalario'];
    	$tasaInteres = TasaInteres::model()->findByPk($_POST['tasaInteres'])->tasa_interes;
    	$plazoCredito = $_POST['plazoCredito'];
    	$fechaProtocolizacion = Generico::formatoFecha($_POST['fechaProtocolizacion']);

        
        $CuotaFinanciamientoMaximo = CalculosController::actionCuotaFinancieraMaxima($igresoFamiliar);
        $CapacidadPago = CalculosController::actionMaximaCapacidadPago($tasaInteres, $plazoCredito, $CuotaFinanciamientoMaximo);
        $CreditoSolicitado = CalculosController::actionCreditoSolicitado($montoInical, $montoVivienda);
        
        
        if ($fuenteFinanciamineto == '2') { // FUENTE DE FINANCIAMIENTO FAOV
//        	$subsidio = FaspController::actionSubsidio($CapacidadPago, $montoVivienda);
        }else if ($fuenteFinanciamineto == '3') {  // FUENTE DE FINANCIAMIENTO FASP
            $subsidio = FaspController::actionSubsidio($CapacidadPago, $montoVivienda,$idUnidadFamiliar);
            
        }

    }



}
