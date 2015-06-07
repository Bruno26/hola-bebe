<?php

/**
 * This is the model class for table "tblmunicipio".
 *
 * The followings are the available columns in table 'tblmunicipio':
 * @property integer $clvcodigo
 * @property integer $clvestado
 * @property string $strid_estado
 * @property string $strid
 * @property integer $clvmunicipio_sunacoop
 * @property string $strdescripcion
 * @property boolean $blncapital
 * @property boolean $blnborrado
 * @property string $dtmregistro
 * @property string $dtmmodificado
 * @property integer $clvusuario
 *
 * The followings are the available model relations:
 * @property Tblestado $clvestado0
 * @property Tblparroquia[] $tblparroquias
 */
class Tblmunicipio extends CActiveRecord
{
    public $municipio;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblmunicipio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dtmregistro, clvusuario', 'required'),
			array('clvestado, clvmunicipio_sunacoop, clvusuario', 'numerical', 'integerOnly'=>true),
			array('strid_estado', 'length', 'max'=>2),
			array('strid', 'length', 'max'=>5),
			array('strdescripcion', 'length', 'max'=>40),
			array('blncapital, blnborrado, dtmmodificado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('clvcodigo, clvestado, strid_estado, strid, clvmunicipio_sunacoop, strdescripcion, blncapital, blnborrado, dtmregistro, dtmmodificado, clvusuario', 'safe', 'on'=>'search'),
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
			'clvestado0' => array(self::BELONGS_TO, 'Tblestado', 'clvestado'),
			'tblparroquias' => array(self::HAS_MANY, 'Tblparroquia', 'clvmunicipio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'clvcodigo' => 'Municipio',
			'clvestado' => 'Clvestado',
			'strid_estado' => 'Strid Estado',
			'strid' => 'Strid',
			'clvmunicipio_sunacoop' => 'Clvmunicipio Sunacoop',
			'strdescripcion' => 'Strdescripcion',
			'blncapital' => 'Blncapital',
			'blnborrado' => 'Blnborrado',
			'dtmregistro' => 'Dtmregistro',
			'dtmmodificado' => 'Dtmmodificado',
			'clvusuario' => 'Clvusuario',
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

		$criteria->compare('clvcodigo',$this->clvcodigo);
		$criteria->compare('clvestado',$this->clvestado);
		$criteria->compare('strid_estado',$this->strid_estado,true);
		$criteria->compare('strid',$this->strid,true);
		$criteria->compare('clvmunicipio_sunacoop',$this->clvmunicipio_sunacoop);
		$criteria->compare('strdescripcion',$this->strdescripcion,true);
		$criteria->compare('blncapital',$this->blncapital);
		$criteria->compare('blnborrado',$this->blnborrado);
		$criteria->compare('dtmregistro',$this->dtmregistro,true);
		$criteria->compare('dtmmodificado',$this->dtmmodificado,true);
		$criteria->compare('clvusuario',$this->clvusuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->db3;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblmunicipio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
