<?php

/**
 * This is the model class for table "vsw_empadronador_censos".
 *
 * The followings are the available columns in table 'vsw_empadronador_censos':
 * @property integer $id_desarrollo
 * @property string $nombre_desarrollo
 * @property integer $id_unidad_habitacional
 * @property string $nombre_unidad_multifamiliar
 * @property integer $id_beneficiario_temporal
 * @property integer $id_beneficiario
 * @property integer $persona_id
 * @property integer $cedula
 * @property string $nombre_adjudicado
 * @property integer $estatus
 * @property string $nro_piso
 * @property string $nro_vivienda
 * @property integer $iduser
 * @property string $empadronador_usuario
 */
class VswEmpadronadorCensos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vsw_empadronador_censos';
	}

        
        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_desarrollo, id_unidad_habitacional, id_beneficiario_temporal, id_beneficiario, persona_id, cedula, estatus, iduser', 'numerical', 'integerOnly'=>true),
			array('nombre_desarrollo, nombre_adjudicado', 'length', 'max'=>200),
			array('nombre_unidad_multifamiliar', 'length', 'max'=>100),
			array('nro_piso, nro_vivienda', 'length', 'max'=>10),
			array('empadronador_usuario', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_desarrollo, nombre_desarrollo, id_unidad_habitacional, nombre_unidad_multifamiliar, id_beneficiario_temporal, id_beneficiario, persona_id, cedula, nombre_adjudicado, estatus, nro_piso, nro_vivienda, iduser, empadronador_usuario', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_desarrollo' => 'Id Desarrollo',
			'nombre_desarrollo' => 'Nombre Desarrollo',
			'id_unidad_habitacional' => 'Id Unidad Habitacional',
			'nombre_unidad_multifamiliar' => 'Nombre Unidad Multifamiliar',
			'id_beneficiario_temporal' => 'Id Beneficiario Temporal',
			'id_beneficiario' => 'Id Beneficiario',
			'persona_id' => 'Persona',
			'cedula' => 'Cedula',
			'nombre_adjudicado' => 'Nombre Adjudicado',
			'estatus' => 'Estatus',
			'nro_piso' => 'Nro Piso',
			'nro_vivienda' => 'Nro Vivienda',
			'iduser' => 'Iduser',
			'empadronador_usuario' => 'Empadronador Usuario',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_desarrollo',$this->id_desarrollo);
		$criteria->compare('nombre_desarrollo',$this->nombre_desarrollo,true);
		$criteria->compare('id_unidad_habitacional',$this->id_unidad_habitacional);
		$criteria->compare('nombre_unidad_multifamiliar',$this->nombre_unidad_multifamiliar,true);
		$criteria->compare('id_beneficiario_temporal',$this->id_beneficiario_temporal);
		$criteria->compare('id_beneficiario',$this->id_beneficiario);
		$criteria->compare('persona_id',$this->persona_id);
		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('nombre_adjudicado',$this->nombre_adjudicado,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('nro_piso',$this->nro_piso,true);
		$criteria->compare('nro_vivienda',$this->nro_vivienda,true);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('empadronador_usuario',$this->empadronador_usuario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VswEmpadronadorCensos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
