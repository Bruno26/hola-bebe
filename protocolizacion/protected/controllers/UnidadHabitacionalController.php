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
        $model = new UnidadHabitacional;
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'estado' => $estado,
            'municipio' => $municipio,
        ));


        //$this->render('view', array(
        //    'model' => $this->loadModel($id),
        //));
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
            $consulta = UnidadHabitacional::model()->findByAttributes(array('nombre' => $nombre, 'desarrollo_id' => $id_desarrollo));

            if (empty($consulta)) {
                $model->attributes = $_POST['UnidadHabitacional'];
                $model->desarrollo_id = $_POST['UnidadHabitacional']['desarrollo_id'];
                $model->nombre = trim(strtoupper($_POST['UnidadHabitacional']['nombre']));
                $model->gen_tipo_inmueble_id = $_POST['UnidadHabitacional']['gen_tipo_inmueble_id'];
                $model->lindero_norte = $_POST['UnidadHabitacional']['lindero_norte'];
                $model->lindero_sur = $_POST['UnidadHabitacional']['lindero_sur'];
                $model->lindero_este = $_POST['UnidadHabitacional']['lindero_este'];
                $model->lindero_oeste = $_POST['UnidadHabitacional']['lindero_oeste'];
                $model->total_unidades = 0;
//                $model->fecha_registro = Generico::formatoFecha($_POST['UnidadHabitacional']['fecha_registro']);
//                $model->ano = $_POST['UnidadHabitacional']['ano'];
                $model->asiento_registral =1;
//                $model->registro_publico_id =0;
//                $model->tipo_documento_id = 0;
//                $model->num_protocolo =0;
                $model->fecha_registro = '0001-01-01 00:00:00';
                $model->tomo = 0;
                $model->folio_real = 1;
                $model->nro_matricula = 1;
                $model->fuente_datos_entrada_id = 90;
                $model->fecha_creacion = 'now()';
                $model->fecha_actualizacion = 'now()';
                $model->usuario_id_creacion = Yii::app()->user->id;
                $model->estatus = 78;
//                echo '<pre>';var_dump($model); die();

                if ($model->save()) {

                    $this->redirect(array('/VswMultifamiliar/admin'));
                }
            } else {
                $this->render('create', array('model' => $model,
                    'estado' => $estado, 'municipio' => $municipio,
                    'parroquia' => $parroquia, 'sms' => 1));
                Yii::app()->end();
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
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['UnidadHabitacional'])) {
            $model->attributes = $_POST['UnidadHabitacional'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_unidad_habitacional));
        }

        $this->render('update', array('model' => $model, 'estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia));
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

    public function actionPdf($id) {
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $this->render('pdf', array(
            'model' => $this->loadModel($id),
            'estado' => $estado,
            'municipio' => $municipio,
        ));
    }

}
