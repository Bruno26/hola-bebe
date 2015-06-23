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
 * @property Oficina $oficinaId
 * @property Maestro $tipoAbogado
 */
class Abogados extends CActiveRecord {

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
        return 'abogados';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('persona_id, tipo_abogado_id, oficina_id, estatus, fecha_creacion, fecha_actualizacion, usuario_id_creacion', 'required'),
            array('persona_id, tipo_abogado_id, oficina_id, estatus, usuario_id_creacion, usuario_id_actualizacion', 'numerical', 'integerOnly' => true),
            array('inpreabogado', 'length', 'max' => 20),
            array('observaciones', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, persona_id, inpreabogado, tipo_abogado_id, oficina_id, observaciones, estatus, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion, nacionalidad, cedula, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'oficinaId' => array(self::BELONGS_TO, 'Oficina', 'oficina_id'),
            'tipoAbogado' => array(self::BELONGS_TO, 'Maestro', 'tipo_abogado_id'),
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
            'tipo_abogado_id' => 'Tipo de Agente',
            'oficina_id' => 'Oficina',
            'observaciones' => 'Observaciones',
            'estatus' => 'Estatus',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'usuario_id_creacion' => 'Usuario Id Creacion',
            'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
            'nacionalidad' => 'Nacionalidad',
            'cedula' => 'Cedula',
            'primer_nombre' => 'Nombre',
            'segundo_nombre' => 'Nombre',
            'primer_apellido' => 'Apellido',
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

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

//    public static function getListvendedor() {
//
//        return CHtml::listData(Oficina::model()->findAll(array(
//                            'select' => "id_us_usuario, var_usuario ||' - '|| var_nombre1 ||' '|| var_apellido1 as var_usuario",
//                            'condition' => "var_estatus = 'act' AND id_li_us_cargo = '4'",
//                            'order' => "var_usuario ASC")), 'id_us_usuario', 'var_usuario');
//    }

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
