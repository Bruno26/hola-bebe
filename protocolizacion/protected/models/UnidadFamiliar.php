<?php

/**
 * This is the model class for table "unidad_familiar".
 *
 * The followings are the available columns in table 'unidad_familiar':
 * @property integer $id_unidad_familiar
 * @property string $nombre
 * @property integer $beneficiario_id
 * @property integer $condicion_unidad_familiar_id
 * @property string $ingreso_total_familiar
 * @property integer $procedencia_beneficio_id
 * @property integer $fuente_datos_entrada_id
 * @property integer $total_personas_cotizando
 * @property integer $cantidad_dispacitados
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 * @property integer $estatus
 * @property string $observacion
 * @property string $ingreso_total_familiar_suma_faov
 *
 * The followings are the available model relations:
 * @property GrupoFamiliar[] $grupoFamiliars
 * @property AnalisisCredito[] $analisisCreditos
 * @property Beneficiario $beneficiario
 * @property Maestro $condicionUnidadFamiliar
 * @property Maestro $estatus0
 * @property Maestro $fuenteDatosEntrada
 * @property Maestro $procedenciaBeneficio
 * @property CrugeUser $usuarioIdActualizacion
 * @property CrugeUser $usuarioIdCreacion
 */
class UnidadFamiliar extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'unidad_familiar';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('beneficiario_id, condicion_unidad_familiar_id, ingreso_total_familiar,  fuente_datos_entrada_id, total_personas_cotizando, fecha_creacion, fecha_actualizacion, usuario_id_creacion', 'required'),
            array('beneficiario_id, condicion_unidad_familiar_id, procedencia_beneficio_id, fuente_datos_entrada_id, total_personas_cotizando, cantidad_dispacitados, usuario_id_creacion, usuario_id_actualizacion, estatus', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 100),
            array('ingreso_total_familiar', 'length', 'max' => 16),
            array('observacion, ingreso_total_familiar_suma_faov', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_unidad_familiar, nombre, beneficiario_id, condicion_unidad_familiar_id, ingreso_total_familiar, procedencia_beneficio_id, fuente_datos_entrada_id, total_personas_cotizando, cantidad_dispacitados, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion, estatus, observacion, ingreso_total_familiar_suma_faov', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'grupoFamiliars' => array(self::HAS_MANY, 'GrupoFamiliar', 'unidad_familiar_id'),
            'analisisCreditos' => array(self::HAS_MANY, 'AnalisisCredito', 'unidad_familiar_id'),
            'beneficiario' => array(self::BELONGS_TO, 'Beneficiario', 'beneficiario_id'),
            'condicionUnidadFamiliar' => array(self::BELONGS_TO, 'Maestro', 'condicion_unidad_familiar_id'),
            'estatus0' => array(self::BELONGS_TO, 'Maestro', 'estatus'),
            'fuenteDatosEntrada' => array(self::BELONGS_TO, 'Maestro', 'fuente_datos_entrada_id'),
            'procedenciaBeneficio' => array(self::BELONGS_TO, 'Maestro', 'procedencia_beneficio_id'),
            'usuarioIdActualizacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_actualizacion'),
            'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_unidad_familiar' => 'Id Unidad Familiar',
            'nombre' => 'Nombre',
            'beneficiario_id' => 'Beneficiario',
            'condicion_unidad_familiar_id' => 'Condicion Unidad Familiar',
            'ingreso_total_familiar' => 'Ingreso Total Familiar',
            'procedencia_beneficio_id' => 'Procedencia Beneficio',
            'fuente_datos_entrada_id' => 'Fuente Datos Entrada',
            'total_personas_cotizando' => 'Total Personas Cotizando',
            'cantidad_dispacitados' => 'Cantidad Dispacitados',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'usuario_id_creacion' => 'Usuario Id Creacion',
            'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
            'estatus' => 'Estatus',
            'observacion' => 'Observacion',
            'ingreso_total_familiar_suma_faov' => 'Ingreso Total Familiar Suma Faov',
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
        $criteria->order = 'id_unidad_familiar DESC';
        $criteria->compare('id_unidad_familiar', $this->id_unidad_familiar);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('beneficiario_id', $this->beneficiario_id);
        $criteria->compare('condicion_unidad_familiar_id', $this->condicion_unidad_familiar_id);
        $criteria->compare('ingreso_total_familiar', $this->ingreso_total_familiar, true);
        $criteria->compare('procedencia_beneficio_id', $this->procedencia_beneficio_id);
        $criteria->compare('fuente_datos_entrada_id', $this->fuente_datos_entrada_id);
        $criteria->compare('total_personas_cotizando', $this->total_personas_cotizando);
        $criteria->compare('cantidad_dispacitados', $this->cantidad_dispacitados);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('usuario_id_creacion', $this->usuario_id_creacion);
        $criteria->compare('usuario_id_actualizacion', $this->usuario_id_actualizacion);
        $criteria->compare('estatus', $this->estatus);
        $criteria->compare('observacion', $this->observacion, true);
        $criteria->compare('ingreso_total_familiar_suma_faov', $this->ingreso_total_familiar_suma_faov, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UnidadFamiliar the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
