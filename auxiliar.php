<?php
//AUXILIAR PHP consulta base de datos

// Conectando, seleccionando la base de datos
$link = mysqli_connect('localhost', 'root', '')
        or die('No se pudo conectar: ' . mysql_error());

mysqli_set_charset($link, "utf8");

mysqli_select_db($link, 'bdgestionclientes')
        or die('No se pudo seleccionar la base de datos');

// Realizar de los datos de los clientes
$query = 'SELECT A.IDCLIENTE AS IDCLIENTE, A.NOMBRE AS "NOMBRE", A.APELLIDOS AS "APELLIDOS", A.DNI AS "DNI", A.DIRECCION AS "DIRECCION", 
            C.LOCALIDAD AS "LOCALIDAD", C.PROVINCIA AS "PROVINCIA", C.CP AS "CP"
          FROM CLIENTE A, LOCALIDAD C
          WHERE A.IDLOCALIDAD = C.IDLOCALIDAD 
          ORDER By A.NOMBRE, A.APELLIDOS';

$result = mysqli_query($link, $query)
        or die('Consulta fallida: ' . mysqli_error($link));

$datos = array();

$i = 0;
// Guardamos resultados en array que será cargado en tabla
while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {

    $datos[$i]['NOMBRE'] = $line['NOMBRE'];
    $datos[$i]['APELLIDOS'] = $line['APELLIDOS'];
    $datos[$i]['DNI'] = $line['DNI'];
    $datos[$i]['DIRECCION'] = $line['DIRECCION'];
    $datos[$i]['LOCALIDAD'] = $line['LOCALIDAD'];
    $datos[$i]['PROVINCIA'] = $line['PROVINCIA'];
    $datos[$i]['CP'] = $line['CP'];
    $datos[$i]['IDCLIENTE'] = $line['IDCLIENTE'];

    $i++;
}

// Liberar resultados
mysqli_free_result($result);

// Cerrar la conexión
mysqli_close($link);

//funcion que pinta en html los contratos para un determinado cliente
function getContratos($idcliente) {
 
    // Conectando, seleccionando la base de datos
    $link = mysqli_connect('localhost', 'root', '')
            or die('No se pudo conectar: ' . mysql_error());
    
    mysqli_set_charset($link, "utf8");
    
     mysqli_select_db($link, 'bdgestionclientes')
            or die('No se pudo seleccionar la base de datos');
     
    // Realizar la consulta de los contratos para un determinado cliente
    $query = 'SELECT DESCRIPCION, PRECIO
                FROM CONTRATO
                WHERE IDCLIENTE = '.$idcliente;
       
    $result = mysqli_query($link, $query)
            or die('Consulta fallida: ' . mysqli_error($link));

    $i = 0;
    // Pintamos contratos 
    while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        echo  $line['DESCRIPCION']."  ".$line['PRECIO']." €<br>";

        $i++;
    }

// Liberar resultados
    mysqli_free_result($result);

// Cerrar la conexión
    mysqli_close($link);

}
?>