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

    public function getPersona($nacionalidad, $cedulaL) {

        $nacional = ($nacionalidad == 97) ? '1' : '0';
        $SLQ = "SELECT ID, NACIONALIDAD , CEDULA, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO FROM PERSONA WHERE NACIONALIDAD ='" . $nacional . "' AND CEDULA = " . $cedula;
        $result = Yii::app()->dbOarcle->createCommand($SLQ)->queryAll();

        if (empty($result)) {
            return 1;
        } else {
            return (object) $result[0];
        }
    }

}
