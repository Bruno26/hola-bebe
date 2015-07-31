<?php

class ViviendaController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//public $layout='//layouts/column2';

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
    public function actionCreate() {
        $model = new Vivienda;
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;
        $desarrollo = new Desarrollo;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
//$model->;

        if (isset($_POST['Vivienda'])) {
            $model->attributes = $_POST['Vivienda'];
            $model->unidad_habitacional_id = $_POST['Vivienda']['unidad_habitacional_id'];
            $model->tipo_vivienda_id = $_POST['Vivienda']['tipo_vivienda_id'];
            $model->construccion_mt2 = $_POST['Vivienda']['construccion_mt2'];
            $model->nro_piso = $_POST['Vivienda']['nro_piso'];
            $model->nro_vivienda = $_POST['Vivienda']['nro_vivienda'];
            $model->sala = isset($_POST['sala']) ? true : false;
            $model->comedor = isset($_POST['comedor']) ? true : false;
            $model->cocina = isset($_POST['cocina']) ? true : false;
            $model->lavandero = isset($_POST['lavandero']) ? true : false;
            $model->lavandero = isset($_POST['lavandero']) ? true : false;
            $model->lindero_norte = $_POST['Vivienda']['lindero_norte'];
            $model->lindero_sur = $_POST['Vivienda']['lindero_sur'];
            $model->lindero_este = $_POST['Vivienda']['lindero_este'];
            $model->lindero_oeste = $_POST['Vivienda']['lindero_oeste'];
            $model->coordenadas = $_POST['Vivienda']['coordenadas'];
            $model->precio_vivienda = $_POST['Vivienda']['precio_vivienda'];
            $model->nro_estacionamientos = $_POST['Vivienda']['nro_estacionamientos'];
            $model->descripcion_estac = $_POST['Vivienda']['descripcion_estac'];
            $model->fuente_datos_entrada_id = 90;
            $model->estatus_vivienda_id = 75;
            $model->asignada = '0';
            $model->fecha_creacion = 'now';
            $model->fecha_actualizacion = 'now';
            $model->usuario_id_creacion = Yii::app()->user->id;
            // $model->usuario_id_actualizacion = 5;


            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_vivienda));
            }
        }
        $this->render('create', array(
            'model' => $model, 'estado' => $estado,
            'municipio' => $municipio, 'parroquia' => $parroquia,
            'desarrollo' => $desarrollo
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
        $desarrollo = new Desarrollo;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Vivienda'])) {
            $model->attributes = $_POST['Vivienda'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_vivienda));
        }

        $this->render('update', array('model' => $model, 'estado' => $estado,
            'municipio' => $municipio, 'parroquia' => $parroquia, 'desarrollo' => $desarrollo
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
        $dataProvider = new CActiveDataProvider('Vivienda');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Vivienda('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Vivienda']))
            $model->attributes = $_GET['Vivienda'];

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
        $model = Vivienda::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vivienda-form') {
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

 /*  ------------------------------------- */
    public function actiondocumento($id) {
        
        $this->render('documento', array(
            'model' => $this->loadModel($id),
        ));
    }

   

 /*  ------------------------------------- */



}
