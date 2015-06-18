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
                'actions' => array('create', 'update', 'createDatos', 'CulminarRegistro'),
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
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionCulminarRegistro($id) {
        Generico::renderTraza($id);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Beneficiario;
        $desarrollo = new Desarrollo;
        $vivienda = new Vivienda;
        $unidad_familiar = new UnidadFamiliar;
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Beneficiario']['fecha_ultimo_censo'])) {
            $model->attributes = $_POST['Beneficiario'];

            $Existe = BeneficiarioTemporal::model()->findByPk($model->beneficiario_temporal_id);
            if (empty($Existe)) {
                $this->render('create', array(
                    'model' => $model, 'desarrollo' => $desarrollo, 'municipio' => $municipio, 'estado' => $estado, 'parroquia' => $parroquia, 'error' => 1
                ));
                Yii::app()->end();
            } else {
                $model->fecha_creacion = 'now()';
                $model->fecha_actualizacion = 'now()';
                $model->fecha_ultimo_censo = Generico::formatoFecha($_POST['Beneficiario']['fecha_ultimo_censo']);
                $model->usuario_id_creacion = Yii::app()->user->id;
                $model->persona_id = $Existe->persona_id;
                if ($model->save()) {
                    $viviendaUpdate = ViviendaController::loadModel($Existe->vivienda_id);
                    $viviendaUpdate->construccion_mt2 = $_POST['vivienda']['construccion_mt2'];
                    if ($viviendaUpdate->save()) {
                        $unidad_familiar->nombre = $Existe->nombre_completo;
                        $unidad_familiar->beneficiario_id = $model->id_beneficiario;
                        $unidad_familiar->ingreso_total_familiar = '0.00';
                        $unidad_familiar->procedencia_beneficio_id = 140; //INIDICAR EN QUE MOMENTO SE CARGA ESTE DATO
                        $unidad_familiar->fuente_datos_entrada_id = 90;
                        $unidad_familiar->condicion_unidad_familiar_id = $_POST['UnidadFamiliar']['condicion_unidad_familiar_id']; //Berifivar cual es el id
                        $unidad_familiar->total_personas_cotizando = 0;
                        $unidad_familiar->fecha_creacion = 'now()';
                        $unidad_familiar->fecha_actualizacion = 'now()';
                        $unidad_familiar->usuario_id_creacion = Yii::app()->user->id;
                        if ($unidad_familiar->save()) {
                            $traza = Traza::actionInsertUpdateTraza(1, $model->id_beneficiario, 1);
                            $this->redirect(array('grupoFamiliar/create', 'id' => $unidad_familiar->id_unidad_familiar));
                            Yii::app()->end();
                        }
                    }
                }
            }
        }
        $this->render('create', array(
            'model' => $model, 'desarrollo' => $desarrollo, 'municipio' => $municipio, 'estado' => $estado, 'parroquia' => $parroquia, 'unidad_familiar' => $unidad_familiar, 'vivienda' => $vivienda
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
        $traza = Traza::VerificarTraza($id); // verifica el guardado de la traza
        if ($traza != 2) {
            Generico::renderTraza($id); //renderiza a la traza
        }

        $model = Beneficiario::model()->findByPk($id);
        $estado = new Tblestado;
        $municipio = new Tblmunicipio;
        $parroquia = new Tblparroquia;
        $faovPromedio = ConsultaOracle::getFaov($id, 1); //consulta la funcion faov por id de persona, para mostrar el calculo de promedio
        $faovMensual = ConsultaOracle::getFaov($id, 2); //consulta la funcion faov por id de persona, para mostrar el calculo de ingreso mesual
        $model->ingreso_mensual = ($faovMensual) ? $faovMensual : '0.00';
        $model->ingreso_promedio_faov = ($faovPromedio) ? $faovPromedio : '0.00';

//        $consulta = UnidadFamiliar::model()->findByAttributes(array('beneficiario_id' => $id)); // consulta a Unidad Familiar por el id_beneficiario 
//
//        $sqlIngreso = "select sum(ingreso_mensual) as ingreso from grupo_familiar where unidad_familiar_id=".$consulta->id_unidad_familiar.""; //consulta que suma cuanto es el ingreso de grupo familiar por id_beneficiario
//        $rowingreso = Yii::app()->db->createCommand($sqlIngreso)->queryRow();
////        echo '<pre>'; var_dump($rowingreso); die(); 
//        $consulta->ingreso_total_familiar=$rowingreso['ingreso'];  //insert para unidad familiar ingreso_total_familiar
//        
//        $sqlFaov = "select count(*) as faov from grupo_familiar where unidad_familiar_id=".$consulta->id_unidad_familiar.""; //consulta que suma cuantos cotizan en faov del grupo familiar por id_beneficiario
//        $rowFaov = Yii::app()->db->createCommand($sqlFaov)->queryRow();
//        
//        $consulta->total_personas_cotizando=$rowFaov['faov'];  //insert para unidad familiar total de personas cotizando


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
//            $model->ingreso_mensual = $_POST['Beneficiario']['ingreso_mensual'];
//            $model->ingreso_declarado = $_POST['Beneficiario']['ingreso_declarado'];
//            $model->ingreso_promedio_faov = $_POST['Beneficiario']['ingreso_promedio_faov'];

            if ($model->save()) {
                $idtraza = Traza::ObtenerIdTraza($idBeneficiario); // pemite la busqueda de la id de la traza 
                $delete = Traza::model()->findByPk($idtraza)->delete();

                $this->redirect(array('beneficiario/admin'));
            }
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
        } else
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
