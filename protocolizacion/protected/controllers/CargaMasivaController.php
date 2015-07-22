<?php

class CargaMasivaController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
//public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('admin'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate(){

  $model=new CargaMasiva;
  $estado = new Tblestado;
  $municipio = new Tblmunicipio;
  $parroquia = new Tblparroquia;
  $desarrollo = new Desarrollo;
  $error = FALSE;
  $cant_columnas = 34;
  // Uncomment the following line if AJAX validation is needed
  // $this->performAjaxValidation($model);
  $model->estatus = 100;
  $model->tipo_carga_masiva = 1;
  $model->usuario_id_creacion = 1;


  if(isset($_POST['CargaMasiva']))
  {
  $model->attributes=$_POST['CargaMasiva'];

  $model->nombre_archivo = CUploadedFile::getInstance($model, 'nombre_archivo');

  $fp = fopen($model->nombre_archivo->tempName, 'r');

 if(!$fp){
    echo Yii::app()->user->setFlash('error', "No se pudo abrir el archivo para validarlo, asegurese que tiene permisos de lectura-escritura sobre el archivo.");
    $error=TRUE;
    //echo "no se pudo abrir el archivo";die();
  $this->redirect(array('cargaMasiva/index'));
  }

  $i=0;
  while (( $data = fgetcsv ( $fp , 1000 , ";" )) !== FALSE ){
      if ($i > 0){
      $j= $i+1;
        if(count($data) != $cant_columnas){
          echo Yii::app()->user->setFlash('error', "El archivo no tiene la cantidad de campos requeridos, por favor revise que existan solo $cant_columnas columnas en el archivo.");
          $error = TRUE;
          //echo "el archivo debe tener 7 columnas...";die();
        }
      } $i++;
  }


  if ($error == FALSE){
      $archivo = Yii::app()->basePath.'/../images/'.$model->nombre_archivo;
      $model->nombre_archivo->saveAs($archivo);

      $model->num_lineas = count(file($archivo));
      $model->tamano_archivo = filesize($archivo);


      $perl = "/usr/bin/perl";
      $result = 0;
      $result = shell_exec("$perl /var/www/html/carga-perl/inicio.pl $archivo");
      $model->observaciones = "$archivo Despues del script: ".$result;
      if($model->save()){
        $this->redirect(array('view','id'=>$model->id_carga_masiva));
      }


  }
}//fin del post global de carga masiva
  $this->render('create',array( 'model'=>$model, 'estado' => $estado,
  'municipio' => $municipio, 'parroquia' => $parroquia, 'desarrollo' => $desarrollo));


}//fin accion create carga

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['CargaMasiva']))
{
$model->attributes=$_POST['CargaMasiva'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_carga_masiva));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('CargaMasiva');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new CargaMasiva('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['CargaMasiva']))
$model->attributes=$_GET['CargaMasiva'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=CargaMasiva::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='carga-masiva-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
