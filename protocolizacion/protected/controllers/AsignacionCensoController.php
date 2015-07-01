<?php

class AsignacionCensoController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(array('CrugeAccessControlFilter'));
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
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
    public function actionCreate() {
        $model = new AsignacionCenso;
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['AsignacionCenso'])) {
            if ($_POST['AsignacionCenso']['persona_id'] == '') {
                $idPersona = ConsultaOracle::insertPersona(array(
                            'CEDULA' => $_POST['AsignacionCenso']['cedula'],
                            'NACIONALIDAD' => ($_POST['AsignacionCenso']['nacionalidad'] == 97) ? 1 : 0,
                            'PRIMER_NOMBRE' => trim(strtoupper($_POST['AsignacionCenso']['primer_nombre'])),
                            'SEGUNDO_NOMBRE' => trim(strtoupper($_POST['AsignacionCenso']['segundo_nombre'])),
                            'PRIMER_APELLIDO' => trim(strtoupper($_POST['AsignacionCenso']['primer_apellido'])),
                            'SEGUNDO_APELLIDO' => trim(strtoupper($_POST['AsignacionCenso']['segundo_apellido'])),
                            'FECHA_NACIMIENTO' => $_POST['AsignacionCenso']['fecha_nac'],
                                )
                );
            } else {
                $idPersona = $_POST['AsignacionCenso']['persona_id'];
            }

            $model->attributes = $_POST['AsignacionCenso'];
            $model->desarrollo_id = $_POST['AsignacionCenso_desarrollo_id'];
            $model->persona_id = $idPersona;
            $model->oficina_id = $_POST['AsignacionCenso_oficina_id'];
            $model->censado = isset($_POST['censado']) ? true : false;
            $model->fecha_asignacion = Generico::formatoFecha($_POST['AsignacionCenso']['fecha_asignacion']);
            $model->observaciones = $_POST['AsignacionCenso']['observaciones'];
            $model->fecha_creacion = 'now()';
            $model->fecha_actualizacion = 'now()';
            $model->usuario_id_creacion = Yii::app()->user->id;
            $model->estatus = 11;

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_asignacion_censo));
            }
        }
        $this->render('create', array(
            'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
        $consulta = ConsultaOracle::setPersona('nacionalidad,cedula,primer_nombre, segundo_nombre,primer_apellido, segundo_apellido', $model->persona_id);
        $model->nacionalidad = ($consulta['NACIONALIDAD'] == 1) ? 97 : 98;
        $model->cedula = $consulta['CEDULA'];
        $model->primer_nombre = $consulta['PRIMER_NOMBRE'];
        $model->segundo_nombre = $consulta['SEGUNDO_NOMBRE'];
        $model->primer_apellido = $consulta['PRIMER_APELLIDO'];
        $model->segundo_apellido = $consulta['SEGUNDO_APELLIDO'];
        if (isset($_POST['AsignacionCenso'])) {
            if (empty($_POST['AsignacionCenso']['persona_id'])) {
                $idAsignacion = ConsultaOracle::insertPersona(array(
                            'CEDULA' => $_POST['AsignacionCenso']['cedula'],
                            'NACIONALIDAD' => ($_POST['AsignacionCenso']['nacionalidad'] == 97) ? 1 : 0,
                            'PRIMER_NOMBRE' => trim(strtoupper($_POST['AsignacionCenso']['primer_nombre'])),
                            'SEGUNDO_NOMBRE' => trim(strtoupper($_POST['AsignacionCenso']['segundo_nombre'])),
                            'PRIMER_APELLIDO' => trim(strtoupper($_POST['AsignacionCenso']['primer_apellido'])),
                            'SEGUNDO_APELLIDO' => trim(strtoupper($_POST['AsignacionCenso']['segundo_apellido'])),
                            'FECHA_NACIMIENTO' => $_POST['AsignacionCenso']['fechaNac'],
                                )
                );
            } else {
                $idAsignacion = $_POST['AsignacionCenso']['persona_id'];
            }
            $ExisteAsignacion = AsignacionCensoController::FindByIdPersona($idAsignacion);
//            echo '<pre>';
//            var_dump($ExisteAsignacion);
//            die();
            if (empty($ExisteAsignacion)) {
                $model->persona_id = $idAsignacion;
                $model->fecha_asignacion = Generico::formatoFecha($_POST['AsignacionCenso']['fecha_asignacion']);
                $model->observaciones = trim(strtoupper($_POST['AsignacionCenso']['observaciones']));
                $model->fecha_actualizacion = 'now()';
                $model->usuario_id_creacion = Yii::app()->user->id;
                if ($model->save()) {
                    $this->redirect(array('view', 'id' => $model->id_asignacion_censo));
                } else {
                    var_dump($model->errors);
                }
            } else {
                $this->render('update', array('model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'error' => 1));
                Yii::app()->end();
            }
        }
        $this->render('update', array(
            'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia
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
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('AsignacionCenso');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new AsignacionCenso('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['AsignacionCenso']))
            $model->attributes = $_GET['AsignacionCenso'];

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
        $model = AsignacionCenso::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'asignacion-censo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPdf($id) {
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $this->render('pdf', array(
            'model' => $this->loadModel($id),
            'estado' => $estado,
            'municipio' => $municipio,
        ));
    }

    public function FindByIdPersona($id) {
        $model = AsignacionCenso::model()->findByAttributes(array('persona_id' => $id));
        if ($model === null)
            return FALSE;
        return $model;
    }

}
