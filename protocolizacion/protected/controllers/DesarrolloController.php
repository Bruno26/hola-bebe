<?php

class DesarrolloController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    // public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
//    public function filters() {
//        return array('accessControl', array('CrugeAccessControlFilter'), // perform access control for CRUD operations
//        );
//    }
//
//    public function accessRules() {
//        return array(
//            array('allow', // allow all users to perform 'index' and 'view' actions
//                //'actions' => array('*'),
//                'users' => array('*'),
//            ),
//            array('deny', // deny all users
//                'users' => array('*'),
//            ),
//        );
//    }
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
                'actions' => array('create', 'update'),
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
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'estado' => $estado ,
            'municipio' => $municipio ,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Desarrollo;
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;
        $enteEjecutor = new EnteEjecutor;
        $fuenteFinacimiento = new FuenteFinanciamiento;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Desarrollo'])) {
            $nombre = trim(strtoupper($_POST['Desarrollo']['nombre']));
            $id_parroquia = $_POST['Desarrollo']['parroquia_id'];
            $consulta = Desarrollo::model()->findByAttributes(array('nombre' => $nombre, 'parroquia_id' => $id_parroquia));
            if (empty($consulta)) {
                $model->attributes = $_POST['Desarrollo'];
                $model->nombre = $nombre;
                $model->parroquia_id = $id_parroquia;
                $model->descripcion = $_POST['Desarrollo']['descripcion'];
                $model->urban_barrio = $_POST['Desarrollo']['urban_barrio'];
                $model->av_call_esq_carr = $_POST['Desarrollo']['av_call_esq_carr'];
                $model->zona = $_POST['Desarrollo']['zona'];
                $model->lindero_norte = $_POST['Desarrollo']['lindero_norte'];
                $model->lindero_este = $_POST['Desarrollo']['lindero_este'];
                $model->lindero_oeste = $_POST['Desarrollo']['lindero_oeste'];
                $model->lindero_sur = $_POST['Desarrollo']['lindero_sur'];
                $model->coordenadas = $_POST['Desarrollo']['coordenadas'];
                $model->ente_ejecutor_id = $_POST['Desarrollo']['ente_ejecutor_id'];
                $model->fuente_financiamiento_id = $_POST['Desarrollo']['fuente_financiamiento_id'];
                $model->fuente_datos_entrada_id = 5;
                $model->titularidad_del_terreno = isset($_POST['titularidad_del_terreno']) ? true : false;
                $model->fecha_transferencia = ($model->titularidad_del_terreno) ? Generico::formatoFecha($_POST['Desarrollo']['fecha_transferencia']) : '0001-01-01 00:00:00';
                $model->fecha_creacion = 'now()';
                $model->fecha_actualizacion = 'now()';
                $model->usuario_id_creacion = Yii::app()->user->id;
                $model->estatus = 29;
                // echo '<pre>';  var_dump($model); die();

                if ($model->save()) {

                    $this->redirect(array('admin'));
                } 
                
//                else {
//                    var_dump($model->errors);
//                    die();
//                }
            } else {
                $this->render('create', array(
                    'model' => $model, 'estado' => $estado,
                    'municipio' => $municipio, 'parroquia' => $parroquia,
                    'enteEjecutor' => $enteEjecutor, 'fuenteFinacimiento' => $fuenteFinacimiento,
                    'sms' => 1
                ));
                Yii::app()->end();
            }
        }

        $this->render('create', array(
            'model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'enteEjecutor' => $enteEjecutor, 'fuenteFinacimiento' => $fuenteFinacimiento
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

        if (isset($_POST['Desarrollo'])) {
            $model->attributes = $_POST['Desarrollo'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_desarrollo));
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
        $dataProvider = new CActiveDataProvider('Desarrollo');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Desarrollo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Desarrollo']))
            $model->attributes = $_GET['Desarrollo'];

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
        $model = Desarrollo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'desarrollo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
