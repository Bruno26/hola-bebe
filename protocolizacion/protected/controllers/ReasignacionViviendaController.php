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
//        var
        if (!empty($beneficiarioTemporal)) {
            $model->beneficiario_id_anterior = $beneficiarioTemporal->id_beneficiario_temporal;
            $model->nacionalidadAnterior = $beneficiarioTemporal->nacionalidad;
            $model->cedulaAnterior = $beneficiarioTemporal->cedula;
            $model->nombreCompletoAnterior = $beneficiarioTemporal->nombre_completo;
            $model->desarrollo = $beneficiarioTemporal->desarrollo->nombre;
            $model->unidad_habitacional = $beneficiarioTemporal->unidadHabitacional->nombre;
            $model->vivienda_id = $beneficiarioTemporal->vivienda->id_vivienda;
            $model->tipo_vivienda = $beneficiarioTemporal->vivienda->tipoVivienda->descripcion;
            $model->nro_piso = $beneficiarioTemporal->vivienda->nro_piso;
            $model->nro_vivienda = $beneficiarioTemporal->vivienda->nro_vivienda;
        }

        if (isset($_POST['ReasignacionVivienda'])) {
            $model->attributes = $_POST['ReasignacionVivienda'];
            $model->beneficiario_id_anterior = $_POST['ReasignacionVivienda']['beneficiario_id_anterior'];
            $model->beneficiario_id_actual = $_POST['ReasignacionVivienda']['beneficiario_id_anterior'];
            $model->vivienda_id = $_POST['ReasignacionVivienda']['vivienda_id'];
            $model->tipo_reasignacion_id = $_POST['ReasignacionVivienda']['tipo_reasignacion_id'];
            $model->persona_id_autoriza = Yii::app()->user->id;
            $model->observaciones = trim(strtoupper($_POST['ReasignacionVivienda']['observaciones']));
            $model->fecha_reasignacion = $model->fecha_reasignacion = Generico::formatoFecha($_POST['ReasignacionVivienda']['fecha_reasignacion']);
            $model->fecha_creacion = 'now';
            $model->fecha_actualizacion = 'now';
            $model->usuario_id_creacion = Yii::app()->user->id;
            ;
            $model->estatus = 49;

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
        } else
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
