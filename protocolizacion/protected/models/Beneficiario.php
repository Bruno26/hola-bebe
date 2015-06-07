<?php

/**
 * This is the model class for table "beneficiario".
 *
 * The followings are the available columns in table 'beneficiario':
 * @property integer $id_beneficiario
 * @property integer $persona_id
 * @property string $rif
 * @property integer $condicion_trabajo_id
 * @property integer $fuente_ingreso_id
 * @property integer $relacion_trabajo_id
 * @property integer $sector_trabajo_id
 * @property string $nombre_empresa
 * @property string $direccion_empresa
 * @property string $telefono_trabajo
 * @property integer $gen_cargo_id
 * @property string $ingreso_mensual
 * @property string $ingreso_declarado
 * @property string $ingreso_promedio_faov
 * @property boolean $cotiza_faov
 * @property string $direccion_anterior
 * @property integer $geo_estado_id
 * @property integer $geo_municipio_id
 * @property integer $geo_parroquia_id
 * @property string $urban_barrio
 * @property string $av_call_esq_carr
 * @property string $zona
 * @property string $fecha_ultimo_censo
 * @property boolean $protocolizado
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 * @property integer $estatus_beneficiario_id
 * @property string $codigo_trab
 *
 * The followings are the available model relations:
 * @property UnidadFamiliar[] $unidadFamiliars
 * @property ReasignacionVivienda[] $reasignacionViviendas
 * @property ReasignacionVivienda[] $reasignacionViviendas1
 * @property Maestro $estatusBeneficiario
 * @property Maestro $relacionTrabajo
 * @property Maestro $sectorTrabajo
 * @property CrugeUser $usuarioIdCreacion
 * @property CrugeUser $usuarioIdActualizacion
 */
