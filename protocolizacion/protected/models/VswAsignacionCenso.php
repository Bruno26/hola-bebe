<?php

/**
 * This is the model class for table "vsw_asignacion_censo".
 *
 * The followings are the available columns in table 'vsw_asignacion_censo':
 * @property integer $id_asignacion_censo
 * @property integer $cod_estado
 * @property string $estado
 * @property integer $id_oficina
 * @property string $nombre_oficina
 * @property integer $id_desarrollo
 * @property string $nombre_desarrollo
 * @property string $fecha_asignacion
 */
class VswAsignacionCenso extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function primaryKey() {
        return 'id_asignacion_censo';
    }

    public function tableName() {
        return 'vsw_asignacion_censo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_asignacion_censo, cod_estado, id_oficina, id_desarrollo', 'numerical', 'integerOnly' => true),
            array('estado', 'length', 'max' => 250),
            array('nombre_oficina', 'length', 'max' => 100),
            array('nombre_desarrollo', 'length', 'max' => 200),
            array('fecha_asignacion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_asignacion_censo, cod_estado, estado, id_oficina, nombre_oficina, id_desarrollo, nombre_desarrollo, fecha_asignacion', 'safe', 'on' => 'search'),
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
            'id_asignacion_censo' => 'Id Asignacion Censo',
            'cod_estado' => 'Cod Estado',
            'estado' => 'Estado',
            'id_oficina' => 'Id Oficina',
            'nombre_oficina' => 'Nombre Oficina',
            'id_desarrollo' => 'Id Desarrollo',
            'nombre_desarrollo' => 'Nombre Desarrollo',
            'fecha_asignacion' => 'Fecha Asignacion',
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

        $criteria->compare('id_asignacion_censo', $this->id_asignacion_censo);
        $criteria->compare('cod_estado', $this->cod_estado);
        $criteria->compare('estado', $this->estado, true);
        $criteria->compare('id_oficina', $this->id_oficina);
        $criteria->compare('nombre_oficina', $this->nombre_oficina, true);
        $criteria->compare('id_desarrollo', $this->id_desarrollo);
        $criteria->compare('nombre_desarrollo', $this->nombre_desarrollo, true);
//        $criteria->compare('fecha_asignacion', $this->fecha_asignacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VswAsignacionCenso the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
