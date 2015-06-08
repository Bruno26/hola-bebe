<?php

/**
 * This is the model class for table "tblparroquia".
 *
 * The followings are the available columns in table 'tblparroquia':
 * @property integer $clvcodigo
 * @property integer $clvmunicipio
 * @property string $strid
 * @property integer $clvparroquia_sunacoop
 * @property string $strdescripcion
 * @property string $intsuperficie
 * @property string $strlatitud
 * @property string $strlongitud
 * @property string $strlimite_norte
 * @property string $strlimite_sur
 * @property string $strlimite_este
 * @property string $strlimite_oeste
 * @property string $strobservaciones
 * @property boolean $blnprefijo
 * @property boolean $blncapital
 * @property boolean $blnurbana
 * @property boolean $blnborrado
 * @property string $dtmregistro
 * @property string $dtmmodificado
 * @property integer $clvusuario
 *
 * The followings are the available model relations:
 * @property Tblmunicipio $clvmunicipio0
 * @property Tblsector[] $tblsectors
 */
class Tblparroquia extends CActiveRecord
{
    public $parroquia;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblparroquia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clvusuario', 'required'),
			array('clvmunicipio, clvparroquia_sunacoop, clvusuario', 'numerical', 'integerOnly'=>true),
			array('strid', 'length', 'max'=>8),
			array('strdescripcion', 'length', 'max'=>40),
			array('intsuperficie', 'length', 'max'=>20),
			array('strlatitud, strlongitud', 'length', 'max'=>12),
			array('strlimite_norte, strlimite_sur, strlimite_este, strlimite_oeste, strobservaciones, blnprefijo, blncapital, blnurbana, blnborrado, dtmregistro, dtmmodificado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('clvcodigo, clvmunicipio, strid, clvparroquia_sunacoop, strdescripcion, intsuperficie, strlatitud, strlongitud, strlimite_norte, strlimite_sur, strlimite_este, strlimite_oeste, strobservaciones, blnprefijo, blncapital, blnurbana, blnborrado, dtmregistro, dtmmodificado, clvusuario', 'safe', 'on'=>'search'),
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
			'clvmunicipio0' => array(self::BELONGS_TO, 'Tblmunicipio', 'clvmunicipio'),
			'tblsectors' => array(self::HAS_MANY, 'Tblsector', 'clvparroquia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'clvcodigo' => 'Parroquia',
			'clvmunicipio' => 'Clvmunicipio',
			'strid' => 'Strid',
			'clvparroquia_sunacoop' => 'Clvparroquia Sunacoop',
			'strdescripcion' => 'Strdescripcion',
			'intsuperficie' => 'Intsuperficie',
			'strlatitud' => 'Strlatitud',
			'strlongitud' => 'Strlongitud',
			'strlimite_norte' => 'Strlimite Norte',
			'strlimite_sur' => 'Strlimite Sur',
			'strlimite_este' => 'Strlimite Este',
			'strlimite_oeste' => 'Strlimite Oeste',
			'strobservaciones' => 'Strobservaciones',
			'blnprefijo' => 'Blnprefijo',
			'blncapital' => 'Blncapital',
			'blnurbana' => 'Blnurbana',
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
		$criteria->compare('clvmunicipio',$this->clvmunicipio);
		$criteria->compare('strid',$this->strid,true);
		$criteria->compare('clvparroquia_sunacoop',$this->clvparroquia_sunacoop);
		$criteria->compare('strdescripcion',$this->strdescripcion,true);
		$criteria->compare('intsuperficie',$this->intsuperficie,true);
		$criteria->compare('strlatitud',$this->strlatitud,true);
		$criteria->compare('strlongitud',$this->strlongitud,true);
		$criteria->compare('strlimite_norte',$this->strlimite_norte,true);
		$criteria->compare('strlimite_sur',$this->strlimite_sur,true);
		$criteria->compare('strlimite_este',$this->strlimite_este,true);
		$criteria->compare('strlimite_oeste',$this->strlimite_oeste,true);
		$criteria->compare('strobservaciones',$this->strobservaciones,true);
		$criteria->compare('blnprefijo',$this->blnprefijo);
		$criteria->compare('blncapital',$this->blncapital);
		$criteria->compare('blnurbana',$this->blnurbana);
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
	 * @return Tblparroquia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