class Beneficiario extends CActiveRecord {
    public $cedula;
    public $primer_nombre;
    public $primer_apellido;
    public $nacionalidad;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'beneficiario';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('persona_id, rif, condicion_trabajo_id, fuente_ingreso_id, relacion_trabajo_id, sector_trabajo_id, ingreso_mensual, ingreso_declarado, ingreso_promedio_faov, direccion_anterior, geo_estado_id, geo_municipio_id, geo_parroquia_id, fecha_ultimo_censo, fecha_creacion, fecha_actualizacion, usuario_id_creacion', 'required'),
            array('persona_id, condicion_trabajo_id, fuente_ingreso_id, relacion_trabajo_id, sector_trabajo_id, gen_cargo_id, geo_estado_id, geo_municipio_id, geo_parroquia_id, usuario_id_creacion, usuario_id_actualizacion, estatus_beneficiario_id', 'numerical', 'integerOnly' => true),
            array('rif', 'length', 'max' => 10),
            array('nombre_empresa, direccion_empresa, direccion_anterior, urban_barrio, av_call_esq_carr, zona', 'length', 'max' => 200),
            array('telefono_trabajo', 'length', 'max' => 7),
            array('codigo_trab', 'length', 'max' => 4),
            array('cotiza_faov, protocolizado', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_beneficiario, persona_id, rif, condicion_trabajo_id, fuente_ingreso_id, relacion_trabajo_id, sector_trabajo_id, nombre_empresa, direccion_empresa, telefono_trabajo, gen_cargo_id, ingreso_mensual, ingreso_declarado, ingreso_promedio_faov, cotiza_faov, direccion_anterior, geo_estado_id, geo_municipio_id, geo_parroquia_id, urban_barrio, av_call_esq_carr, zona, fecha_ultimo_censo, protocolizado, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion, estatus_beneficiario_id, codigo_trab', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'unidadFamiliars' => array(self::HAS_MANY, 'UnidadFamiliar', 'beneficiario_id'),
            'reasignacionViviendas' => array(self::HAS_MANY, 'ReasignacionVivienda', 'beneficiario_id_anterior'),
            'reasignacionViviendas1' => array(self::HAS_MANY, 'ReasignacionVivienda', 'beneficiario_id_actual'),
            'estatusBeneficiario' => array(self::BELONGS_TO, 'Maestro', 'estatus_beneficiario_id'),
            'relacionTrabajo' => array(self::BELONGS_TO, 'Maestro', 'relacion_trabajo_id'),
            'sectorTrabajo' => array(self::BELONGS_TO, 'Maestro', 'sector_trabajo_id'),
            'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
            'usuarioIdActualizacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_actualizacion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_beneficiario' => 'Id Beneficiario',
            'persona_id' => 'Persona',
            'rif' => 'Rif',
            'condicion_trabajo_id' => 'Condicion Trabajo',
            'fuente_ingreso_id' => 'Fuente Ingreso',
            'relacion_trabajo_id' => 'Relacion Trabajo',
            'sector_trabajo_id' => 'Sector Trabajo',
            'nombre_empresa' => 'Nombre Empresa',
            'direccion_empresa' => 'Direccion Empresa',
            'telefono_trabajo' => 'Telefono Trabajo',
            'gen_cargo_id' => 'Gen Cargo',
            'ingreso_mensual' => 'Ingreso Mensual',
            'ingreso_declarado' => 'Ingreso Declarado',
            'ingreso_promedio_faov' => 'Ingreso Promedio Faov',
            'cotiza_faov' => 'Cotiza Faov',
            'direccion_anterior' => 'Direccion Anterior',
            'geo_estado_id' => 'Geo Estado',
            'geo_municipio_id' => 'Geo Municipio',
            'geo_parroquia_id' => 'Geo Parroquia',
            'urban_barrio' => 'Urban Barrio',
            'av_call_esq_carr' => 'Av Call Esq Carr',
            'zona' => 'Zona',
            'fecha_ultimo_censo' => 'Fecha Ultimo Censo',
            'protocolizado' => 'Protocolizado',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'usuario_id_creacion' => 'Usuario Id Creacion',
            'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
            'estatus_beneficiario_id' => 'Estatus Beneficiario',
            'codigo_trab' => 'Codigo Trab',
            'cedula' => 'Cédula',
            'primer_nombre' => 'Primer Nombre',
            'primer_apellido' => 'Primer Apellido',
            'nacionalidad' => 'Nacionalidad',
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

        $criteria->compare('id_beneficiario', $this->id_beneficiario);
        $criteria->compare('persona_id', $this->persona_id);
        $criteria->compare('rif', $this->rif, true);
        $criteria->compare('condicion_trabajo_id', $this->condicion_trabajo_id);
        $criteria->compare('fuente_ingreso_id', $this->fuente_ingreso_id);
        $criteria->compare('relacion_trabajo_id', $this->relacion_trabajo_id);
        $criteria->compare('sector_trabajo_id', $this->sector_trabajo_id);
        $criteria->compare('nombre_empresa', $this->nombre_empresa, true);
        $criteria->compare('direccion_empresa', $this->direccion_empresa, true);
        $criteria->compare('telefono_trabajo', $this->telefono_trabajo, true);
        $criteria->compare('gen_cargo_id', $this->gen_cargo_id);
        $criteria->compare('ingreso_mensual', $this->ingreso_mensual, true);
        $criteria->compare('ingreso_declarado', $this->ingreso_declarado, true);
        $criteria->compare('ingreso_promedio_faov', $this->ingreso_promedio_faov, true);
        $criteria->compare('cotiza_faov', $this->cotiza_faov);
        $criteria->compare('direccion_anterior', $this->direccion_anterior, true);
        $criteria->compare('geo_estado_id', $this->geo_estado_id);
        $criteria->compare('geo_municipio_id', $this->geo_municipio_id);
        $criteria->compare('geo_parroquia_id', $this->geo_parroquia_id);
        $criteria->compare('urban_barrio', $this->urban_barrio, true);
        $criteria->compare('av_call_esq_carr', $this->av_call_esq_carr, true);
        $criteria->compare('zona', $this->zona, true);
        $criteria->compare('fecha_ultimo_censo', $this->fecha_ultimo_censo, true);
        $criteria->compare('protocolizado', $this->protocolizado);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('usuario_id_creacion', $this->usuario_id_creacion);
        $criteria->compare('usuario_id_actualizacion', $this->usuario_id_actualizacion);
        $criteria->compare('estatus_beneficiario_id', $this->estatus_beneficiario_id);
        $criteria->compare('codigo_trab', $this->codigo_trab, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Beneficiario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
