<?php

/**
 * This is the model class for table "beneficiario_temporal".
 *
 * The followings are the available columns in table 'beneficiario_temporal':
 * @property integer $id_beneficiario_temporal
 * @property integer $persona_id
 * @property integer $desarrollo_id
 * @property integer $unidad_habitacional_id
 * @property integer $vivienda_id
 * @property integer $id_control
 * @property integer $nacionalidad
 * @property integer $cedula
 * @property string $nombre_completo
 * @property string $nombre_archivo
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Desarrollo $desarrollo
 * @property UnidadHabitacional $unidadHabitacional
 * @property CrugeUser $usuarioIdCreacion
 * @property CrugeUser $usuarioIdActualizacion
 * @property Maestro $estatus0
 * @property Maestro $fkNacionalidad
 */
class BeneficiarioTemporal extends CActiveRecord {
    /*   ---------------  Campos de Persona Necesarios ------------------ */

    public $cedula;
    public $nacionalidad;
    public $primer_nombre;
    public $primer_apellido;
    public $segundo_nombre;
    public $segundo_apellido;
    public $fecha_censo;
    public $fecha_nacimiento;
    public $estado_civil;
    public $telf_habitacion;
    public $telf_celular;
    public $correo_electronico;
    public $estado;
    public $municipio;
    public $nomb_edif;
    public $piso;
    public $vivienda_nro;
    public $area_vivienda;
    public $tipo_vivienda;
    public $observacion;
    public $sexo;

    /*   ---------------------------------------------------------------- */

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'beneficiario_temporal';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('persona_id, desarrollo_id, unidad_habitacional_id, vivienda_id, nacionalidad, cedula, nombre_completo, fecha_creacion, fecha_actualizacion, usuario_id_creacion', 'required'),
            array('persona_id, desarrollo_id, unidad_habitacional_id, vivienda_id, id_control, nacionalidad, cedula, usuario_id_creacion, usuario_id_actualizacion, estatus', 'numerical', 'integerOnly' => true),
            array('nombre_completo, nombre_archivo', 'length', 'max' => 200),
            array('cedula', 'length', 'max' => 8),
            array('telf_celular,telf_habitacion', 'length', 'max' => 11),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_beneficiario_temporal, persona_id, desarrollo_id, unidad_habitacional_id, vivienda_id, id_control, nacionalidad, cedula, nombre_completo, nombre_archivo, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion, estatus', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'desarrollo' => array(self::BELONGS_TO, 'Desarrollo', 'desarrollo_id'),
            'unidadHabitacional' => array(self::BELONGS_TO, 'UnidadHabitacional', 'unidad_habitacional_id'),
            'vivienda' => array(self::BELONGS_TO, 'Vivienda', 'vivienda_id'),
            'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
            'usuarioIdActualizacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_actualizacion'),
            'estatus0' => array(self::BELONGS_TO, 'Maestro', 'estatus'),
            'fkNacionalidad' => array(self::BELONGS_TO, 'Maestro', 'nacionalidad'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'telf_habitacion' => 'Teléfono Habitación',
            'telf_celular' => 'Teléfono Celular',
            'correo_electronico' => 'Correo Electrónico',
            'nomb_edif' => 'Nombre Edificación',
            'numero' => 'Número',
            'area_vivienda' => 'Área de Vivienda mt2',
            'vivienda_nro' => 'Número de Vivienda',
            'id_beneficiario_temporal' => 'Id Beneficiario Temporal',
            'persona_id' => 'Persona',
            'desarrollo_id' => 'Desarrollo',
            'unidad_habitacional_id' => 'Unidad Multifamiliar',
            'vivienda_id' => 'Vivienda',
            'id_control' => 'Id Control',
            'nacionalidad' => 'Nacionalidad',
            'cedula' => 'Cedula',
            'nombre_completo' => 'Nombre Completo',
            'nombre_archivo' => 'Nombre Archivo',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'usuario_id_creacion' => 'Usuario Id Creacion',
            'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
            'estatus' => 'Estatus',
        );
    }

    /* --------------------------------------------- */

    public function getBeneficiarioTemp($nacionalidad, $cedula) {

        $SLQ = "select bt.desarrollo_id,bt.vivienda_id,bt.nacionalidad,bt.cedula,uh.nombre As nombre_unidad,des.nombre As Desarrollo from beneficiario_temporal bt 
inner join unidad_habitacional uh on bt.unidad_habitacional_id = uh.id_unidad_habitacional
left  join desarrollo des on uh.desarrollo_id = des.id_desarrollo
inner join vivienda on bt.vivienda_id = vivienda.id_vivienda WHERE bt.nacionalidad ='" . $nacionalidad . "' AND bt.cedula = " . $cedula;
        $result = Yii::app()->dbOarcle->createCommand($SLQ)->queryRow();

        if (empty($result)) {
            return 1;
        } else {
            return $result;
        }
    }

    /* ---------------------------------------------- */

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
        $criteria->order = 'id_beneficiario_temporal DESC';
        $criteria->compare('id_beneficiario_temporal', $this->id_beneficiario_temporal);
        $criteria->compare('persona_id', $this->persona_id);
        $criteria->compare('desarrollo_id', $this->desarrollo_id);
        $criteria->compare('unidad_habitacional_id', $this->unidad_habitacional_id);
        $criteria->compare('vivienda_id', $this->vivienda_id);
        $criteria->compare('id_control', $this->id_control);
        $criteria->compare('nacionalidad', $this->nacionalidad);
        $criteria->compare('cedula', $this->cedula);
        $criteria->compare('nombre_completo', $this->nombre_completo, true);
        $criteria->compare('nombre_archivo', $this->nombre_archivo, true);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('usuario_id_creacion', $this->usuario_id_creacion);
        $criteria->compare('usuario_id_actualizacion', $this->usuario_id_actualizacion);
        $criteria->compare('estatus', $this->estatus);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**     *
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BeneficiarioTemporal the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
