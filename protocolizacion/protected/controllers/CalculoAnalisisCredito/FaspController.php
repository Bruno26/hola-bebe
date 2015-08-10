<?php

class FaspController extends Controller {
    /**
     * @return array action filters
     */
//    public function filters() {
//        return array(array('CrugeAccessControlFilter'));
//    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('Subsidio'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionSubsidio($capacidadPago, $costoVivienda, $idUnidadFamiliar, $ingresoFamiliar){
        if((int)$capacidadPago >= (int)$costoVivienda){
            return '0';
        }else if(){}
        } else {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.unidad_familiar_id = :unidad_familiar_id');
            $criteria->params = array(':unidad_familiar_id' => $idUnidadFamiliar);
            $grupoFamiliar = GrupoFamiliar::model()->findAll($criteria); 
            
            $mayorEdad = 0;
            $discapacidad = 0;
            $menoresEdad = 0;
            $conyugue = 0;

            foreach ($grupoFamiliar AS $value) {
                $fechaNac = ConsultaOracle::setPersona("TO_CHAR(FECHA_NACIMIENTO, 'DD/MM/YYYY' ) AS fecha",$value->persona_id);
                $edad = Generico::edad($fechaNac['FECHA']);
                
                switch ($edad) {
                    case ($edad >= 60):
                        $mayorEdad++;
                        break;
                    case ($edad < 18 && $value->gen_parentesco_id = 158):
                        $menoresEdad++;
                        break;
                }
                if($value->tipo_sujeto_atencion == 231)
                    $discapacidad++;
                if($value->tipo_sujeto_atencion == 155 || $value->tipo_sujeto_atencion == 161 )
                    $conyugue++;

            }
            if($mayorEdad >= 2 || $discapacidad >= 1 || $menoresEdad > 3 ){
                $procesa = true;
            } else if($conyugue = 0 && $menoresEdad > 2){
                $procesa = true;
            } else {
                $procesa = false;
            }

            if (!$procesa) {
                return '0';
            } else {
                
            }
            
        }
    }

}