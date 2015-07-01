<?php

class AbogadosController extends Controller {
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
        $model = new Abogados;

        if (isset($_POST['Abogados'])) {
            if ($_POST['Abogados']['persona_id'] == '') {
                $idPersona = ConsultaOracle::insertPersona(array(
                            'CEDULA' => $_POST['Abogados']['cedula'],
                            'NACIONALIDAD' => ($_POST['Abogados']['nacionalidad'] == 97) ? 1 : 0,
                            'PRIMER_NOMBRE' => trim(strtoupper($_POST['Abogados']['primer_nombre'])),
                            'SEGUNDO_NOMBRE' => trim(strtoupper($_POST['Abogados']['segundo_nombre'])),
                            'PRIMER_APELLIDO' => trim(strtoupper($_POST['Abogados']['primer_apellido'])),
                            'SEGUNDO_APELLIDO' => trim(strtoupper($_POST['Abogados']['segundo_apellido'])),
                            'FECHA_NACIMIENTO' => $_POST['Abogados']['fecha_nac'],
                                )
                );
            } else {
                $idPersona = $_POST['Abogados']['persona_id'];
            }
            $model->attributes = $_POST['Abogados'];
            $model->observaciones = trim(strtoupper($_POST['Abogados']['observaciones']));
            $model->persona_id = $idPersona;
            $model->oficina_id = $_POST['Abogados_oficina_id'];
            $model->estatus = 2;
            $model->usuario_id_creacion = Yii::app()->user->id;
            $model->fecha_creacion = 'now()';
            $model->fecha_actualizacion = 'now()';
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
        $consulta = ConsultaOracle::setPersona('nacionalidad,cedula,primer_nombre,segundo_nombre, primer_apellido, segundo_apellido', $model->persona_id);
//        var_dump($consulta);die;
        $nacio = ($consulta['NACIONALIDAD'] == 1) ? 'V-' : 'E-';
        $model->cedula = $nacio . '' . $consulta['CEDULA'];
        $model->primer_nombre = $consulta['PRIMER_NOMBRE'];
        $model->segundo_nombre = $consulta['SEGUNDO_NOMBRE'];
        $model->primer_apellido = $consulta['PRIMER_APELLIDO'];
        $model->segundo_apellido = $consulta['SEGUNDO_APELLIDO'];
        $model->usuario_id_actualizacion = Yii::app()->user->id;

        if (isset($_POST['Abogados'])) {
            $model->attributes = $_POST['Abogados'];
            $model->observaciones = trim(strtoupper($_POST['Abogados']['observaciones']));
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
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
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Abogados');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Abogados('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Abogados']))
            $model->attributes = $_GET['Abogados'];

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
        $model = Abogados::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'abogados-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPdf($id) {
        $this->render('pdf', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function FindByIdPersona($id) {
        $model = Abogados::model()->findByAttributes(array('persona_id' => $id));
        if ($model === null)
            return FALSE;
        return $model;
    }

}
