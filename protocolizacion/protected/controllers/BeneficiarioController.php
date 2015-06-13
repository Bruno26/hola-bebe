<?php

class BeneficiarioController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
#public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'createDatos'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
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
        $model = new Beneficiario;
        $desarrollo = new Desarrollo;
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Beneficiario'])) {
            $model->attributes = $_POST['Beneficiario'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_beneficiario));
        }

        $this->render('create', array(
            'model' => $model, 'desarrollo' => $desarrollo, 'municipio' => $municipio, 'estado' => $estado, 'parroquia' => $parroquia,
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

        if (isset($_POST['Beneficiario'])) {
            $model->attributes = $_POST['Beneficiario'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_beneficiario));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    //ACTUALIZACION DE DATOS DE BENEFICIARIO
    public function actionCreateDatos($id) {

        $model = Beneficiario::model()->findByPk($id);
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;
        $faovPromedio = ConsultaOracle::getFaov($id, 1); //consulta la funcion faov por id de persona, para mostrar el calculo de promedio
        $faovMensual = ConsultaOracle::getFaov($id, 2); //consulta la funcion faov por id de persona, para mostrar el calculo de ingreso mesual
        $model-> ingreso_mensual= $faovMensual;
        $model-> ingreso_promedio_faov = $faovPromedio;

        if (isset($_POST['Beneficiario']['fuente_ingreso_id'])) {
            $model->attributes = $_POST['Beneficiario'];
            $model->parroquia_id = $_POST['Beneficiario']['parroquia_id'];
            $model->urban_barrio = $_POST['Beneficiario']['urban_barrio'];
            $model->av_call_esq_carr = $_POST['Beneficiario']['av_call_esq_carr'];
            $model->zona = $_POST['Beneficiario']['zona'];
            $model->condicion_trabajo_id = $_POST['Beneficiario']['condicion_trabajo_id'];
            $model->fuente_ingreso_id = $_POST['Beneficiario']['fuente_ingreso_id'];
            $model->condicion_laboral = $_POST['Beneficiario']['condicion_laboral'];
            $model->sector_trabajo_id = $_POST['Beneficiario']['sector_trabajo_id'];
            $model->nombre_empresa = $_POST['Beneficiario']['nombre_empresa'];
            $model->direccion_empresa = $_POST['Beneficiario']['direccion_empresa'];
            $model->telefono_trabajo = $_POST['Beneficiario']['telefono_trabajo'];
            $model->gen_cargo_id = $_POST['Beneficiario']['gen_cargo_id'];
            $model->ingreso_mensual = $_POST['Beneficiario']['ingreso_mensual'];
            $model->ingreso_declarado = $_POST['Beneficiario']['ingreso_declarado'];
            $model->ingreso_promedio_faov = $_POST['Beneficiario']['ingreso_promedio_faov'];


            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_beneficiario));
        }

        $this->render('createDatos', array(
            'model' => $model, 'municipio' => $municipio, 'estado' => $estado, 'parroquia' => $parroquia,
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
        $dataProvider = new CActiveDataProvider('Beneficiario');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Beneficiario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Beneficiario']))
            $model->attributes = $_GET['Beneficiario'];

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
        $model = Beneficiario::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'beneficiario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
