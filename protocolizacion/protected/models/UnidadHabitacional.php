<?php

/**
 * This is the model class for table "unidad_habitacional".
 *
 * The followings are the available columns in table 'unidad_habitacional':
 * @property integer $id_unidad_habitacional
 * @property string $nombre
 * @property integer $desarrollo_id
 * @property integer $gen_tipo_inmueble_id
 * @property integer $total_unidades
 * @property integer $registro_publico_id
 * @property integer $tipo_documento_id
 * @property string $fecha_registro
 * @property string $tomo
 * @property integer $ano
 * @property string $nro_documento
 * @property string $asiento_registral
 * @property string $folio_real
 * @property string $nro_matricula
 * @property integer $fuente_datos_entrada_id
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $usuario_id_creacion
 * @property integer $usuario_id_actualizacion
 * @property integer $estatus
 * @property integer $num_protocolo
 * @property string $lindero_norte
 * @property string $lindero_sur
 * @property string $lindero_este
 * @property string $lindero_oeste
 *
 * The followings are the available model relations:
 * @property BeneficiarioTemporal[] $beneficiarioTemporals
 * @property RegistroPublico $registroPublico
 * @property Maestro $tipoDocumento
 * @property UnidadHabitacional $usuarioIdActualizacion
 * @property UnidadHabitacional[] $unidadHabitacionals
 * @property CrugeUser $usuarioIdCreacion
 * @property Desarrollo $desarrollo
 * @property Maestro $estatus0
 * @property Maestro $fuenteDatosEntrada
 * @property Maestro $genTipoInmueble
 * @property Maestro $numProtocolo
 * @property Vivienda[] $viviendas
 * @property AsignacionCenso[] $asignacionCensos
 */
class UnidadHabitacional extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'unidad_habitacional';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, desarrollo_id, gen_tipo_inmueble_id, fuente_datos_entrada_id, fecha_creacion, fecha_actualizacion, usuario_id_creacion, estatus', 'required'),
			array('desarrollo_id, gen_tipo_inmueble_id, total_unidades, registro_publico_id, tipo_documento_id, ano, fuente_datos_entrada_id, usuario_id_creacion, usuario_id_actualizacion, estatus, num_protocolo', 'numerical', 'integerOnly'=>true),
			array('nombre, nro_matricula', 'length', 'max'=>100),
			array('tomo, nro_documento', 'length', 'max'=>50),
			array('asiento_registral, folio_real', 'length', 'max'=>6),
			array('lindero_norte, lindero_sur, lindero_este, lindero_oeste', 'length', 'max'=>200),
			array('fecha_registro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_unidad_habitacional, nombre, desarrollo_id, gen_tipo_inmueble_id, total_unidades, registro_publico_id, tipo_documento_id, fecha_registro, tomo, ano, nro_documento, asiento_registral, folio_real, nro_matricula, fuente_datos_entrada_id, fecha_creacion, fecha_actualizacion, usuario_id_creacion, usuario_id_actualizacion, estatus, num_protocolo, lindero_norte, lindero_sur, lindero_este, lindero_oeste', 'safe', 'on'=>'search'),
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
			'beneficiarioTemporals' => array(self::HAS_MANY, 'BeneficiarioTemporal', 'unidad_habitacional_id'),
			'registroPublico' => array(self::BELONGS_TO, 'RegistroPublico', 'registro_publico_id'),
			'tipoDocumento' => array(self::BELONGS_TO, 'Maestro', 'tipo_documento_id'),
			'usuarioIdActualizacion' => array(self::BELONGS_TO, 'UnidadHabitacional', 'usuario_id_actualizacion'),
			'unidadHabitacionals' => array(self::HAS_MANY, 'UnidadHabitacional', 'usuario_id_actualizacion'),
			'usuarioIdCreacion' => array(self::BELONGS_TO, 'CrugeUser', 'usuario_id_creacion'),
			'desarrollo' => array(self::BELONGS_TO, 'Desarrollo', 'desarrollo_id'),
			'estatus0' => array(self::BELONGS_TO, 'Maestro', 'estatus'),
			'fuenteDatosEntrada' => array(self::BELONGS_TO, 'Maestro', 'fuente_datos_entrada_id'),
			'genTipoInmueble' => array(self::BELONGS_TO, 'Maestro', 'gen_tipo_inmueble_id'),
			'numProtocolo' => array(self::BELONGS_TO, 'Maestro', 'num_protocolo'),
			'viviendas' => array(self::HAS_MANY, 'Vivienda', 'unidad_habitacional_id'),
			'asignacionCensos' => array(self::HAS_MANY, 'AsignacionCenso', 'unidad_habitacional_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_unidad_habitacional' => 'Id Unidad Habitacional',
			'nombre' => 'Nombre del Unidad Habitacional',
			'desarrollo_id' => 'Nombre del Desarrollo',
			'gen_tipo_inmueble_id' => 'Tipo de Inmueble',
			'total_unidades' => 'Total de Unidades',
			'registro_publico_id' => 'Registro Público',
			'tipo_documento_id' => 'Tipo de Documento',
			'fecha_registro' => 'Fecha Registro',
			'tomo' => 'Tomo',
			'ano' => 'Año',
			'nro_documento' => 'Número de Documento',
			'asiento_registral' => 'Asiento Registral',
			'folio_real' => 'Folio Real',
			'nro_matricula' => 'Número de Matricula',
			'fuente_datos_entrada_id' => 'Fuente Datos Entrada',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_actualizacion' => 'Fecha Actualizacion',
			'usuario_id_creacion' => 'Usuario Id Creacion',
			'usuario_id_actualizacion' => 'Usuario Id Actualizacion',
			'estatus' => 'Estatus',
			'num_protocolo' => 'Número de Protocolo',
			'lindero_norte' => 'Lindero Norte',
			'lindero_sur' => 'Lindero Sur',
			'lindero_este' => 'Lindero Este',
			'lindero_oeste' => 'Lindero Oeste',
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

		$criteria->compare('id_unidad_habitacional',$this->id_unidad_habitacional);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('desarrollo_id',$this->desarrollo_id);
		$criteria->compare('gen_tipo_inmueble_id',$this->gen_tipo_inmueble_id);
		$criteria->compare('total_unidades',$this->total_unidades);
		$criteria->compare('registro_publico_id',$this->registro_publico_id);
		$criteria->compare('tipo_documento_id',$this->tipo_documento_id);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('tomo',$this->tomo,true);
		$criteria->compare('ano',$this->ano);
		$criteria->compare('nro_documento',$this->nro_documento,true);
		$criteria->compare('asiento_registral',$this->asiento_registral,true);
		$criteria->compare('folio_real',$this->folio_real,true);
		$criteria->compare('nro_matricula',$this->nro_matricula,true);
		$criteria->compare('fuente_datos_entrada_id',$this->fuente_datos_entrada_id);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_actualizacion',$this->fecha_actualizacion,true);
		$criteria->compare('usuario_id_creacion',$this->usuario_id_creacion);
		$criteria->compare('usuario_id_actualizacion',$this->usuario_id_actualizacion);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('num_protocolo',$this->num_protocolo);
		$criteria->compare('lindero_norte',$this->lindero_norte,true);
		$criteria->compare('lindero_sur',$this->lindero_sur,true);
		$criteria->compare('lindero_este',$this->lindero_este,true);
		$criteria->compare('lindero_oeste',$this->lindero_oeste,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UnidadHabitacional the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
