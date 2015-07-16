<?php

/**
 * This is the model class for table "tasa_interes".
 *
 * The followings are the available columns in table 'tasa_interes':
 * @property integer $id_tasa_interes
 * @property string $nombre_tasa_interes
 * @property string $tasa_interes
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Maestro $estatus0
 * @property CrugeUser $usuarioIdActualizacion
 * @property CrugeUser $usuarioIdCreacion
 * @property AnalisisCredito[] $analisisCreditos
 */
class TasaInteres extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tasa_interes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_tasa_interes, tasa_interes, fecha_creacion, fecha_actualizacion, usuario_id_creacion', 'required'),
			array('usuario_id_creacion, usuario_id_actualizacion, estatus', 'numerical', 'integerOnly'=>true),
			array('nombre_tasa_interes', 'length', 'max'=>100),
			array('tasa_interes', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tasa_interes, nombre_tasa_interes, tasa_interes, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion, estatus', 'safe', 'on'=>'search'),
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
			'usuarioIdActualizacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_actualizacion'),
			'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
			'analisisCreditos' => array(self::HAS_MANY, 'AnalisisCredito', 'tasa_interes_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tasa_interes' => 'Id Tasa Interes',
			'nombre_tasa_interes' => 'Nombre Tasa Interes',
			'tasa_interes' => 'Tasa Interes',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_actualizacion' => 'Fecha Actualizacion',
			'usuario_id_creacion' => 'Usuario Id Creacion',
			'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
			'estatus' => 'Estatus',
		);
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

		$criteria->compare('id_tasa_interes',$this->id_tasa_interes);
		$criteria->compare('nombre_tasa_interes',$this->nombre_tasa_interes,true);
		$criteria->compare('tasa_interes',$this->tasa_interes,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_actualizacion',$this->fecha_actualizacion,true);
		$criteria->compare('usuario_id_creacion',$this->usuario_id_creacion);
		$criteria->compare('usuario_id_actualizacion',$this->usuario_id_actualizacion);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TasaInteres the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
