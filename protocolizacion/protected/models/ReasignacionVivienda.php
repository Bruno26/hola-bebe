<?php

/**
 * This is the model class for table "reasignacion_vivienda".
 *
 * The followings are the available columns in table 'reasignacion_vivienda':
 * @property integer $id_reasignacion_vivienda
 * @property integer $beneficiario_id_anterior
 * @property integer $beneficiario_id_actual
 * @property integer $vivienda_id
 * @property integer $tipo_reasignacion_id
 * @property integer $persona_id_autoriza
 * @property string $observaciones
 * @property string $fecha_reasignacion
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Maestro $estatus0
 * @property Maestro $tipoReasignacion
 * @property CrugeUser $usuarioIdActualizacion
 * @property CrugeUser $usuarioIdCreacion
 * @property BeneficiarioTemporal $beneficiarioIdActual
 * @property BeneficiarioTemporal $beneficiarioIdAnterior
 */
class ReasignacionVivienda extends CActiveRecord {

    public $cedulaAnterior;
    public $cedulaActual;
    public $nacionalidadAnterior;
    public $nacionalidadActual;
    public $nombreCompletoAnterior;
    public $nombreCompletoActual;
    public $desarrollo;
    public $unidad_habitacional;
    public $nro_piso;
    public $nro_vivienda;
    public $tipo_vivienda;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'reasignacion_vivienda';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('beneficiario_id_anterior, beneficiario_id_actual, vivienda_id, tipo_reasignacion_id, persona_id_autoriza, fecha_reasignacion, fecha_creacion, fecha_actualizacion, usuario_id_creacion, estatus', 'required'),
            array('beneficiario_id_anterior, beneficiario_id_actual, vivienda_id, tipo_reasignacion_id, persona_id_autoriza, usuario_id_creacion, usuario_id_actualizacion, estatus', 'numerical', 'integerOnly' => true),
            array('observaciones', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_reasignacion_vivienda, beneficiario_id_anterior, beneficiario_id_actual, vivienda_id, tipo_reasignacion_id, persona_id_autoriza, observaciones, fecha_reasignacion, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion, estatus', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'estatus0' => array(self::BELONGS_TO, 'Maestro', 'estatus'),
            'tipoReasignacion' => array(self::BELONGS_TO, 'Maestro', 'tipo_reasignacion_id'),
            'usuarioIdActualizacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_actualizacion'),
            'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
            'beneficiarioIdActual' => array(self::BELONGS_TO, 'BeneficiarioTemporal', 'beneficiario_id_actual'),
            'beneficiarioIdAnterior' => array(self::BELONGS_TO, 'BeneficiarioTemporal', 'beneficiario_id_anterior'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_reasignacion_vivienda' => 'Id Reasignacion Vivienda',
            'beneficiario_id_anterior' => 'Beneficiario Id Anterior',
            'beneficiario_id_actual' => 'Beneficiario Id Actual',
            'vivienda_id' => 'Vivienda',
            'tipo_reasignacion_id' => 'Tipo Reasignacion',
            'persona_id_autoriza' => 'Persona Id Autoriza',
            'observaciones' => 'Observaciones',
            'fecha_reasignacion' => 'Fecha Reasignacion',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'usuario_id_creacion' => 'Usuario Id Creacion',
            'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
            'estatus' => 'Estatus',
            'cedulaAnterior' => 'Cédula del Beneficiario Anterior',
            'nacionalidadAnterior' => 'Nacionalidad del Beneficiario Anterior',
            'nombreCompletoAnterior' => 'Nombre Completo del Beneficiario Anterior',
            'cedulaActual' => 'Cédula del Beneficiario Actual',
            'nacionalidadActual' => 'Nacionalidad del Beneficiario Actual',
            'nombreCompletoActual' => 'Nombre Completo del Beneficiario Actual',
            'desarrollo' => 'Nombre del Desarrollo',
            'unidad_habitacional' => 'Nombre de Unidad Familiar',
            'nro_piso' => 'Numero Piso',
            'nro_vivienda' => 'Numero Vivienda',
            'tipo_vivienda' => 'Numero Vivienda',
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

        $criteria->compare('id_reasignacion_vivienda', $this->id_reasignacion_vivienda);
        $criteria->compare('beneficiario_id_anterior', $this->beneficiario_id_anterior);
        $criteria->compare('beneficiario_id_actual', $this->beneficiario_id_actual);
        $criteria->compare('vivienda_id', $this->vivienda_id);
        $criteria->compare('tipo_reasignacion_id', $this->tipo_reasignacion_id);
        $criteria->compare('persona_id_autoriza', $this->persona_id_autoriza);
        $criteria->compare('observaciones', $this->observaciones, true);
        $criteria->compare('fecha_reasignacion', $this->fecha_reasignacion, true);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('usuario_id_creacion', $this->usuario_id_creacion);
        $criteria->compare('usuario_id_actualizacion', $this->usuario_id_actualizacion);
        $criteria->compare('estatus', $this->estatus);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ReasignacionVivienda the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
