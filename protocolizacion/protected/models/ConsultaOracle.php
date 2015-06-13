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

    public function setPersona($select, $id) {
        //$nacional = ($nacionalidad == 97) ? '1' : '0';
        $SLQ = "SELECT " . $select . " FROM PERSONA WHERE ID =" . $id;
        $result = Yii::app()->dbOarcle->createCommand($SLQ)->queryRow();

        if (empty($result)) {
            return 1;
        } else {
            return $result;
        }
    }

    /*
     * Consulta Tabla Persona de tablas_comunes
     * Consulta que busca por nacionalidad y cedula
     * Return ID, NACIONALIDAD , CEDULA, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO
     * SI return es 1, indica que no existe en tabla Persona
     */

    public function getPersonaByPk($select, $id) {
        //$nacional = ($nacionalidad == 97) ? '1' : '0';
        $SLQ = "SELECT " . $select . " FROM PERSONA WHERE ID =" . $id;
        $result = Yii::app()->dbOarcle->createCommand($SLQ)->queryRow();

        if (empty($result)) {
            return 1;
        } else {
            return $result;
        }
    }

    /*
     * Consulta Tabla Persona de tablas_comunes
     * Consulta que busca por nacionalidad y cedula
     * Return ID, NACIONALIDAD , CEDULA, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO
     * SI return es 1, indica que no existe en tabla Persona
     */

    public function getPersona($nacionalidad, $cedula) {

        $nacional = ($nacionalidad == 97) ? '1' : '0';
        $SLQ = "SELECT ID, NACIONALIDAD , CEDULA, PRIMER_NOMBRE AS PRIMERNOMBRE, SEGUNDO_NOMBRE AS SEGUNDONOMBRE, PRIMER_APELLIDO AS PRIMERAPELLIDO, SEGUNDO_APELLIDO AS SEGUNDOAPELLIDO , FECHA_NACIMIENTO AS FECHANACIMIENTO FROM PERSONA WHERE NACIONALIDAD ='" . $nacional . "' AND CEDULA = " . $cedula;
        $result = Yii::app()->dbOarcle->createCommand($SLQ)->queryRow();

        if (empty($result)) {
            return 1;
        } else {
            return $result;
        }
    }

    /*  -------------------------------------------- */

    public function getPersonaBeneficiario($nacionalidad, $cedula) {

        $nacional = ($nacionalidad == 97) ? '1' : '0';
        $SLQ = "SELECT P.ID, P.NACIONALIDAD , P.CEDULA, P.PRIMER_NOMBRE AS PRIMERNOMBRE, P.SEGUNDO_NOMBRE AS SEGUNDONOMBRE, P.PRIMER_APELLIDO AS PRIMERAPELLIDO, P.SEGUNDO_APELLIDO AS SEGUNDOAPELLIDO , P.FECHA_NACIMIENTO AS FECHANACIMIENTO ,GEN_SEXO.NOMBRE AS SEXO, GEN_EDO_CIVIL.NOMBRE AS EDO_CIVIL , P.TELEFONO_HAB , P.TELEFONO_MOVIL, P.CORREO_PRINCIPAL AS CORREO FROM PERSONA P LEFT JOIN  GEN_SEXO ON P.GEN_SEXO_ID = GEN_SEXO.ID  LEFT JOIN GEN_EDO_CIVIL ON P.GEN_EDO_CIVIL_ID = GEN_EDO_CIVIL.ID WHERE P.NACIONALIDAD ='" . $nacional . "' AND P.CEDULA = " . $cedula;
        $result = Yii::app()->dbOarcle->createCommand($SLQ)->queryRow();
        // var_dump($result); die();
        if (empty($result)) {
            return 1;
        } else {
            return $result;
        }
    }

    /*   ------------------------------------------- */

    /*
     * Consulta Tabla ORGANISMOS_PUBLICOS.SAIME_ORIGINAL de ORGANISMOS_PUBLICOS
     * Consulta que busca por nacionalidad y cedula
     * Return NACIONALIDAD, CEDULA, PRIMERNOMBRE, SEGUNDONOMBRE, PRIMERAPELLIDO, SEGUNDOAPELLIDO, FECHANACIMIENTO
     * SI return es 1, indica que no existe en tabla SAIME_ORIGINAL
     */

    public function getSaime($nacionalidad, $cedula) {
        //$valNacionalidad = array('valNacionalidad' => ($nacionalidad == 97) ? '1' : '0');
        $nacional = ($nacionalidad == 97) ? 'V' : 'E';

        $SLQ = "SELECT NACIONALIDAD, CEDULA, PRIMERNOMBRE, SEGUNDONOMBRE, PRIMERAPELLIDO, SEGUNDOAPELLIDO, FECHANACIMIENTO FROM ORGANISMOS_PUBLICOS.SAIME_ORIGINAL WHERE NACIONALIDAD ='" . $nacional . "' AND CEDULA = " . $cedula;
        $result = Yii::app()->dbOarcle->createCommand($SLQ)->queryRow();
        if (empty($result)) {
            return 1;
        } else {
            return $result;
        }
    }

    /*
     * Consulta la Funcion de F_BUSCA_DATOS_AHORRISTA del schema faoveel
     * @param $idPersona , $caso ( 1:promedio, 2:ingreso) 
     * Return false is null, decimal si existe
     */

    public function getFaov($idPersona, $caso) {
        $SLQ = "SELECT a.cedula, faoveel.F_BUSCA_DATOS_AHORRISTA(a.id) FROM tablas_comunes.persona a WHERE a.id in (" . $idPersona . ")";
        $result = Yii::app()->dbOarcle->createCommand($SLQ)->queryRow();
        if (empty($result)) {
            return false;
        } else {
            $result = explode(';', $result['FAOVEEL.F_BUSCA_DATOS_AHORRISTA(A.ID)']);
            switch ($result[0]) {
                case 1:
                    if ($caso == 1) {
                        $salida = ($result[4] / (0.03) );
                    } else {
                        $salida = $result[9];
                    }
                    break;
                case 2:
                    if ($caso == 1) {
                        $salida = ( $result[8] / (0.03) );
                    } else {
                        $salida = $result[10];
                    }
                    break;
                case 3 :
                    if ($caso == 1) {
//                        $promed = (int) $result[4] + (int) $result[8];
                        $salida = ( $result[4] / (0.03) ) + ($result[8] / (0.03) );
                    } else {
                        $salida = $result[9] + $result[10];
                    }
                    break;
            }
            return empty($salida) ? '0.00' : number_format($salida, 2, '.', '');
        }
    }

}
