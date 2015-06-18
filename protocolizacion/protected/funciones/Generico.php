<?php

class Generico {
    /*
     * FUNCION QUE PERMITE DAR FORMATO A LA FECHA QUE VIENE DE DATEPICKER
     */

    public function formatoFecha($fechaIn) {
//        var_dump($fechaIn);exit;
        $fecha = $fechaIn; //FECHA SIN FORMATO
        $fechaRemplazando = str_replace('/', '-', $fecha);
        $fechaFormato = explode('-', $fechaRemplazando);
        $dia = $fechaFormato[0];
        $mes = $fechaFormato[1];
        $año = $fechaFormato[2];

        $fechaFormato = date('Y-m-d', strtotime($año . "-" . $mes . "-" . $dia)); //DANDO FORMATO A LA FECHA DE LA CITA

        return $fechaFormato;
    }

    /*
     * INIDICA EL TIPO DE USUARIO 
     * OUT INTEGER 1 = INVITADO , 2 = USERLOGEADO
     */

    public function TipoUsuario() {
        if (!Yii::app()->user->isGuest) {
            if (Yii::app()->user->name != "admin") {
                $rol = Yii::app()->db->createCommand('select itemname from cruge_authassignment where userid = ' . Yii::app()->user->id)->queryAll();
                $rol = (object) $rol[0];
                if ($rol->itemname == 'registrador') {

                    return 1;
                } else {
                    return 2;
                    Yii::app()->end();
                }
            } else {
                return 2;
                Yii::app()->end();
            }
        } else {
            return 1;
        }
    }

    public function BurcarPersona($nacionalidad, $cedula) {
        $SQL = "select * from PERSONA WHERE NACIONALIDAD ='" . $nacionalidad . "' AND CEDULA = " . $cedula;
    }

    public function FormatearBs($monto) {
        return number_format((int) $monto, 2, ",", ".");
    }

    public function renderTraza($idBeneficiario) {
        $traza = Traza::VerificarTraza($idBeneficiario);
        //evalúo la session traza para saber a que pantalla debo redirigir.
        switch ($traza) {
            case 1:// TERMINO LA ACTUALIZACION DE LA VISTA PERSONAL
                $idUnidad = UnidadFamiliar::model()->findByAttributes(array('beneficiario_id' => $idBeneficiario));
                $this->redirect(array('grupoFamiliar/create', 'id' => $idUnidad->id_unidad_familiar));
                break;
            case 2: // TERMINO LA ACTUALIZACIOND DE LA VISTA EDUCACION
                $this->redirect(array('beneficiario/createDatos', 'id' => $idBeneficiario));
                break;
            case 4: // INDICA QUE YA CULMINO LA ACTUALIZACION
                $this->redirect(array('/beneficiario/admin'));
                break;
            case 0: // INICA QUE NO HA INICIADO LA ACTUALIZACION
                $this->redirect(array('personal/create'));
                break;
        }
    }

}
?>

