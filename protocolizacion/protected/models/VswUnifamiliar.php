<?php

/**
 * This is the model class for table "vsw_unifamiliar".
 *
 * The followings are the available columns in table 'vsw_unifamiliar':
 * @property integer $id_vivienda
 * @property string $nro_vivienda
 * @property integer $tipo_vivienda_id
 * @property string $tipo_vivienda
 * @property integer $id_unidad_habitacional
 * @property string $nombre_unidad_habitacional
 * @property integer $id_desarrollo
 * @property string $nombre_desarrollo
 * @property integer $cod_estado
 * @property string $estado
 * @property integer $estatus_vivienda_id
 * @property string $estatus
 */
class VswUnifamiliar extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function primaryKey() {
        return 'id_vivienda';
    }

    public function tableName() {
        return 'vsw_unifamiliar';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_vivienda, tipo_vivienda_id, id_unidad_habitacional, id_desarrollo, cod_estado, estatus_vivienda_id', 'numerical', 'integerOnly' => true),
            array('nro_vivienda', 'length', 'max' => 10),
            array('nombre_unidad_habitacional', 'length', 'max' => 100),
            array('nombre_desarrollo', 'length', 'max' => 200),
            array('estado', 'length', 'max' => 250),
            array('tipo_vivienda, estatus', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_vivienda, nro_vivienda, tipo_vivienda_id, tipo_vivienda, id_unidad_habitacional, nombre_unidad_habitacional, id_desarrollo, nombre_desarrollo, cod_estado, estado, estatus_vivienda_id, estatus', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_vivienda' => 'Id Vivienda',
            'nro_vivienda' => 'Nro Vivienda',
            'tipo_vivienda_id' => 'Tipo Vivienda',
            'tipo_vivienda' => 'Tipo Vivienda',
            'id_unidad_habitacional' => 'Id Unidad Habitacional',
            'nombre_unidad_habitacional' => 'Nombre Unidad Habitacional',
            'id_desarrollo' => 'Id Desarrollo',
            'nombre_desarrollo' => 'Nombre Desarrollo',
            'cod_estado' => 'Cod Estado',
            'estado' => 'Estado',
            'estatus_vivienda_id' => 'Estatus Vivienda',
            'estatus' => 'Estatus',
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

        $criteria->compare('id_vivienda', $this->id_vivienda);
        $criteria->compare('nro_vivienda', $this->nro_vivienda, true);
        $criteria->compare('tipo_vivienda_id', $this->tipo_vivienda_id);
        $criteria->compare('tipo_vivienda', $this->tipo_vivienda, true);
        $criteria->compare('id_unidad_habitacional', $this->id_unidad_habitacional);
        $criteria->compare('nombre_unidad_habitacional', $this->nombre_unidad_habitacional, true);
        $criteria->compare('id_desarrollo', $this->id_desarrollo);
        $criteria->compare('nombre_desarrollo', $this->nombre_desarrollo, true);
        $criteria->compare('cod_estado', $this->cod_estado);
        $criteria->compare('estado', $this->estado, true);
        $criteria->compare('estatus_vivienda_id', $this->estatus_vivienda_id);
        $criteria->compare('estatus', $this->estatus, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VswUnifamiliar the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
