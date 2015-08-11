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
                'actions' => array('BuscarSaime', 'BuscarCita', 'BuscarMunicipios', 'BuscarParroquias', 'GenerarPDF', 'BuscarUnidadHabitacional', 'BuscarPersonas', 'BuscarPersonasBeneficiario', 'BuscarDesarrolloBeneficiario', 'BuscarPisoVivienda', 'BuscarVivienda', 'BuscarTipoVivienda', 'BuscarPersonasBeneficiarioTemp', 'BuscarEncargadoOficina', 'BuscarPersonaAbogado', 'BuscarPersonaAsignacionCenso', 'BuscarBeneficiariosTemporalEmpadronador', 'AgregarAsignacionesEmpa', 'BuscarUnidadMulti', 'CargarPrograma'),
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

                // var_dump($existeTemporal); die();
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
                    'id_desarrollo' => $existeTemporal->desarrollo->id_desarrollo,
                    'id_unidadh' => $existeTemporal->unidadHabitacional->id_unidad_habitacional,
                    'vivienda_id' => $existeTemporal->vivienda->id_vivienda,
                    'construccion_mt2' => $existeTemporal->vivienda->construccion_mt2,
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
//                --$saime["FECHANACIMIENTO"] = date('d/m/Y',  strtotime($saime["FECHANACIMIENTO"]));
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
from desarrollo des Left join unidad_habitacional und_hab on des.id_desarrollo = und_hab.desarrollo_id  where  des.id_desarrollo = " . $id;

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
        $nacio = (int) $_POST['nacionalidad'];

        $existeTemporal = BeneficiarioTemporal::model()->findByAttributes(array('nacionalidad' => $nacio, 'cedula' => $cedula));

        if (empty($existeTemporal)) {

            $result = ConsultaOracle::getPersonaBeneficiario($nacio, $cedula);
            if ($result == 1) {
                $saime = ConsultaOracle::getSaimeBeneficiario($nacio, $cedula);
                // var_dump($saime);die();
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

    /**
     * FUNCION QUE BUSCA EN TABLA PERSONA Y SAIME. ASI COM TAMBIEN VALIDA QUE NO EXISTA EN TABLA OFICINA
     */
    public function actionBuscarEncargadoOficina() {
        $cedula = (int) $_POST['cedula'];
        $nacio = (int) $_POST['nacionalidad'];
        $result = ConsultaOracle::getPersona($nacio, $cedula); // Consulta de persona 
        if ($result != 1) {
            $ExisteJefeOficina = OficinaController::FindByIdPersona($result['ID']);
            if (!empty($ExisteJefeOficina)) {
                echo json_encode(1); // INDICA QUE LA PERSONA YA ASIGNADA A ALGUNA OFICINA
            } else {
                echo CJSON::encode($result);
            }
        } else {
            $saime = ConsultaOracle::getSaime($nacio, $cedula);
            if ($saime == 1)
                echo json_encode(2); //en caso que no exista en saime
            else
                echo CJSON::encode($saime);
        }
    }

    /*
     * FUNCION QUE BUSCA EN TABLA PERSONA Y SAIME. ASI COM TAMBIEN VALIDA QUE NO EXISTA EN TABLA ABOGADO
     */

    public function actionBuscarPersonaAbogado() {
        $cedula = (int) $_POST['cedula'];
        $nacio = (int) $_POST['nacionalidad'];
        $result = ConsultaOracle::getPersona($nacio, $cedula);
        if ($result != '1') {
            $exiteAbogado = AbogadosController::FindByIdPersona($result['ID']);
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

    /*
     * FUNCION QUE BUSCA EN TABLA PERSONA Y SAIME. ASI COM TAMBIEN VALIDA QUE NO EXISTA EN TABLA ASIGNACION DE CENSO
     */

    public function actionBuscarPersonaAsignacionCenso() {
        $cedula = (int) $_POST['cedula'];
        $nacio = (int) $_POST['nacionalidad'];
        $result = ConsultaOracle::getPersona($nacio, $cedula);
        if ($result != '1') {
            $exiteAsignacion = AsignacionCensoController::FindByIdPersona($result['ID']);
            if (!empty($exiteAsignacion))
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

    /*
     * BUSCAR BENEFICIARIOS DE UNIDA MULTIFAMILIAR
     */

    public function actionBuscarBeneficiariosTemporalEmpadronador() {
        $Id = (isset($_POST['EmpadronadorCenso']['UnidadMultifamiliar']) ? $_POST['EmpadronadorCenso']['UnidadMultifamiliar'] : $_GET['UnidadMultifamiliar']);
        $Selected = isset($_GET['piso']) ? $_GET['piso'] : '';

        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.unidad_habitacional_id= :unidad_habitacional_id AND t.estatus= :estatus');
            $criteria->params = array(':unidad_habitacional_id' => $Id, ':estatus' => 221);
//            $criteria->order = 't.nro_piso ASC';
//            $criteria->select = 'nro_piso';

            $data = CHtml::listData(BeneficiarioTemporal::model()->findAll($criteria), 'id_beneficiario_temporal', 'nombre_completo');
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

    /*
     * 
     */

    public function actionAgregarAsignacionesEmpa() {
        $asignacion = $_POST['asgnacion_censo'];
        /* */
        $existeEmpadronadorCenso = EmpadronadorCenso::model()->findByAttributes(array('asignacion_censo_id' => $asignacion, 'empadronador_usuario_id' => (int) $_POST['empadronador']));
        if (empty($existeEmpadronadorCenso)) {
            $empadronador = new EmpadronadorCenso;
            $empadronador->asignacion_censo_id = $asignacion;
            $empadronador->empadronador_usuario_id = (int) $_POST['empadronador'];
            $empadronador->estatus = 218;
            $empadronador->usuario_creacion = Yii::app()->user->id;
            $empadronador->fecha_creacion = 'now()';
            $empadronador->fecha_actualizacion = 'now()';
            if ($empadronador->save()) {
                $idEmpadronador = $empadronador->id_empadronador_censo;
            }
        } else {
            $idEmpadronador = $existeEmpadronadorCenso->id_empadronador_censo;
        }

        /* Lista A los beneficiarios temporal de la unidad familiar  */
        $unidadMulti = $_POST['UnidaMulti'];
        $Adjudicado = array();
        if ($_POST['BeneficiarioTemp'] != '') {
            $BeneficiarioTemp = $_POST['BeneficiarioTemp'];
            $result = BeneficiarioTemporal::model()->findByPk($BeneficiarioTemp);
            array_push($Adjudicado, $result);
        } else {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.unidad_habitacional_id= :unidad_habitacional_id AND  t.estatus= :estatus');
            $criteria->params = array(':unidad_habitacional_id' => $unidadMulti, ':estatus' => 221);
            $Adjudicado = BeneficiarioTemporal::model()->findAll($criteria);
        }
        /* Fin de Consulta */
        foreach ($Adjudicado AS $data) {
            $adjudicado_empadronador = new AdjudicadoEmpadronador;
            $adjudicado_empadronador->empadronador_censo_id = $idEmpadronador;
            $adjudicado_empadronador->beneficiario_temporal_id = $data->id_beneficiario_temporal;
            $adjudicado_empadronador->estatus = 214;
            $adjudicado_empadronador->usuario_creacion = Yii::app()->user->id;
            $adjudicado_empadronador->fecha_creacion = 'now()';
            $adjudicado_empadronador->fecha_actualizacion = 'now()';
            if ($adjudicado_empadronador->save()) {
                BeneficiarioTemporal::model()->updateByPk($data->id_beneficiario_temporal, array(
                    'estatus' => 20,
                    'usuario_id_actualizacion' => Yii::app()->user->id,
                    'fecha_actualizacion' => 'now()',
                ));
            }
        }
        echo json_encode(2);
    }

    /*
     * SELECT uh.nombre AS nombre_unidad_multifamiliar 
      FROM unidad_habitacional uh
      JOIN beneficiario_temporal bt ON bt.unidad_habitacional_id = uh.id_unidad_habitacional AND bt.estatus != 20 and bt.desarrollo_id = 28
      GROUP BY nombre_unidad_multifamiliar
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

    public function actionCargarPrograma() {
        $fuente_financiemiento = (isset($_POST['Desarrollo']['fuente_financiamiento_id']) ? $_POST['Desarrollo']['fuente_financiamiento_id'] : $_GET['fuente_financiamiento_id']);
        $Selected = isset($_GET['fuente_financiamiento_id']) ? $_GET['fuente_financiamiento_id'] : '';

        if (!empty($fuente_financiemiento)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.fuente_financiamiento_id = :fuente_financiamiento_id');
            $criteria->params = array(':fuente_financiamiento_id' => $fuente_financiemiento);
            $data = CHtml::listData(Programa::model()->findAll($criteria), 'id_programa', 'nombre_programa');
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('SELECCIONE'), true);
            foreach ($data as $id => $value) {
                if ($Selected == $id) {
                    echo CHtml::tag('option', array('value' => $id, 'selected' => true), CHtml::encode($value), true);
                } else {
                    echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
                }
            }
        }
    }

    public function actionNroVivienda() {
        $habitacional = $_POST['habitacional'];
        $vivienda = $_POST['vivienda'];
        $piso = $_POST['piso'];

        $criteria = new CDbCriteria;
        $criteria->addCondition('t.unidad_habitacional_id = :id_unidad_habitacional and t.nro_piso = :nro_piso  and t.nro_vivienda= :nro_vivienda   ');
        $criteria->params = array(':id_unidad_habitacional' => $habitacional, ':nro_piso' => $piso, ':nro_vivienda' => $vivienda);

        $existeVivienda = Vivienda::model()->findAll($criteria);
//        var_dump($existeVivienda);
//        die();
        if (!empty($existeVivienda)) {
            echo CJSON::encode(2); //existe número vivienda
        } else {
            echo CJSON::encode(1);
        }
    }

    public function actionCambioEstatus() {
        
        $idValue = $_POST['value'];
        $idSolicitud = $_POST['idSolicitud'];

        $result = RegistroPublico::model()->updateByPk($idSolicitud, array('estatus' => $idValue));
        echo '<pre>';
                var_dump($result);
                                die();
        if ($result) {
            echo json_encode(1);
        }
    }

}
