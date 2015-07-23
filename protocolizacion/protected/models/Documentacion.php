<?php

/**
 * This is the model class for table "documentacion".
 *
 * The followings are the available columns in table 'documentacion':
 * @property integer $id_documentacion
 * @property integer $tipo_documento_id
 * @property string $documento
 * @property integer $estatus
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 *
 * The followings are the available model relations:
 * @property Maestro $tipoDocumento
 * @property Maestro $estatus0
 * @property CrugeUser $usuarioIdCreacion
 * @property CrugeUser $usuarioIdActualizacion
 */
class Documentacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'documentacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_documento_id, documento, estatus, fecha_creacion, fecha_actualizacion, usuario_id_creacion', 'required'),
			array('tipo_documento_id, estatus, usuario_id_creacion, usuario_id_actualizacion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_documentacion, tipo_documento_id, documento, estatus, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion', 'safe', 'on'=>'search'),
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
			'tipoDocumento' => array(self::BELONGS_TO, 'Maestro', 'tipo_documento_id'),
			'estatus0' => array(self::BELONGS_TO, 'Maestro', 'estatus'),
			'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
			'usuarioIdActualizacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_actualizacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_documentacion' => 'Id Documentacion',
			'tipo_documento_id' => 'Tipo Documento',
			'documento' => 'Documento',
			'estatus' => 'Estatus',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_actualizacion' => 'Fecha Actualizacion',
			'usuario_id_creacion' => 'Usuario Id Creacion',
			'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
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

		$criteria->compare('id_documentacion',$this->id_documentacion);
		$criteria->compare('tipo_documento_id',$this->tipo_documento_id);
		$criteria->compare('documento',$this->documento,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_actualizacion',$this->fecha_actualizacion,true);
		$criteria->compare('usuario_id_creacion',$this->usuario_id_creacion);
		$criteria->compare('usuario_id_actualizacion',$this->usuario_id_actualizacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Documentacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
