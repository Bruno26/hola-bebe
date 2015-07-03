<?php

/**
 * This is the model class for table "adjudicado_empadronador".
 *
 * The followings are the available columns in table 'adjudicado_empadronador':
 * @property integer $id_adjudicado_empadronador
 * @property integer $empadronador_censo_id
 * @property integer $beneficiario_temporal_id
 * @property integer $estatus
 * @property integer $usuario_creacion
 * @property string $fecha_creacion
 * @property integer $usuario_modificacion
 * @property string $fecha_actualizacion
 *
 * The followings are the available model relations:
 * @property EmpadronadorCenso $empadronadorCenso
 * @property BeneficiarioTemporal $beneficiarioTemporal
 * @property Maestro $estatus0
 * @property CrugeUser $usuarioCreacion
 * @property CrugeUser $usuarioModificacion
 */
class AdjudicadoEmpadronador extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'adjudicado_empadronador';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('empadronador_censo_id, beneficiario_temporal_id, estatus, usuario_creacion, fecha_creacion, fecha_actualizacion', 'required'),
            array('empadronador_censo_id, beneficiario_temporal_id, estatus, usuario_creacion, usuario_modificacion', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_adjudicado_empadronador, empadronador_censo_id, beneficiario_temporal_id, estatus, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_actualizacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'empadronadorCenso' => array(self::BELONGS_TO, 'EmpadronadorCenso', 'empadronador_censo_id'),
            'beneficiarioTemporal' => array(self::BELONGS_TO, 'BeneficiarioTemporal', 'beneficiario_temporal_id'),
            'estatus0' => array(self::BELONGS_TO, 'Maestro', 'estatus'),
            'usuarioCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_creacion'),
            'usuarioModificacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_modificacion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_adjudicado_empadronador' => 'Id Adjudicado Empadronador',
            'empadronador_censo_id' => 'Empadronador Censo',
            'beneficiario_temporal_id' => 'Beneficiario Temporal',
            'estatus' => 'Estatus',
            'usuario_creacion' => 'Usuario Creacion',
            'fecha_creacion' => 'Fecha Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
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

        $criteria->compare('id_adjudicado_empadronador', $this->id_adjudicado_empadronador);
        $criteria->compare('empadronador_censo_id', $this->empadronador_censo_id);
        $criteria->compare('beneficiario_temporal_id', $this->beneficiario_temporal_id);
        $criteria->compare('estatus', $this->estatus);
        $criteria->compare('usuario_creacion', $this->usuario_creacion);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('usuario_modificacion', $this->usuario_modificacion);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AdjudicadoEmpadronador the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
