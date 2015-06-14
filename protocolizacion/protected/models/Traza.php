<?php

/**
 * This is the model class for table "traza".
 *
 * The followings are the available columns in table 'traza':
 * @property integer $id_traza
 * @property integer $id_entidad
 * @property integer $traza
 */
class Traza extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'traza';
    }

    /**
     * VERIFICAR TRAZA POR ID_PERSONAL, ID_USUARIO
     * @param integer $id_personal
     * @param integer $id_usuario
     * @return integer
     */
    public function VerificarTraza($beneficiario) {
        $traza = Traza::model()->findByAttributes(array('id_entidad' => $beneficiario));
        if (!empty($traza)) {
            return $traza->traza;
        } else {
            $beneficiarioConsul = Beneficiario::model()->findByAttributes(array('id_beneficiario' => $beneficiario));
            if (!empty($beneficiarioConsul->ingreso_promedio_faov)) {
                return 4; // INDICA QUE SE TERMINO LA ACTUALIZACION
            } else {
                return 0; // INDICA QUE NO SE A INICIADO LA ACTUALIZACION
            }
        }
    }

    /**
     * ACTUALIZAR E INSERT TRAZA
     * @param integer $id_beneficiario
     * @return integer 
     */
    public function ObtenerIdTraza($id_beneficiario) {
        $data = Traza::model()->findByAttributes(array('id_entidad' => $id_beneficiario)); //BUSQUEDA EN LA TABLA TRAZA
        if ($data) {//si consigo un registro en trazaRegistro envio el valor para que redireccione la pantalla
            return $data->id_traza;
        } else {
            return false;
        }
    }

    /**
     * FUNCION QUE PERMITE ACTUALIZAR E INSERTAR EN LA TABLA TRAZA
     * @param integer $id_entidad
     * @param integer $nu_traza numero de la traza
     * @param integer $case=1 inserta en la tabla traza // $case=2 actualizar en la traza
     * @return integer
     */
    public function actionInsertUpdateTraza($case, $id_entidad, $nu_traza, $idTraza = NULL) {
        switch ($case) {
            case 1:
                $traza = new Traza;
                $traza->id_entidad = $id_entidad;
                $traza->n_traza = $nu_traza;
                $traza->fecha_traza = 'now()';

                if ($traza->save()) {
                    return true;
                } else {
                    return false;
                }
                break;
            case 2:
                $traza = Traza::model()->findByPk($id_entidad);
                $traza->traza = $nu_traza;
                if ($traza->save()) {
                    return true;
                } else {
                    return false;
                }
                break;
        }
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_entidad, traza', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_traza, id_entidad, traza', 'safe', 'on' => 'search'),
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
            'id_traza' => 'Id Traza',
            'id_entidad' => 'Id Entidad',
            'traza' => 'Traza',
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

        $criteria->compare('id_traza', $this->id_traza);
        $criteria->compare('id_entidad', $this->id_entidad);
        $criteria->compare('traza', $this->traza);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Traza the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
