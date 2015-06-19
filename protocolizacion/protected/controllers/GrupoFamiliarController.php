<?php

class GrupoFamiliarController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//public $layout='//layouts/column2';

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
                'actions' => array('index', 'view', 'InsertFamiliar'),
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
    public function actionCreate($id, $caso = NULL) {
        $model = new GrupoFamiliar;
        $idBeneficiario = UnidadFamiliar::model()->findByPk($id);
        $traza = Traza::VerificarTraza($idBeneficiario->beneficiario_id); // verifica el guardado de la traza
        if ($traza != 1) {
            Generico::renderTraza($idBeneficiario->beneficiario_id); //renderiza a la traza
        }
// Uncomment the following line if AJAX validation is needed
//    $this->performAjaxValidation($model);

        if (!empty($caso)) {
            $idtraza = Traza::ObtenerIdTraza($idBeneficiario->beneficiario_id); // pemite la busqueda de la id de la traza 
            $guardartraza = Traza::actionInsertUpdateTraza(2, $idBeneficiario->beneficiario_id, 2, $idtraza); // permite insertar y actualizar la traza segun el caso 
            $this->redirect(array('beneficiario/createDatos', 'id' => $idBeneficiario->beneficiario_id));
        }

        $this->render('create', array('model' => $model));
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

        if (isset($_POST['GrupoFamiliar'])) {
            $model->attributes = $_POST['GrupoFamiliar'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_grupo_familiar));
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
        $dataProvider = new CActiveDataProvider('GrupoFamiliar');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new GrupoFamiliar('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['GrupoFamiliar']))
            $model->attributes = $_GET['GrupoFamiliar'];

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
        $model = GrupoFamiliar::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'grupo-familiar-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /*
     * Funcion que ingresa en tabla grupo familiar
     */

    public function actionInsertFamiliar() {
        $Familiar = new GrupoFamiliar;
        if ($_POST['idPersona'] == '') {
            $idPersona = ConsultaOracle::insertPersona(array(
                        'CEDULA' => $_POST['cedula'],
                        'NACIONALIDAD' => ($_POST['nacionalida'] == 97) ? 1 : 0,
                        'PRIMER_NOMBRE' => trim(strtoupper($_POST['primerNombre'])),
                        'SEGUNDO_NOMBRE' => trim(strtoupper($_POST['segundoNombre'])),
                        'PRIMER_APELLIDO' => trim(strtoupper($_POST['primerApellido'])),
                        'SEGUNDO_APELLIDO' => trim(strtoupper($_POST['segundoApellido'])),
                        'FECHA_NACIMIENTO' => $_POST['fechaNac'],
                            )
            );
        } else {
            $idPersona = $_POST['idPersona'];
        }
        $ExisteBeneficiario = Beneficiario::model()->findByAttributes(array('persona_id' => $idPersona));
        $ExisteFamiliar = $this->FindByIdPersona($idPersona);
        if (!empty($ExisteFamiliar) && !empty($ExisteBeneficiario)) {
            echo CJSON::encode(1);
        } else {
            $Familiar->persona_id = $idPersona;
            $Familiar->gen_parentesco_id = $_POST['parentesco'];
            $Familiar->tipo_sujeto_atencion = $_POST['tipoSujeto'];
            $Familiar->cotiza_faov = $_POST['faov'];
            $Familiar->ingreso_mensual = $_POST['ingresoM'];
            $Familiar->unidad_familiar_id = $_POST['IdUnidadF'];
            $Familiar->estatus = 41;
            $Familiar->fuente_datos_entrada_id = 5;
            $Familiar->fecha_creacion = 'now()';
            $Familiar->fecha_actualizacion = 'now()';
            $Familiar->usuario_id_creacion = Yii::app()->user->id;
            if ($Familiar->save()) {
                echo CJSON::encode(3);
            } else {
                //echo '<pre>';var_dump($Familiar->Errors);die;
                echo CJSON::encode(2);
            }
        }
    }

    /**
     * @param integer the ID of the model to be loaded
     */
    public function FindByIdPersona($id) {
        $model = GrupoFamiliar::model()->findByAttributes(array('persona_id' => $id));
        if ($model === null)
            return FALSE;
        return $model;
    }

}
