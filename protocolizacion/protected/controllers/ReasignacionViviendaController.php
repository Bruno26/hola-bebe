<?php

class ReasignacionViviendaController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array('accessControl', array('CrugeAccessControlFilter'), // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('*'),
                'users' => array('@'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $model = new ReasignacionVivienda;
        $beneficiarioTemporal = BeneficiarioTemporal::model()->findByPk($id);

        if (!empty($beneficiarioTemporal)) {
            $model->beneficiario_id_anterior = $beneficiarioTemporal->id_beneficiario_temporal;
            $model->nacionalidadAnterior = $beneficiarioTemporal->nacionalidad;
            $model->cedulaAnterior = $beneficiarioTemporal->cedula;
            $model->nombreCompletoAnterior = $beneficiarioTemporal->nombre_completo;
            $model->id_desarrollo = $beneficiarioTemporal->desarrollo->id_desarrollo;
            $model->desarrollo = $beneficiarioTemporal->desarrollo->nombre;
            $model->unidad_habitacional = $beneficiarioTemporal->unidadHabitacional->nombre;
            $model->id_unidad_habitacional = $beneficiarioTemporal->unidadHabitacional->id_unidad_habitacional;
            $model->id_vivienda = $beneficiarioTemporal->vivienda->id_vivienda;
            $model->tipo_vivienda = $beneficiarioTemporal->vivienda->tipoVivienda->descripcion;
            $model->nro_piso = $beneficiarioTemporal->vivienda->nro_piso;
            $model->nro_vivienda = $beneficiarioTemporal->vivienda->nro_vivienda;
        }



        if (isset($_POST['ReasignacionVivienda'])) {
            $beneficiarioTemNuevo = new BeneficiarioTemporal;
            if ($beneficiarioTemNuevo->persona_id == '') {

//                $codigo_hab = substr($_POST["ReasignacionVivienda_telf_habitacion"], 0, 4);
//                $telf_habitacion = substr($_POST["ReasignacionVivienda_telf_habitacion"], 4, 11);

                $codigo_movil = substr($_POST['ReasignacionVivienda_telf_celularActual'], 0, 4);
                $telf_movil = substr($_POST['ReasignacionVivienda_telf_celularActual'], 4, 11);


                $idPersona = ConsultaOracle::insertPersona(array(
                            'CEDULA' => $_POST['ReasignacionVivienda']['cedula'],
                            'NACIONALIDAD' => ($_POST['ReasignacionVivienda']['nacionalidad'] == 97) ? 1 : 0,
                            'PRIMER_NOMBRE' => trim(strtoupper($_POST['ReasignacionVivienda']['primer_nombreActual'])),
                            'SEGUNDO_NOMBRE' => trim(strtoupper($_POST['ReasignacionVivienda']['segundo_nombreActual'])),
                            'PRIMER_APELLIDO' => trim(strtoupper($_POST['ReasignacionVivienda']['primer_apellidoActual'])),
                            'SEGUNDO_APELLIDO' => trim(strtoupper($_POST['ReasignacionVivienda']['segundo_apellidoActual'])),
                            'FECHA_NACIMIENTO' => $_POST['ReasignacionVivienda']['fecha_nacimientoActual'],
                            'GEN_SEXO_ID' => $_POST['ReasignacionVivienda']['sexoActual'],
                            // 'GEN_EDO_CIVIL_ID' => $_POST["BeneficiarioTemporal"]['estado_civil'],
//                            'CODIGO_HAB' => (string) $codigo_hab,
//                            'TELEFONO_HAB' => (string) $telf_habitacion,
                            'CODIGO_MOVIL' => (string) $codigo_movil,
                            'TELEFONO_MOVIL' => (string) $telf_movil,
                            'CORREO_PRINCIPAL' => $_POST["ReasignacionVivienda"]['correo_electronicoActual'],
                                )
                );
            } else {

                $idPersona = $_POST['ReasignacionVivienda']['persona_id'];

//                $codigo_hab = substr($_POST["ReasignacionVivienda_telf_habitacion"], 0, 4);
//                $telf_habitacion = substr($_POST["ReasignacionVivienda_telf_habitacion"], 4, 11);

                $codigo_movil = substr($_POST["ReasignacionVivienda_telf_celularActual"], 0, 4);
                $telf_movil = substr($_POST["ReasignacionVivienda_telf_celularActual"], 4, 11);


                /*   ----------  UPDATE    -------------------  */
                $idPersona = ConsultaOracle::updatePersona(array(
                            //  'CEDULA'           => $_POST["BeneficiarioTemporal"]["cedula"],
                            // 'NACIONALIDAD'     => ($_POST["BeneficiarioTemporal"]['nacionalidad'] == 97) ? 1 : 0,
                            'PRIMER_NOMBRE' => trim(strtoupper($_POST['ReasignacionVivienda']['primer_nombreActual'])),
                            'SEGUNDO_NOMBRE' => trim(strtoupper($_POST['ReasignacionVivienda']['segundo_nombreActual'])),
                            'PRIMER_APELLIDO' => trim(strtoupper($_POST['ReasignacionVivienda']['primer_apellidoActual'])),
                            'SEGUNDO_APELLIDO' => trim(strtoupper($_POST['ReasignacionVivienda']['segundo_apellidoActual'])),
                            'FECHA_NACIMIENTO' => $_POST['ReasignacionVivienda']['fecha_nacimientoActual'],
                            'GEN_SEXO_ID' => $_POST['ReasignacionVivienda']['sexoActual'],
                            //  'GEN_EDO_CIVIL_ID' => $_POST["BeneficiarioTemporal"]['estado_civil'],
                            'CODIGO_HAB' => (string) $codigo_hab,
                            'TELEFONO_HAB' => (string) $telf_habitacion,
                            'CODIGO_MOVIL' => (string) $codigo_movil,
                            'TELEFONO_MOVIL' => (string) $telf_movil,
                            'CORREO_PRINCIPAL' => $_POST["ReasignacionVivienda"]['correo_electronicoActual'],
                                ), $idPersona
                );

                /*   -----------------------------------------  */
            }


            //INSERT DE DATOS EN BENEFICIARIO ADJUDICADO NUEVO
            $nombre_completo = $_POST['ReasignacionVivienda']['primer_apellidoActual'] . ' ';
            $nombre_completo .= $_POST['ReasignacionVivienda']['segundo_apellidoActual'] . ' ';
            $nombre_completo .= $_POST['ReasignacionVivienda']['primer_nombreActual'] . ' ';
            $nombre_completo .= $_POST['ReasignacionVivienda']['segundo_nombreActual'];

            $beneficiarioTemNuevo->persona_id = (int) $idPersona;
            $beneficiarioTemNuevo->desarrollo_id = (int) $_POST['ReasignacionVivienda']['id_desarrollo'];
            $beneficiarioTemNuevo->unidad_habitacional_id = (int) $_POST['ReasignacionVivienda']['id_unidad_habitacional'];
            $beneficiarioTemNuevo->vivienda_id = (int) $_POST['ReasignacionVivienda']['id_vivienda'];
            $beneficiarioTemNuevo->nacionalidad = (int) $_POST['ReasignacionVivienda']['nacionalidad'];
            $beneficiarioTemNuevo->cedula = (int) $_POST['ReasignacionVivienda']['cedula'];
            $beneficiarioTemNuevo->nombre_completo = strtoupper($nombre_completo);
            $beneficiarioTemNuevo->fecha_creacion = 'now';
            $beneficiarioTemNuevo->usuario_id_creacion = Yii::app()->user->id;
            $beneficiarioTemNuevo->fecha_actualizacion = 'now';
            $beneficiarioTemNuevo->estatus = 221;

            if ($beneficiarioTemNuevo->save()) {
                $id_benetemp = $beneficiarioTemNuevo->id_beneficiario_temporal;

                // ACTUALIZACION DE ESTATUS DEL BENEFICIARIO ADJUDICADO ANTERIOR //
                $beneficiarioTemporal->estatus = 186;
                $beneficiarioTemporal->fecha_actualizacion = 'now';
                $beneficiarioTemporal->usuario_id_actualizacion = Yii::app()->user->id;
                $beneficiarioTemporal->save();
            } else {
                var_dump($beneficiarioTemNuevo->errors);
                die();
            }

            $model->attributes = $_POST['ReasignacionVivienda'];
            $model->beneficiario_id_anterior = $_POST['ReasignacionVivienda']['beneficiario_id_anterior'];
            $model->beneficiario_id_actual = $id_benetemp;
            $model->vivienda_id = $_POST['ReasignacionVivienda']['id_vivienda'];
            $model->tipo_reasignacion_id = $_POST['ReasignacionVivienda']['tipo_reasignacion_id'];
            $model->persona_id_autoriza = Yii::app()->user->id;
            $model->observaciones = trim(strtoupper($_POST['ReasignacionVivienda']['observaciones']));
            $model->fecha_reasignacion = $model->fecha_reasignacion = Generico::formatoFecha($_POST['ReasignacionVivienda']['fecha_reasignacion']);
            $model->fecha_creacion = 'now';
            $model->fecha_actualizacion = 'now';
            $model->usuario_id_creacion = Yii::app()->user->id;
            ;
            $model->estatus = 50;

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_reasignacion_vivienda));
            } else {
                var_dump($model->errors);
                die;
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['ReasignacionVivienda'])) {
            $model->attributes = $_POST['ReasignacionVivienda'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_reasignacion_vivienda));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ReasignacionVivienda');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ReasignacionVivienda('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ReasignacionVivienda']))
            $model->attributes = $_GET['ReasignacionVivienda'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = ReasignacionVivienda::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'reasignacion-vivienda-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
