<?php

/**
 * This is the model class for table "asignacion_censo".
 *
 * The followings are the available columns in table 'asignacion_censo':
 * @property integer $id_asignacion_censo
 * @property integer $desarrollo_id
 * @property integer $oficina_id
 * @property integer $persona_id
 * @property string $fecha_asignacion
 * @property boolean $censado
 * @property integer $estatus
 * @property string $observaciones
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 *
 * The followings are the available model relations:
 * @property Maestro $estatus0
 * @property Oficina $oficina
 * @property CrugeUser $usuarioIdActualizacion
 * @property CrugeUser $usuarioIdCreacion
 * @property Desarrollo $desarrollo
 */
class AsignacionCenso extends CActiveRecord {

    public $nacionalidad;
    public $cedula;
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $fecha_nac;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'asignacion_censo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('desarrollo_id, oficina_id, persona_id, fecha_asignacion, estatus, fecha_creacion, fecha_actualizacion, usuario_id_creacion', 'required'),
            array('desarrollo_id, oficina_id, persona_id, estatus, usuario_id_creacion, usuario_id_actualizacion', 'numerical', 'integerOnly' => true),
            array('observaciones', 'length', 'max' => 200),
            array('censado', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_asignacion_censo, desarrollo_id, oficina_id, persona_id, fecha_asignacion, censado, estatus, observaciones, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion', 'safe', 'on' => 'search'),
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
            'oficina' => array(self::BELONGS_TO, 'Oficina', 'oficina_id'),
            'usuarioIdActualizacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_actualizacion'),
            'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
            'desarrollo' => array(self::BELONGS_TO, 'Desarrollo', 'desarrollo_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_asignacion_censo' => 'Id Asignacion Censo',
            'desarrollo_id' => 'Nombre del Desarrollo Habitacional',
            'oficina_id' => 'Nombre de la Oficina',
            'persona_id' => 'Persona',
            'fecha_asignacion' => 'Fecha Asignacion',
            'censado' => 'Censado',
            'estatus' => 'Estatus',
            'observaciones' => 'Observaciones',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'usuario_id_creacion' => 'Usuario Id Creacion',
            'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
            'nacionalidad' => 'Nacionalidad',
            'cedula' => 'Cedula',
            'primer_nombre' => 'Primer Nombre',
            'segundo_nombre' => 'Segundo Nombre',
            'primer_apellido' => 'Primer Apellido',
            'segundo_apellido' => 'Segundo Apellido',
            'fecha_nac' => 'Fecha Nacimiento',
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

        $criteria->compare('id_asignacion_censo', $this->id_asignacion_censo);
        $criteria->compare('desarrollo_id', $this->desarrollo_id);
        $criteria->compare('oficina_id', $this->oficina_id);
        $criteria->compare('persona_id', $this->persona_id);
        $criteria->compare('fecha_asignacion', $this->fecha_asignacion, true);
        $criteria->compare('censado', $this->censado);
        $criteria->compare('estatus', $this->estatus);
        $criteria->compare('observaciones', $this->observaciones, true);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('usuario_id_creacion', $this->usuario_id_creacion);
        $criteria->compare('usuario_id_actualizacion', $this->usuario_id_actualizacion);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AsignacionCenso the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
