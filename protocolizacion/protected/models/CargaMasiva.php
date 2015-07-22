<?php

/**
 * This is the model class for table "carga_masiva".
 *
 * The followings are the available columns in table 'carga_masiva':
 * @property integer $id_carga_masiva
 * @property string $nombre_archivo
 * @property integer $num_lineas
 * @property string $tamano_archivo
 * @property string $mensajes_carga
 * @property string $observaciones
 * @property integer $estatus
 * @property integer $tipo_carga_masiva
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $usuario_id_creacion
 *
 * The followings are the available model relations:
 * @property Maestro $estatus0
 * @property Maestro $tipoCargaMasiva
 * @property CrugeUser $usuarioIdCreacion
 */
class CargaMasiva extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'carga_masiva';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('num_lineas, tamano_archivo, estatus, tipo_carga_masiva, fecha_inicio, usuario_id_creacion', 'required'),
			array('num_lineas, estatus, tipo_carga_masiva, usuario_id_creacion', 'numerical', 'integerOnly'=>true),
			array('nombre_archivo', 'length', 'max'=>200),

			array('nombre_archivo', 'safe'),
 			array('nombre_archivo', 'file', 'types' => 'csv', 'maxSize'=>5242880, 'allowEmpty' => true, 'wrongType'=>'Solo se permiten archivos csv.', 'tooLarge'=>'El archivo es demasiado grande! 5MB es el limite'),

			array('observaciones', 'length', 'max'=>400),
			array('mensajes_carga, fecha_fin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_carga_masiva, nombre_archivo, num_lineas, tamano_archivo, mensajes_carga, observaciones, estatus, tipo_carga_masiva, fecha_inicio, fecha_fin, usuario_id_creacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'estatus0' => array(self::BELONGS_TO, 'Maestro', 'estatus'),
			'tipoCargaMasiva' => array(self::BELONGS_TO, 'Maestro', 'tipo_carga_masiva'),
			'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_carga_masiva' => 'Id Carga Masiva',
			'nombre_archivo' => 'Nombre Archivo',
			'num_lineas' => 'Num Lineas',
			'tamano_archivo' => 'Tamano Archivo',
			'mensajes_carga' => 'Mensajes Carga',
			'observaciones' => 'Observaciones',
			'estatus' => 'Estatus',
			'tipo_carga_masiva' => 'Tipo Carga Masiva',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'usuario_id_creacion' => 'Usuario Id Creacion',
		);
	}



	public function tamano($bytes, $decimals = 2) {
    $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_carga_masiva',$this->id_carga_masiva);
		$criteria->compare('nombre_archivo',$this->nombre_archivo,true);
		$criteria->compare('num_lineas',$this->num_lineas);
		$criteria->compare('tamano_archivo',$this->tamano_archivo,true);
		$criteria->compare('mensajes_carga',$this->mensajes_carga,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('tipo_carga_masiva',$this->tipo_carga_masiva);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('usuario_id_creacion',$this->usuario_id_creacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CargaMasiva the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
