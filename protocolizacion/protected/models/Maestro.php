<?php

/**
 * This is the model class for table "maestro".
 *
 * The followings are the available columns in table 'maestro':
 * @property integer $id_maestro
 * @property string $descripcion
 * @property integer $padre
 * @property integer $hijo
 * @property boolean $es_activo
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacio
 *
 * The followings are the available model relations:
 * @property Desarrollo[] $desarrollos
 * @property Desarrollo[] $desarrollos1
 * @property Abogados[] $abogadoses
 * @property TipoSubsidio[] $tipoSubsidios
 * @property TasaFongar[] $tasaFongars
 * @property ApoderadoObservador[] $apoderadoObservadors
 * @property AsignacionCenso[] $asignacionCensos
 * @property Vivienda[] $viviendas
 * @property Vivienda[] $viviendas1
 * @property BeneficiarioTemporal[] $beneficiarioTemporals
 * @property UnidadFamiliar[] $unidadFamiliars
 * @property UnidadFamiliar[] $unidadFamiliars1
 * @property UnidadFamiliar[] $unidadFamiliars2
 * @property UnidadHabitacional[] $unidadHabitacionals
 * @property UnidadHabitacional[] $unidadHabitacionals1
 * @property UnidadHabitacional[] $unidadHabitacionals2
 * @property TasaInteres[] $tasaInteres
 * @property SalarioSubsidio[] $salarioSubsidios
 * @property ReasignacionVivienda[] $reasignacionViviendas
 * @property ReasignacionVivienda[] $reasignacionViviendas1
 * @property Beneficiario[] $beneficiarios
 * @property Beneficiario[] $beneficiarios1
 * @property Beneficiario[] $beneficiarios2
 */
class Maestro extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'maestro';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('descripcion, fecha_creacion, fecha_actualizacion, usuario_id_creacion', 'required'),
            array('padre, hijo, usuario_id_creacion, usuario_id_actualizacio', 'numerical', 'integerOnly' => true),
            array('es_activo', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_maestro, descripcion, padre, hijo, es_activo, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacio', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'desarrollos' => array(self::HAS_MANY, 'Desarrollo', 'fuente_datos_entrada_id'),
            'desarrollos1' => array(self::HAS_MANY, 'Desarrollo', 'estatus'),
            'abogadoses' => array(self::HAS_MANY, 'Abogados', 'tipo_abogado_id'),
            'tipoSubsidios' => array(self::HAS_MANY, 'TipoSubsidio', 'estatus'),
            'tasaFongars' => array(self::HAS_MANY, 'TasaFongar', 'estatus'),
            'apoderadoObservadors' => array(self::HAS_MANY, 'ApoderadoObservador', 'estatus'),
            'asignacionCensos' => array(self::HAS_MANY, 'AsignacionCenso', 'estatus'),
            'viviendas' => array(self::HAS_MANY, 'Vivienda', 'tipo_vivienda_id'),
            'viviendas1' => array(self::HAS_MANY, 'Vivienda', 'estatus_vivienda_id'),
            'beneficiarioTemporals' => array(self::HAS_MANY, 'BeneficiarioTemporal', 'estatus'),
            'unidadFamiliars' => array(self::HAS_MANY, 'UnidadFamiliar', 'procedencia_beneficio_id'),
            'unidadFamiliars1' => array(self::HAS_MANY, 'UnidadFamiliar', 'condicion_unidad_familiar_id'),
            'unidadFamiliars2' => array(self::HAS_MANY, 'UnidadFamiliar', 'estatus'),
            'unidadHabitacionals' => array(self::HAS_MANY, 'UnidadHabitacional', 'tipo_documento_id'),
            'unidadHabitacionals1' => array(self::HAS_MANY, 'UnidadHabitacional', 'fuente_datos_entrada_id'),
            'unidadHabitacionals2' => array(self::HAS_MANY, 'UnidadHabitacional', 'estatus'),
            'tasaInteres' => array(self::HAS_MANY, 'TasaInteres', 'estatus'),
            'salarioSubsidios' => array(self::HAS_MANY, 'SalarioSubsidio', 'estatus'),
            'reasignacionViviendas' => array(self::HAS_MANY, 'ReasignacionVivienda', 'tipo_reasignacion_id'),
            'reasignacionViviendas1' => array(self::HAS_MANY, 'ReasignacionVivienda', 'estatus'),
            'beneficiarios' => array(self::HAS_MANY, 'Beneficiario', 'estatus_beneficiario_id'),
            'beneficiarios1' => array(self::HAS_MANY, 'Beneficiario', 'relacion_trabajo_id'),
            'beneficiarios2' => array(self::HAS_MANY, 'Beneficiario', 'sector_trabajo_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_maestro' => 'Id Maestro',
            'descripcion' => 'Descripcion',
            'padre' => 'Padre',
            'hijo' => 'Hijo',
            'es_activo' => 'Es Activo',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'usuario_id_creacion' => 'Usuario Id Creacion',
            'usuario_id_actualizacio' => 'Usuario Id Actualizacio',
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

        $criteria->compare('id_maestro', $this->id_maestro);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('padre', $this->padre);
        $criteria->compare('hijo', $this->hijo);
        $criteria->compare('es_activo', $this->es_activo);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('usuario_id_creacion', $this->usuario_id_creacion);
        $criteria->compare('usuario_id_actualizacio', $this->usuario_id_actualizacio);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function FindMaestrosByPadreSelect($IdPadre, $Order = false) {
        $criteria = new CDbCriteria;
        if (!$Order) {
            $criteria->order = 't.descripcion ASC';
        } else {
            $criteria->order = $Order;
        }
        $criteria->addColumnCondition(array('t.padre' => $IdPadre,));
        $criteria->addColumnCondition(array('t.es_activo' => true,));
        $data = CHtml::listData(self::model()->findAll($criteria), 'id_maestro', 'descripcion');
        return $data;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Maestro the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
