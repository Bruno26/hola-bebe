<?php

class OficinaController extends Controller {
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

        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'estado' => $estado,
            'municipio' => $municipio,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        $model = new Oficina;
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);


        if (isset($_POST['Oficina'])) {

            $nombre = trim(strtoupper($_POST['Oficina']['nombre']));
            $parroquia_id = trim(strtoupper($_POST['Oficina']['parroquia_id']));
            $cod_estado = $_POST['Tblestado']['clvcodigo'];

            $sql = "SELECT ofi.nombre 
                    FROM oficina ofi
                    LEFT JOIN vsw_sector sec ON sec.cod_parroquia = ofi.parroquia_id 
                    WHERE ofi.nombre ILIKE '" . $nombre . "' AND sec.cod_estado = " . $cod_estado . " AND ofi.estatus = 44
                    GROUP BY  ofi.id_oficina, ofi.nombre,  sec.cod_estado, sec.estado, ofi.parroquia_id
                    ORDER BY estado ASC";

            $consulta = Yii::app()->db->createCommand($sql)->queryAll();
            if (empty($consulta)) {
                $model->attributes = $_POST['Oficina'];
                $model->nombre = $nombre;
                $model->persona_id_jefe = $_POST['Oficina']['persona_id_jefe'];
                $model->estatus = 44;
                $model->usuario_id_creacion = Yii::app()->user->id;
                $model->fecha_creacion = 'now()';
                $model->fecha_actualizacion = 'now()';

//            $model->fk
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id_oficina));
            }else {
                $this->render('create', array(
                    'model' => $model, 'estado' => $estado,
                    'municipio' => $municipio, 'parroquia' => $parroquia,
                    'sms' => 1
                ));
                Yii::app()->end();
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
        $consulta = ConsultaOracle::setPersona('nacionalidad,cedula,primer_nombre,primer_apellido', $model->persona_id_jefe);
        $nacio = ($consulta['NACIONALIDAD'] == 1) ? 'V-' : 'E-';
        $model->cedula = $nacio . '' . $consulta['CEDULA'];
        $model->primer_nombre = $consulta['PRIMER_NOMBRE'];
        $model->primer_apellido = $consulta['PRIMER_APELLIDO'];

        if (isset($_POST['Oficina'])) {
            $model->attributes = $_POST['Oficina'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_oficina));
        }

        $this->render('update', array(
            'model' => $model,
            'estado' => $estado,
            'municipio' => $municipio,
            'parroquia' => $parroquia,
            'consulta' => $consulta,
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
        $dataProvider = new CActiveDataProvider('Oficina');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Oficina('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Oficina']))
            $model->attributes = $_GET['Oficina'];

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
        $model = Oficina::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'oficina-form') {
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
