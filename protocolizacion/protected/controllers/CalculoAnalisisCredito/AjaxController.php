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
                'actions' => array('BuscarSaime', 'BuscarCita', 'BuscarMunicipios', 'BuscarParroquias', 'GenerarPDF', 'BuscarUnidadHabitacional', 'BuscarPersonas', 'BuscarPersonasBeneficiario', 'BuscarDesarrolloBeneficiario', 'BuscarPisoVivienda', 'BuscarVivienda', 'BuscarTipoVivienda', 'BuscarPersonasBeneficiarioTemp', 'BuscarEncargadoOficina', 'BuscarPersonaAbogado', 'BuscarPersonaAsignacionCenso', 'BuscarBeneficiariosTemporalEmpadronador', 'AgregarAsignacionesEmpa', 'BuscarUnidadMulti', 'CargarPrograma'),
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

    public function actionBuscarUnidadMulti() {
        $Id = (isset($_POST['Tblestado']['clvcodigo']) ? $_POST['Tblestado']['clvcodigo'] : $_GET['id_desarrollo']);
        $Selected = isset($_GET['municipio']) ? $_GET['municipio'] : '';
        if (!empty($Id)) {
            $sql = "SELECT uh.id_unidad_habitacional, uh.nombre AS nombre_unidad_multifamiliar 
                FROM unidad_habitacional uh
                JOIN beneficiario_temporal bt ON bt.unidad_habitacional_id = uh.id_unidad_habitacional AND bt.estatus != 20 and bt.desarrollo_id = " . $Id . "
                GROUP BY nombre_unidad_multifamiliar,uh.id_unidad_habitacional";
            //$connection = Yii::app()->db->createCommand($sql)->queryAll(); // echo '<pre>'; var_dump($row); exit();

            $data = CHtml::listData(Yii::app()->db->createCommand($sql)->queryAll(), 'id_unidad_habitacional', 'nombre_unidad_multifamiliar');
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('SELECCIONE'), true);
            foreach ($data as $id => $value) {
                if ($Selected == $id) {
                    echo CHtml::tag('option', array('value' => $id, 'selected' => true), CHtml::encode($value), true);
                } else {
                    echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
                }
            }
        } else {
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('SELECCIONE'), true);
        }
    }

}
