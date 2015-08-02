<p><b>-</b> Siempre procure trabajar sobre el <a title="Descargar" href='<?php echo Yii::app()->baseUrl; ?>/doc/carga_masiva.csv'><b>archivo maestro</b></a> suministrado</p>
<p><b>-</b> Se recomienda con mucho impetu que use la suite de ofimatica en software libre <a target="_blank" href="https://es.libreoffice.org/" ><b> LibreOffice </b></a>para trabajar con el archivo</p>
<p><b>-</b> El archivo debe ser tipo .csv</p>
<p><b>-</b> El archivo .csv debe ser formado con ; como separador</p>
<p><b>-</b> El archivo debe tener unicamente 35 columnas</p>


<p>Indicación sobre valores de las columnas:</p>
<ul>
  <li>Se debe mantener la cabecera con los <b>nombres de las columnas inalteradas</b>. El sistema usa el nombre para realizar las operaciones.</li>
  <li>Todas las columnas a excepción de los <b>linderos de unidades multifamiliares, linderos de viviendas, coordenadas, puesto_estacionamiento, numero_estacionamiento,  precio_de_vivienda, 
 segundo_nombre, segundo_apellido </b>son obligatorios, por lo cual ningun registro puede tener valores vacíos </li>
  <li>Los unicos valores posibles en <b>tipo_inmueble</b> son: <b>TERRENO, PARCELA, EDIFICIO DE APARTAMENTOS, CASA</b> </li>
  <li>Los unicos valores posibles en <b>tipo_de_vivienda</b> son: <b>APARTAMENTO, CASA, TETRA, TOWNHOUSE</b> </li>
  <li>Los unicos valores posibles en <b>sala, comedor, cocina, lavandero </b> son: <b>SI ó NO</b> </li>
  <li>Los unicos valores posibles en <b>nacionalidad </b> son: <b>V ó E</b> </li>
  <li>Los unicos valores posibles en <b>sexo</b> son: <b>MASCULINO ó FEMENINO</b> </li>
  <li>Los unicos valores posibles en <b>edo_civil </b> son: <b>CASADO(A), DIVORCIADO(A), SOLTERO(A), VIUDO(A)</b> </li>


</ul>

