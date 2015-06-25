<?php

/**
 * This is the model class for table "empadronador_censo".
 *
 * The followings are the available columns in table 'empadronador_censo':
 * @property integer $id_empadronador_censo
 * @property integer $asignacion_censo_id
 * @property integer $empadronador_usuario_id
 * @property integer $estatus
 * @property integer $usuario_creacion
 * @property string $fecha_creacion
 * @property integer $usuario_modificacion
 * @property string $fecha_actualizacion
 *
 * The followings are the available model relations:
 * @property AdjudicadoEmpadronador[] $adjudicadoEmpadronadors
 * @property AsignacionCenso $asignacionCenso
 * @property CrugeUser $empadronadorUsuario
 * @property Maestro $estatus0
 * @property CrugeUser $usuarioCreacion
 * @property CrugeUser $usuarioModificacion
 */
class EmpadronadorCenso extends CActiveRecord {

    public $edoDes;
    public $munDes;
    public $parqDes;
    public $Des;
    public $UnidadMultifamiliar;
    public $UnidadUnifamiliar;
    public $BeneficiarioAdju;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'empadronador_censo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('asignacion_censo_id, empadronador_usuario_id, estatus, usuario_creacion, fecha_creacion, fecha_actualizacion', 'required'),
            array('asignacion_censo_id, empadronador_usuario_id, estatus, usuario_creacion, usuario_modificacion', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_empadronador_censo, asignacion_censo_id, empadronador_usuario_id, estatus, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_actualizacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'adjudicadoEmpadronadors' => array(self::HAS_MANY, 'AdjudicadoEmpadronador', 'empadronador_censo_id'),
            'asignacionCenso' => array(self::BELONGS_TO, 'AsignacionCenso', 'asignacion_censo_id'),
            'empadronadorUsuario' => array(self::BELONGS_TO, 'CrugeUser', 'empadronador_usuario_id'),
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
            'id_empadronador_censo' => 'Id Empadronador Censo',
            'asignacion_censo_id' => 'Asignacion Censo',
            'empadronador_usuario_id' => 'campo vinculado con los usuarios del cruge',
            'estatus' => 'Estatus',
            'usuario_creacion' => 'Usuario Creacion',
            'fecha_creacion' => 'Fecha Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'Des' => 'Desarrollo Habitacional',
            'edoDes' => 'Estado',
            'munDes' => 'Municipio',
            'parqDes' => 'Parroquia',
            'UnidadMultifamiliar' => 'Unidad MultiFamiliar',
            'UnidadUnifamiliar' => 'Unidad UniFamiliar',
            'BeneficiarioAdju' => 'Beneficiario Adjudicado',
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

        $criteria->compare('id_empadronador_censo', $this->id_empadronador_censo);
        $criteria->compare('asignacion_censo_id', $this->asignacion_censo_id);
        $criteria->compare('empadronador_usuario_id', $this->empadronador_usuario_id);
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
     * @return EmpadronadorCenso the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
