<?php

class AnalisisCreditoController extends Controller {
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
    public function actionCreate($id) {
        $model = new AnalisisCredito;
        $beneficiario = Beneficiario::model()->findByPk($id);
        $desarrollo = $beneficiario->beneficiarioTemporal->desarrollo;
        $desarrollo->fuente_financiamiento_id = $desarrollo->fuente_financiamiento_id;
        if ($desarrollo->fuente_financiamiento_id == 2) {
            $faov = 'AND  gr.tipo_persona_faov = 235 ';
        } else {
            $faov = ' ';
        }
        $model->unidad_familiar_id = UnidadFamiliar::model()->findByAttributes(array('beneficiario_id' => $beneficiario->id_beneficiario))->id_unidad_familiar;
        $grupoFamiliar = "SELECT gr.ingreso_mensual, gr.ingreso_mensual_faov  FROM grupo_familiar gr
                        JOIN unidad_familiar fa ON  gr.unidad_familiar_id= fa.id_unidad_familiar AND fa.beneficiario_id = " . $id . "AND fa.estatus = 77
                        WHERE gr.estatus = 41 " . $faov;

        $result = Yii::app()->db->createCommand($grupoFamiliar)->queryAll();

        $totalSueldoDeclarado = array();
        $totalSueldoFaov = array();
        $TableSueldo = '<table class="table table-bordered">';
        $TableSueldo.='<th>Sueldo Declarado</th>';
        $TableSueldo.='<tr><td>Bs. ' . number_format($beneficiario->ingreso_declarado, 2, '.', '') . '</td></tr>';


        $TableSueldoFaov = '<table class="table table-bordered">';
        $TableSueldoFaov.='<th>Sueldo Según Faov</th>';
        $TableSueldoFaov.='<tr><td>Bs. ' . number_format($beneficiario->ingreso_promedio_faov, 2, '.', '') . '</td></tr>';
        array_push($totalSueldoDeclarado, $beneficiario->ingreso_declarado);
        array_push($totalSueldoFaov, $beneficiario->ingreso_promedio_faov);

        foreach ($result AS $fila) {
            $TableSueldo.='<tr><td> Bs.' . $fila['ingreso_mensual'] . '</td></tr>';
            $TableSueldoFaov.='<tr><td> Bs.' . $fila['ingreso_mensual_faov'] . '</td></tr>';
            array_push($totalSueldoDeclarado, $fila['ingreso_mensual']);
            array_push($totalSueldoFaov, $fila['ingreso_mensual_faov']);
        }
        $TableSueldo.='<th>Total: Bs.' . array_sum($totalSueldoDeclarado) . ' <input onclick="RecalculoDeInteres()" type="radio" name="opciones" id="opciones_2" checked value="' . array_sum($totalSueldoDeclarado) . '"></th>';
        $TableSueldoFaov.='<th>Total: Bs.' . array_sum($totalSueldoFaov) . ' <input onclick="RecalculoDeInteres()" type="radio" name="opciones" id="opciones_1" value="' . array_sum($totalSueldoFaov) . '"></th>';

        $TableSueldo.='</table>';
        $TableSueldoFaov.='</table>';

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['AnalisisCredito'])) {
            $model->attributes = $_POST['AnalisisCredito'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_analisis_credito));
        }

        $this->render('create', array('model' => $model, 'beneficiario' => $beneficiario, 'desarrollo' => $desarrollo, 'TableSueldo' => $TableSueldo, 'TableSueldoFaov' => $TableSueldoFaov));
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

        if (isset($_POST['AnalisisCredito'])) {
            $model->attributes = $_POST['AnalisisCredito'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_analisis_credito));
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
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
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
        $model = AnalisisCredito::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'analisis-credito-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
