<?php

/*
 * Modelo que se consulta e inserta en oracle
 */

class ConsultaOracle extends CActiveRecord {
    /*
     * Consulta Tabla Persona de tablas_comunes
     * Consulta que busca por nacionalidad y cedula
     * Return ID, NACIONALIDAD , CEDULA, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO
     * SI return es 1, indica que no existe en tabla Persona
     */

    public function getPersona($nacionalidad, $cedula) {

        $nacional = ($nacionalidad == 97) ? '1' : '0';
        $SLQ = "SELECT ID, NACIONALIDAD , CEDULA, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO FROM PERSONA WHERE NACIONALIDAD ='" . $nacional . "' AND CEDULA = " . $cedula;
        $result = Yii::app()->dbOarcle->createCommand($SLQ)->queryAll();

        if (empty($result)) {
            return 1;
        } else {
            return (object) $result[0];
        }
    }

    /*
     * Consulta Tabla ORGANISMOS_PUBLICOS.SAIME_ORIGINAL de ORGANISMOS_PUBLICOS
     * Consulta que busca por nacionalidad y cedula
     * Return NACIONALIDAD, CEDULA, PRIMERNOMBRE, SEGUNDONOMBRE, PRIMERAPELLIDO, SEGUNDOAPELLIDO, FECHANACIMIENTO
     * SI return es 1, indica que no existe en tabla SAIME_ORIGINAL
     */

    public function getSaime($nacionalidad, $cedula) {
        $valNacionalidad = array('valNacionalidad' => ($nacionalidad == 97) ? '1' : '0');
        $nacional = ($nacionalidad == 97) ? 'V' : 'E';

        $SLQ = "SELECT NACIONALIDAD, CEDULA, PRIMERNOMBRE, SEGUNDONOMBRE, PRIMERAPELLIDO, SEGUNDOAPELLIDO, FECHANACIMIENTO FROM ORGANISMOS_PUBLICOS.SAIME_ORIGINAL WHERE NACIONALIDAD ='" . $nacional . "' AND CEDULA = " . $cedula;
        $result = Yii::app()->dbOarcle->createCommand($SLQ)->queryAll();
        $result = $valNacionalidad + $result[0];
        if (empty($result)) {
            return 1;
        } else {
            return $result;
        }
    }

}
