<?php

class ValidacionJsController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//public $layout='//layouts/column2';

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
                'actions' => array('BuscarSaime', 'BuscarCita', 'BuscarMunicipios', 'BuscarParroquias', 'GenerarPDF', 'BuscarUnidadHabitacional', 'BuscarPersonas'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * FUNCION QUE MUESTRA TODOS LOS MUNICIPIO DE ACUERDO A UN ID DE UN ESTADO
     */
    public function actionBuscarPersonas() {
        $cedula = (int) $_POST['cedula'];
        $nacio = $_POST['nacionalidad'];
        $result = ConsultaOracle::getPersona($nacio, $cedula);
        if ($result == 1) {
            $saime = ConsultaOracle::getSaime($nacio, $cedula);
//            var_dump($saime);die;
            if ($saime == 1)
                echo json_encode(2); //en caso que no exista en saime
            else
                echo CJSON::encode($saime);
        }else {
            echo json_encode($result);
        }
//        var_dump($result);die;
    }

    public function actionBuscarMunicipios() {
        $Id = (isset($_POST['Tblestado']['clvcodigo']) ? $_POST['Tblestado']['clvcodigo'] : $_GET['clvcodigo']);
        $Selected = isset($_GET['municipio']) ? $_GET['municipio'] : '';

        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.clvestado = :clvestado');
            $criteria->params = array(':clvestado' => $Id);
            $criteria->order = 't.strdescripcion ASC';
            $criteria->select = 'clvcodigo, strdescripcion';

            $data = CHtml::listData(Tblmunicipio::model()->findAll($criteria), 'clvcodigo', 'strdescripcion');
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

    /**
     * FUNCION QUE MUESTRA TODOS LAS PARROQUIAS DE ACUERDO A UN ID DE UN MUNICIPIO
     */
    public function actionBuscarParroquias() {
        $Id = (isset($_POST['Tblmunicipio']['clvcodigo']) ? $_POST['Tblmunicipio']['clvcodigo'] : $_GET['municipio']);
        $Selected = isset($_GET['parroquia']) ? $_GET['parroquia'] : '';
        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.clvmunicipio = :clvmunicipio');
            $criteria->params = array(':clvmunicipio' => $Id);
            //$criteria->order = 't.parroquia ASC';
            $criteria->select = 'clvcodigo, strdescripcion';
            $data = CHtml::listData(Tblparroquia::model()->findAll($criteria), 'clvcodigo', 'strdescripcion');
            //var_dump($data);die;

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

    /**
     * FUNCION QUE MUESTRA TODOS LAS PARROQUIAS DE  
     */
    public function actionBuscarDesarrollo() {
        $Id = (isset($_POST['Tblparroquia']['clvcodigo']) ? $_POST['Tblparroquia']['clvcodigo'] : $_GET['clvcodigo']);
        $Selected = isset($_GET['desarrollo']) ? $_GET['desarrollo'] : '';

        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.parroquia_id = :parroquia_id');
            $criteria->params = array(':parroquia_id' => $Id);
            $criteria->order = 't.nombre ASC';
            $criteria->select = 'id_desarrollo, nombre';

            $data = CHtml::listData(Desarrollo::model()->findAll($criteria), 'id_desarrollo', 'nombre');
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

    /**
     * FUNCION QUE MUESTRA TODOS LAS PARROQUIAS DE  
     */
    public function actionBuscarUnidadHabitacional() {
        $Id = (isset($_POST['Desarrollo']['id_desarrollo']) ? $_POST['Desarrollo']['id_desarrollo'] : $_GET['clvcodigo']);
        $Selected = isset($_GET['unidadHabitacion']) ? $_GET['unidadHabitacion'] : '';

        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.desarrollo_id= :desarrollo_id');
            $criteria->params = array(':desarrollo_id' => $Id);
            $criteria->order = 't.nombre ASC';
            $criteria->select = 'id_unidad_habitacional, nombre';

            $data = CHtml::listData(UnidadHabitacional::model()->findAll($criteria), 'id_unidad_habitacional', 'nombre');
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
