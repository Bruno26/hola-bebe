<?php

/**
 * This is the model class for table "abogados".
 *
 * The followings are the available columns in table 'abogados':
 * @property integer $id
 * @property integer $persona_id
 * @property string $inpreabogado
 * @property integer $tipo_abogado_id
 * @property integer $oficina_id
 * @property string $observaciones
 * @property integer $estatus
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 * @property string $rif_abogado
 * @property integer $registro_publico_id
 * @property integer $nun_protocolo
 * @property string $folio
 * @property string $tomo
 * @property string $anio
 *
 * The followings are the available model relations:
 * @property Maestro $estatus0
 * @property Oficina $oficina
 * @property Maestro $tipoAbogado
 * @property CrugeUser $usuarioIdActualizacion
 * @property CrugeUser $usuarioIdCreacion
 * @property RegistroPublico $registroPublico
 * @property Maestro $nunProtocolo
 */
class Abogados extends CActiveRecord {

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
        return 'abogados';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('persona_id, tipo_abogado_id, oficina_id, estatus, fecha_creacion, usuario_id_creacion', 'required'),
            array('persona_id, tipo_abogado_id, oficina_id, estatus, usuario_id_creacion, usuario_id_actualizacion, registro_publico_id, nun_protocolo', 'numerical', 'integerOnly' => true),
            array('inpreabogado', 'length', 'max' => 7),
            array('tomo', 'length', 'max' => 3),
            array('observaciones', 'length', 'max' => 200),
            array('rif_abogado, folio', 'length', 'max' => 12),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, persona_id, inpreabogado, tipo_abogado_id, oficina_id, observaciones, estatus, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion, rif_abogado, registro_publico_id, nun_protocolo, folio, tomo, anio', 'safe', 'on' => 'search'),
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
            'oficinaId' => array(self::BELONGS_TO, 'Oficina', 'oficina_id'),
            'tipoAbogado' => array(self::BELONGS_TO, 'Maestro', 'tipo_abogado_id'),
            'usuarioIdActualizacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_actualizacion'),
            'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
            'registroPublico' => array(self::BELONGS_TO, 'RegistroPublico', 'registro_publico_id'),
            'nunProtocolo' => array(self::BELONGS_TO, 'Maestro', 'nun_protocolo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'persona_id' => 'Persona',
            'inpreabogado' => 'Inpreabogado',
            'tipo_abogado_id' => 'Tipo Abogado',
            'oficina_id' => 'Oficina',
            'observaciones' => 'Observaciones',
            'estatus' => 'Estatus',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'usuario_id_creacion' => 'Usuario Id Creacion',
            'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
            'rif_abogado' => '',
            'registro_publico_id' => '',
            'nun_protocolo' => '',
            'folio' => '',
            'tomo' => '',
            'anio' => '',
            'nacionalidad' => 'Nacionalidad',
            'cedula' => 'Cédula',
            'primer_nombre' => 'Primer Nombre',
            'segundo_nombre' => 'Segundo Nombre',
            'primer_apellido' => 'Primer Apellido',
            'segundo_apellido' => 'Segundo Apellido',
            'fecha_nac' => 'Fecha de Nacimiento',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('persona_id', $this->persona_id);
        $criteria->compare('inpreabogado', $this->inpreabogado, true);
        $criteria->compare('tipo_abogado_id', $this->tipo_abogado_id);
        $criteria->compare('oficina_id', $this->oficina_id);
        $criteria->compare('observaciones', $this->observaciones, true);
        $criteria->compare('estatus', $this->estatus);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('usuario_id_creacion', $this->usuario_id_creacion);
        $criteria->compare('usuario_id_actualizacion', $this->usuario_id_actualizacion);
        $criteria->compare('rif_abogado', $this->rif_abogado, true);
        $criteria->compare('registro_publico_id', $this->registro_publico_id);
        $criteria->compare('nun_protocolo', $this->nun_protocolo);
        $criteria->compare('folio', $this->folio, true);
        $criteria->compare('tomo', $this->tomo, true);
        $criteria->compare('anio', $this->anio, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Abogados the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
