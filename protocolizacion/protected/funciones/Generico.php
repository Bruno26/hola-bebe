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

    

}
?>

