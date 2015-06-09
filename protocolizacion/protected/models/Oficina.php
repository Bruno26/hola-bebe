<?php

/**
 * This is the model class for table "oficina".
 *
 * The followings are the available columns in table 'oficina':
 * @property integer $id_oficina
 * @property string $nombre
 * @property integer $parroquia_id
 * @property integer $persona_id_jefe
 * @property integer $estatus
 * @property string $observaciones
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 *
 * The followings are the available model relations:
 * @property Abogados[] $abogadoses
 * @property Maestro $estatus0
 * @property CrugeUser $usuarioIdCreacion
 * @property CrugeUser $usuarioIdActualizacion
 * @property Tblparroquia $parroquia
 */
class Oficina extends CActiveRecord {
   
    public $nacionalidad;
    public $cedula;
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'oficina';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('parroquia_id, persona_id_jefe, estatus, fecha_creacion, fecha_actualizacion, usuario_id_creacion, nombre', 'required'),
            array('parroquia_id, persona_id_jefe, estatus, usuario_id_creacion, usuario_id_actualizacion', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 100),
            array('observaciones', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_oficina, nombre, parroquia_id, persona_id_jefe, estatus, observaciones, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion, nacionalidad, cedula, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'abogadoses' => array(self::HAS_MANY, 'Abogados', 'oficina_id'),
            'estatus0' => array(self::BELONGS_TO, 'Maestro', 'estatus'),
            'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
            'usuarioIdActualizacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_actualizacion'),
            'parroquia' => array(self::BELONGS_TO, 'Tblparroquia', 'parroquia_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_oficina' => 'Id Oficina',
            'nombre' => 'Nombre',
            'parroquia_id' => 'Parroquia',
            'persona_id_jefe' => 'Persona Id Jefe',
            'estatus' => 'Estatus',
            'observaciones' => 'Observaciones',
            'fecha_creacion' => 'Fecha Creación',
            'fecha_actualizacion' => 'Fecha Actualización',
            'usuario_id_creacion' => 'Usuario Id Creación',
            'usuario_id_actualizacion' => 'Usuario Id Actualización',
            'nacionalidad' => 'Nacionalidad',
            'cedula' => 'Cedula',
            'primer_nombre' => 'Primer Nombre',
            'segundo_nombre' => 'Segundo Nombre',
            'primer_apellido' => 'Primer Apellido',
            'segundo_apellido' => 'Segundo Apellido',
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

        $criteria->compare('id_oficina', $this->id_oficina);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('parroquia_id', $this->parroquia_id);
        $criteria->compare('persona_id_jefe', $this->persona_id_jefe);
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
     * @return Oficina the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
