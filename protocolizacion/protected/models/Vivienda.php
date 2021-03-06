<?php

/**
 * This is the model class for table "vivienda".
 *
 * The followings are the available columns in table 'vivienda':
 * @property integer $id_vivienda
 * @property integer $tipo_vivienda_id
 * @property integer $unidad_habitacional_id
 * @property string $construccion_mt2
 * @property string $nro_piso
 * @property string $nro_vivienda
 * @property boolean $sala
 * @property boolean $comedor
 * @property boolean $lavandero
 * @property string $lindero_norte
 * @property string $lindero_sur
 * @property string $lindero_este
 * @property string $lindero_oeste
 * @property string $coordenadas
 * @property string $precio_vivienda
 * @property integer $nro_estacionamientos
 * @property string $descripcion_estac
 * @property integer $nro_habitaciones
 * @property integer $nro_banos
 * @property integer $fuente_datos_entrada_id
 * @property integer $estatus_vivienda_id
 * @property boolean $cocina
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 * @property boolean $asignada
 *
 * The followings are the available model relations:
 * @property AnalisisCredito[] $analisisCreditos
 * @property Maestro $estatusVivienda
 * @property Maestro $tipoVivienda
 * @property UnidadHabitacional $unidadHabitacional
 * @property CrugeUser $usuarioIdActualizacion
 * @property CrugeUser $usuarioIdCreacion
 * @property Maestro $fuenteDatosEntrada
 * @property ReasignacionVivienda[] $reasignacionViviendas
 */
class Vivienda extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'vivienda';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipo_vivienda_id, unidad_habitacional_id,  nro_piso, nro_vivienda, fuente_datos_entrada_id, fecha_creacion, fecha_actualizacion, usuario_id_creacion, asignada, nro_banos, nro_habitaciones', 'required'),
            array('tipo_vivienda_id, unidad_habitacional_id, nro_estacionamientos, nro_habitaciones, nro_banos, fuente_datos_entrada_id, estatus_vivienda_id, usuario_id_creacion, usuario_id_actualizacion', 'numerical', 'integerOnly' => true),
            array('construccion_mt2', 'length', 'max' => 3),
            array('nro_piso', 'length', 'max' => 6),
            array('nro_vivienda', 'length', 'max' => 6),
            array('nro_estacionamientos', 'length', 'max' => 4),
            array('nro_banos', 'length', 'max' => 4),
            array('nro_habitaciones', 'length', 'max' => 4),
            array('lindero_norte, lindero_sur, lindero_este, lindero_oeste, coordenadas', 'length', 'max' => 200),
            array('precio_vivienda', 'length', 'max' => 16),
            array('descripcion_estac', 'length', 'max' => 15),
            array('sala, comedor, lavandero, cocina, asignada', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_vivienda, tipo_vivienda_id, unidad_habitacional_id, construccion_mt2, nro_piso, nro_vivienda, sala, comedor, lavandero, lindero_norte, lindero_sur, lindero_este, lindero_oeste, coordenadas, precio_vivienda, nro_estacionamientos, descripcion_estac, nro_habitaciones, nro_banos, fuente_datos_entrada_id, estatus_vivienda_id, cocina, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion,asignada', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'analisisCreditos' => array(self::HAS_MANY, 'AnalisisCredito', 'vivienda_id'),
            'estatusVivienda' => array(self::BELONGS_TO, 'Maestro', 'estatus_vivienda_id'),
            'tipoVivienda' => array(self::BELONGS_TO, 'Maestro', 'tipo_vivienda_id'),
            'unidadHabitacional' => array(self::BELONGS_TO, 'UnidadHabitacional', 'unidad_habitacional_id'),
            'usuarioIdActualizacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_actualizacion'),
            'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
            'fuenteDatosEntrada' => array(self::BELONGS_TO, 'Maestro', 'fuente_datos_entrada_id'),
            'reasignacionViviendas' => array(self::HAS_MANY, 'ReasignacionVivienda', 'vivienda_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_vivienda' => 'Id Vivienda',
            'tipo_vivienda_id' => 'Tipo de Vivienda',
            'unidad_habitacional_id' => 'Nombre de la Unidad Multifamiliar',
            'construccion_mt2' => 'Área de Vivienda mt2',
            'nro_piso' => 'Número de Piso',
            'nro_vivienda' => 'Número de la Vivienda',
            'sala' => 'Sala',
            'comedor' => 'Comedor',
            'lavandero' => 'Lavandero',
            'lindero_norte' => 'Lindero Norte',
            'lindero_sur' => 'Lindero Sur',
            'lindero_este' => 'Lindero Este',
            'lindero_oeste' => 'Lindero Oeste',
            'coordenadas' => 'Coordenadas',
            'precio_vivienda' => 'Precio de la Vivienda',
            'nro_estacionamientos' => 'Puesto de Estacionamiento',
            'descripcion_estac' => 'Número de Estacionamiento',
            'nro_habitaciones' => 'Número de Habitaciones',
            'nro_banos' => 'Número de Baños',
            'fuente_datos_entrada_id' => 'Fuente Datos Entrada',
            'estatus_vivienda_id' => 'Estatus Vivienda',
            'cocina' => 'Cocina',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'usuario_id_creacion' => 'Usuario Id Creacion',
            'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
            'asignada' => 'Esta asignada',
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

        $criteria->order = 'id_vivienda DESC';

        $criteria->compare('id_vivienda', $this->id_vivienda);
        $criteria->compare('tipo_vivienda_id', $this->tipo_vivienda_id);
        $criteria->compare('unidad_habitacional_id', $this->unidad_habitacional_id);
        $criteria->compare('construccion_mt2', $this->construccion_mt2, true);
        $criteria->compare('nro_piso', $this->nro_piso);
        $criteria->compare('nro_vivienda', $this->nro_vivienda);
        $criteria->compare('sala', $this->sala);
        $criteria->compare('comedor', $this->comedor);
        $criteria->compare('lavandero', $this->lavandero);
        $criteria->compare('lindero_norte', $this->lindero_norte, true);
        $criteria->compare('lindero_sur', $this->lindero_sur, true);
        $criteria->compare('lindero_este', $this->lindero_este, true);
        $criteria->compare('lindero_oeste', $this->lindero_oeste, true);
        $criteria->compare('coordenadas', $this->coordenadas, true);
        $criteria->compare('precio_vivienda', $this->precio_vivienda, true);
        $criteria->compare('nro_estacionamientos', $this->nro_estacionamientos);
        $criteria->compare('descripcion_estac', $this->descripcion_estac, true);
        $criteria->compare('nro_habitaciones', $this->nro_habitaciones);
        $criteria->compare('nro_banos', $this->nro_banos);
        $criteria->compare('fuente_datos_entrada_id', $this->fuente_datos_entrada_id);
        $criteria->compare('estatus_vivienda_id', $this->estatus_vivienda_id);
        $criteria->compare('cocina', $this->cocina);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('usuario_id_creacion', $this->usuario_id_creacion);
        $criteria->compare('usuario_id_actualizacion', $this->usuario_id_actualizacion);
        $criteria->compare('asignada', $this->asignada);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Vivienda the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
