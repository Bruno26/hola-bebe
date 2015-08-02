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
                'actions' => array('CuotaFinancieraMaxima', 'MaximaCapacidadPago', 'CreditoSolicitado'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /*
     * Cuota Finaciera Máxima (35% IFM)
     */

    public function actionCuotaFinancieraMaxima($ingresoFamiliar) {
        return $ingresoFamiliar * 0.35;
    }

    /*
     * Maxima Capacidad Pago
     */

    public function actionMaximaCapacidadPago($interes, $anhios, $CuotaFinanaciadaMaxima) {
        $I = $interes / 12 / 100;
        $PREEXP = 1 + $I;
        $EXP = pow($PREEXP, -($anhios * 12));

        $MCP = $CuotaFinanaciadaMaxima * (1 - $EXP ) / $I;
        return number_format($MCP, 2, ',', '');
    }

    /*
     * Monto Credito Solicitado
     */

    public function actionCreditoSolicitadp($inicial, $costoViviendo) {
        return $costoViviendo - $inicial;
    }

    /*
     * Cuota Inicial Fondo de Garantía (1,43%)
     */

    public function actionCreditoSolicitado($CreditoSolicitado) {
        return $CreditoSolicitado * 0.0143;
    }

    /*
     * Maxima Capacidad Pago
     */

    /*   public function actionMaximaCapacidadPago($interes, $anhios, $CuotaFinanaciadaMaxima) {
      $I = $interes / 12 /100;
      $PREEXP = 1 + $I;
      $EXP = pow($PREEXP, -($anhios * 12));

      $MCP = $CuotaFinanaciadaMaxima * (1 - $EXP ) / $I;
      return number_format($MCP, 2, ',', '');

      } */
}
