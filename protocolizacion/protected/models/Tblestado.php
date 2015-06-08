<?php

/**
 * This is the model class for table "tblestado".
 *
 * The followings are the available columns in table 'tblestado':
 * @property integer $clvcodigo
 * @property integer $clvregion
 * @property string $strid
 * @property string $strdescripcion
 * @property string $strcapital
 * @property boolean $blnborrado
 * @property string $dtmregistro
 * @property string $dtmmodificado
 * @property integer $clvusuario
 *
 * The followings are the available model relations:
 * @property Tblmunicipio[] $tblmunicipios
 * @property TblestadoLimite[] $tblestadoLimites
 * @property TblestadoLimite[] $tblestadoLimites1
 * @property Tblregion $clvregion0
 */
class Tblestado extends CActiveRecord {

    public $estado;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tblestado';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('dtmregistro, clvusuario', 'required'),
            array('clvcodigo, clvregion, clvusuario', 'numerical', 'integerOnly' => true),
            array('strid', 'length', 'max' => 2),
            array('strdescripcion', 'length', 'max' => 20),
            array('strcapital', 'length', 'max' => 30),
            array('blnborrado, dtmmodificado', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('clvcodigo, clvregion, strid, strdescripcion, strcapital, blnborrado, dtmregistro, dtmmodificado, clvusuario', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tblmunicipios' => array(self::HAS_MANY, 'Tblmunicipio', 'clvestado'),
            'tblestadoLimites' => array(self::HAS_MANY, 'TblestadoLimite', 'clvestado_1'),
            'tblestadoLimites1' => array(self::HAS_MANY, 'TblestadoLimite', 'clvestado_2'),
            'clvregion0' => array(self::BELONGS_TO, 'Tblregion', 'clvregion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'clvcodigo' => 'Estado',
            'clvregion' => 'Clvregion',
            'strid' => 'Strid',
            'strdescripcion' => 'Strdescripcion',
            'strcapital' => 'Strcapital',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('clvcodigo', $this->clvcodigo);
        $criteria->compare('clvregion', $this->clvregion);
        $criteria->compare('strid', $this->strid, true);
        $criteria->compare('strdescripcion', $this->strdescripcion, true);
        $criteria->compare('strcapital', $this->strcapital, true);
        $criteria->compare('blnborrado', $this->blnborrado);
        $criteria->compare('dtmregistro', $this->dtmregistro, true);
        $criteria->compare('dtmmodificado', $this->dtmmodificado, true);
        $criteria->compare('clvusuario', $this->clvusuario);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * @return CDbConnection the database connection used for this class
     */
    public function getDbConnection() {
        return Yii::app()->db3;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tblestado the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
