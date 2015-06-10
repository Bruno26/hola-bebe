<?php

class UnidadHabitacionalController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//    public $layout = '//layouts/column2';

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
                'actions' => array('create', 'update', 'guardar'),
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
        $model = new UnidadHabitacional;
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;

//        $model = new Desarrollo;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['UnidadHabitacional'])) {

            $nombre = trim(strtoupper($_POST['UnidadHabitacional']['nombre']));
            $id_desarrollo = $_POST['UnidadHabitacional']['desarrollo_id'];
            $consulta = UnidadHabitacional ::model()->findByAttributes(array('nombre' => $nombre, 'desarrollo_id' => $id_desarrollo));

            if (empty($consulta)) {
                $model->attributes = $_POST['UnidadHabitacional'];
                $model->desarrollo_id = $_POST['UnidadHabitacional']['desarrollo_id'];
                $model->nombre = $nombre;
                $model->registro_publico_id = $_POST['UnidadHabitacional']['registro_publico_id'];
                $model->fecha_registro = Generico::formatoFecha($_POST['UnidadHabitacional']['fecha_registro']);
                $model->gen_tipo_inmueble_id = $_POST['UnidadHabitacional']['gen_tipo_inmueble_id'];
                $model->total_unidades = '0';
                $model->ano = $_POST['UnidadHabitacional']['ano'];
                $model->tipo_documento_id = $_POST['UnidadHabitacional']['tipo_documento_id'];
                $model->num_protocolo = $_POST['UnidadHabitacional']['num_protocolo'];
                $model->folio_real = $_POST['UnidadHabitacional']['folio_real'];
                $model->asiento_registral = $_POST['UnidadHabitacional']['asiento_registral'];
                $model->tomo = $_POST['UnidadHabitacional']['tomo'];
                $model->fuente_datos_entrada_id = 90;
                $model->nro_matricula = $_POST['UnidadHabitacional']['nro_matricula'];
                $model->fecha_creacion = 'now()';
                $model->fecha_actualizacion = 'now()';
                $model->usuario_id_creacion = Yii::app()->user->id;
                $model->estatus = 71;
                if ($model->save()) {
                    $this->redirect(array('/site/index'));
                }
            } else {
                $this->render('create', array('model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'sms' => 1));
            }
        }

        $this->render('create', array('model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia));
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

        if (isset($_POST['UnidadHabitacional'])) {
            $model->attributes = $_POST['UnidadHabitacional'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_unidad_habitacional));
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
        $dataProvider = new CActiveDataProvider('UnidadHabitacional');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new UnidadHabitacional('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['UnidadHabitacional']))
            $model->attributes = $_GET['UnidadHabitacional'];

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
        $model = UnidadHabitacional::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'unidad-habitacional-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
