<?php

/**
 * This is the model class for table "grupo_familiar".
 *
 * The followings are the available columns in table 'grupo_familiar':
 * @property integer $id_grupo_familiar
 * @property integer $unidad_familiar_id
 * @property integer $persona_id
 * @property integer $gen_parentesco_id
 * @property integer $tipo_sujeto_atencion
 * @property string $ingreso_mensual
 * @property integer $fuente_datos_entrada_id
 * @property boolean $cotiza_faov
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Maestro $fuenteDatosEntrada
 * @property Maestro $genParentesco
 * @property UnidadFamiliar $unidadFamiliar
 * @property CrugeUser $usuarioIdActualizacion
 * @property CrugeUser $usuarioIdCreacion
 * @property Maestro $estatus0
 */
class GrupoFamiliar extends CActiveRecord {

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
        return 'grupo_familiar';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('unidad_familiar_id, persona_id, gen_parentesco_id, tipo_sujeto_atencion, ingreso_mensual, fuente_datos_entrada_id, fecha_creacion, fecha_actualizacion, usuario_id_creacion, estatus', 'required'),
            array('unidad_familiar_id, persona_id, gen_parentesco_id, tipo_sujeto_atencion, fuente_datos_entrada_id, usuario_id_creacion, usuario_id_actualizacion, estatus', 'numerical', 'integerOnly' => true),
            array('ingreso_mensual', 'length', 'max' => 16),
            array('cotiza_faov', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_grupo_familiar, unidad_familiar_id, persona_id, gen_parentesco_id, tipo_sujeto_atencion, ingreso_mensual, fuente_datos_entrada_id, cotiza_faov, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion, estatus,  nacionalidad, cedula, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'fuenteDatosEntrada' => array(self::BELONGS_TO, 'Maestro', 'fuente_datos_entrada_id'),
            'genParentesco' => array(self::BELONGS_TO, 'Maestro', 'gen_parentesco_id'),
            'unidadFamiliar' => array(self::BELONGS_TO, 'UnidadFamiliar', 'unidad_familiar_id'),
            'usuarioIdActualizacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_actualizacion'),
            'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
            'estatus0' => array(self::BELONGS_TO, 'Maestro', 'estatus'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_grupo_familiar' => 'Id Grupo Familiar',
            'unidad_familiar_id' => 'Unidad Familiar',
            'persona_id' => 'Persona',
            'gen_parentesco_id' => 'Parentesco',
            'tipo_sujeto_atencion' => 'Tipo Sujeto Atencion',
            'ingreso_mensual' => 'Ingreso Mensual',
            'fuente_datos_entrada_id' => 'Fuente Datos Entrada',
            'cotiza_faov' => 'Cotiza Faov',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'usuario_id_creacion' => 'Usuario Id Creacion',
            'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
            'estatus' => 'Estatus',
            'cedula' => 'Cédula',
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

        $criteria->compare('id_grupo_familiar', $this->id_grupo_familiar);
        $criteria->compare('unidad_familiar_id', $this->unidad_familiar_id);
        $criteria->compare('persona_id', $this->persona_id);
        $criteria->compare('gen_parentesco_id', $this->gen_parentesco_id);
        $criteria->compare('tipo_sujeto_atencion', $this->tipo_sujeto_atencion);
        $criteria->compare('ingreso_mensual', $this->ingreso_mensual, true);
        $criteria->compare('fuente_datos_entrada_id', $this->fuente_datos_entrada_id);
        $criteria->compare('cotiza_faov', $this->cotiza_faov);
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
     * @return GrupoFamiliar the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
