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
                'actions' => array('BuscarSaime', 'BuscarCita', 'BuscarMunicipios', 'BuscarParroquias', 'GenerarPDF', 'BuscarUnidadHabitacional', 'BuscarPersonas', 'BuscarPersonasBeneficiario', 'BuscarDesarrolloBeneficiario', 'BuscarPisoVivienda', 'BuscarVivienda', 'BuscarTipoVivienda', 'BuscarPersonasBeneficiarioTemp'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * FUNCION QUE BUSCA EN TABLA COMUNES EL ID PERSONA , SI NO EXISTE CONSULTA EN SAIME 
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
            echo CJSON::encode($result);
        }
//        var_dump($result);die;
    }

    public function actionBuscarPersonasBeneficiario() {
        $cedula = (int) $_POST['cedula'];
        $nacio = (int) $_POST['nacionalidad'];

        $existeTemporal = BeneficiarioTemporal::model()->findByAttributes(array('nacionalidad' => $nacio, 'cedula' => $cedula));

        if (!empty($existeTemporal)) {
            $consultaPer = ConsultaOracle::getPersonaBeneficiario($nacio, $cedula);
            if ($consultaPer == 1) {
                echo CJSON::encode(3); // existe en Persona
            } else {
                $desarrollo = array(
                    'nro_vivienda' => $existeTemporal->vivienda->nro_vivienda,
                    'nro_piso' => $existeTemporal->vivienda->nro_piso,
                    'tipo_vivienda_id' => $existeTemporal->vivienda->tipoVivienda->descripcion,
                    'nomb_edif' => $existeTemporal->unidadHabitacional->nombre,
                    'lote_terreno_mt2' => $existeTemporal->desarrollo->lote_terreno_mt2,
                    'zona' => $existeTemporal->desarrollo->zona,
                    'av_call_esq_carr' => $existeTemporal->desarrollo->av_call_esq_carr,
                    'urban_barrio' => $existeTemporal->desarrollo->urban_barrio,
                    'nombre' => $existeTemporal->desarrollo->nombre,
                    'parroquia_id' => $existeTemporal->desarrollo->fkParroquia->strdescripcion,
                    'municipio' => $existeTemporal->desarrollo->fkParroquia->clvmunicipio0->strdescripcion,
                    'estado' => $existeTemporal->desarrollo->fkParroquia->clvmunicipio0->clvestado0->strdescripcion,
                    'Temp' => $existeTemporal->id_beneficiario_temporal,
                );
                $salida = array('persona' => $consultaPer, 'desarrollo' => $desarrollo);
                echo CJSON::encode($salida);
            }
        } else {
            echo CJSON::encode(2); //no existe en temporal
        }
    }

    public function actionBuscarPersonasBeneficiarioTemp() {
        $cedula = (int) $_POST['cedula'];
        $nacio = (int) $_POST['nacionalidad'];

        $existeTemporal = BeneficiarioTemporal::model()->findByAttributes(array('nacionalidad' => $nacio, 'cedula' => $cedula));

        if (empty($existeTemporal)) {


            $result = ConsultaOracle::getPersonaBeneficiario($nacio, $cedula);
            if ($result == 1) {
                $saime = ConsultaOracle::getSaimeBeneficiario($nacio, $cedula);
                //var_dump($saime);die();
                if ($saime == 1)
                    echo json_encode(2); //en caso que no exista en saime
                else
                    echo CJSON::encode($saime);
            }else {
                echo CJSON::encode($result);
            }
        } else {
            echo CJSON::encode(3); // Existe en temporal
        }
    }

    /*  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

    public function actionBuscarPisoVivienda() {



        $Id = (isset($_POST['BeneficiarioTemporal']['unidad_habitacional_id']) ? $_POST['BeneficiarioTemporal']['unidad_habitacional_id'] : $_GET['piso']);
        $Selected = isset($_GET['piso']) ? $_GET['piso'] : '';


        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.unidad_habitacional_id = :id_unidad_habitacional');
            $criteria->params = array(':id_unidad_habitacional' => $Id);
            $criteria->order = 't.nro_piso ASC';
            $criteria->select = 'nro_piso';

            $data = CHtml::listData(Vivienda::model()->findAll($criteria), 'nro_piso', 'nro_piso');
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

    /*  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /*  /////////////////////////////////////////////////////////////////////// */

    public function actionBuscarVivienda() {


        $Id = (isset($_POST['BeneficiarioTemporal']['piso']) ? $_POST['BeneficiarioTemporal']['piso'] : $_GET['piso']);
        $Selected = isset($_GET['vivienda_nro']) ? $_GET['vivienda_nro'] : '';

        $PISO = (int) (isset($_POST['BeneficiarioTemporal']['piso']) ? $_POST['BeneficiarioTemporal']['piso'] : 0);

        // var_dump($PISO); die();

        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            //$criteria->addCondition('t.unidad_habitacional_id = :id_unidad_habitacional');
            $criteria->addCondition('nro_piso=:nro_piso');
            $criteria->params['nro_piso'] = $Id;

            $criteria->addCondition('asignada=:asignada');
            $criteria->params['asignada'] = 0;

            // $criteria->params = array(':asignada' => 0);
            /* if($PISO != '')
              $criteria->params = array('nro_piso' => (int) $PISO); */

            $criteria->order = 'nro_vivienda ASC';
            $criteria->select = 'nro_vivienda,id_vivienda';

            //  var_dump($criteria); die();

            $data = CHtml::listData(Vivienda::model()->findAll($criteria), 'id_vivienda', 'nro_vivienda');
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

    /*  /////////////////////////////////////////////////////////////////////// */

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
        $Id = (isset($_POST['Tblparroquia']['clvcodigo']) ? $_POST['Tblparroquia']['clvcodigo'] : $_GET['desarrollo']);
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
     *     Datos del Desarrollo
     */
    public function actionBuscarDesarrolloBeneficiario() {
        $id = $_POST['id_desarrollo'];

        if (!empty($id)) {

            $sql = "select des.nombre,des.zona As sector, des.urban_barrio , des.av_call_esq_carr As Av_calle , und_hab.nombre AS nomb_edif
from desarrollo des Left join unidad_habitacional und_hab on des.id_desarrollo = und_hab.desarrollo_id ";

            $data = Yii::app()->db->createCommand($sql)->queryRow();

            // var_dump($data); die();
            if (!empty($data)) {
                echo json_encode($data);
            } else {
                echo json_encode('vacio');
            }
        }
    }

    /**
     * FUNCION QUE MUESTRA TODOS LAS PARROQUIAS DE  
     */
    public function actionBuscarUnidadHabitacional() {
        $Id = (isset($_POST['Desarrollo']['id_desarrollo']) ? $_POST['Desarrollo']['id_desarrollo'] : $_GET['unidad']);
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

    public function actionBuscarBeneficiarioAnterior() {
        $cedula = (int) $_POST['cedula'];
        $nacionalidad = $_POST['nacionalidad'];
        $nacionalidad = $_POST['nacionalidad'];

        $consultaBeneficiarioTmp = BeneficiarioTemporal::model()->findByAttributes(array('cedula' => $cedula, 'nacionalidad' => $nacionalidad));

        if (empty($consultaBeneficiarioTmp)) {
            //NO SE ENCUENTRA EN TABLA BeneficiarioTemporal
            echo json_encode(1);
        } else {
            echo CJSON::encode($consultaBeneficiarioTmp);
        }
    }

//    public function actionBuscarBeneficiarioAnterior() {
//        $cedula = (int) $_POST['cedula'];
//        $nacionalidad = $_POST['nacionalidad'];
//        $caso = $_POST['caso']; //caso 1 es BenefiiarioAnterior && caso 2 es BenefciarioActual
//
//        $consultaBeneficiarioTmp = BeneficiarioTemporal::model()->findByAttributes(array('cedula' => $cedula, 'nacionalidad' => $nacionalidad));
//        if (!empty($consultaBeneficiarioTmp)) {
//            //FUNCION QUE BUSCA AL BENFICIARIO ANTERIOR
//            if ($consultaBeneficiarioTmp->estatus == 20 && $caso == 1) {
//                echo CJSON::encode($consultaBeneficiarioTmp);
//            } else if ($caso == 2 && $consultaBeneficiarioTmp->estatus == 21) {
//                //CONSULTA SI EXITE EN BENEFICIARIO
//                $Beneficiario = Beneficiario::model()->findByAttributes(array('persona_id' => $consultaBeneficiarioTmp->persona_id));
//                if (!empty($Beneficiario)) {
//                    echo CJSON::encode($consultaBeneficiarioTmp);
//                } else {
//                    echo json_encode(1);
//                }
//            }
//            //NO SE ENCUENTRA EN TABLA BeneficiarioTemporal
//        } else
//            echo json_encode(1);
//    }

    public function actionBuscarPersonasFamiliar() {
        $cedula = (int) $_POST['cedula'];
        $nacio = (int) $_POST['nacionalidad'];

        $result = ConsultaOracle::getPersona($nacio, $cedula);

        if ($result != '1') {
            $ExisteGrupoFamiliar = GrupoFamiliarController::FindByIdPersona($result['ID']);
            $ExisteBeneficiario = Beneficiario::model()->findByAttributes(array('persona_id' => $result['ID']));
            if (!empty($ExisteGrupoFamiliar) || !empty($ExisteBeneficiario))
                echo json_encode(1);
            else {
                $faov = ConsultaOracle::getFaov($result['ID'], 1);
                $salida = array('persona' => $result, 'faov' => $faov);
                echo CJSON::encode($salida);
            }
        } else {
            $saime = ConsultaOracle::getSaime($nacio, $cedula);
            if ($saime == '1') {
                echo json_encode(2);
            } else {
                $salida = array('persona' => $saime, 'faov' => '0.00');
                echo CJSON::encode($salida);
            }
        }
    }

    public function actionBuscarPersonaAbogado() {
        $cedula = (int) $_POST['cedula'];
        $nacio = (int) $_POST['nacionalidad'];
        $result = ConsultaOracle::getPersona($nacio, $cedula);
        if ($result != '1') {
            $exiteAbogado = Abogados::FindByIdPersona($result['ID']);
            if (!empty($exiteAbogado))
                echo json_encode(1); //alert que ya existe
            else
                echo CJSON::encode($result); //devuelve los datos de persona
        }else {
            $saime = ConsultaOracle::getSaime($nacio, $cedula);
            if ($saime == '1') {
                echo json_encode(2); //alert que ya existe
            } else {
                echo CJSON::encode($saime);
            }
        }
    }

}
