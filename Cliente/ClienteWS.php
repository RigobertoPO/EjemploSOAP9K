<?php
    $cliente=new SoapClient(null,array(
        'location'=> "http://localhost/webservice/EjemploSOAP/Server/ServidorWS.php",
        'uri'     => "http://localhost/webservice/EjemploSOAP/Server/ServidorWS.php",
        'trace'   =>1)
    );
    try{
         //echo $return = $cliente->__soapCall("Bienvenida",["Maria"]).'<br>';
         //echo $return = $cliente->__soapCall("InsertarCliente",["marco","chiapa","Marcos@gmail.com"]).'<br>';
         //echo $return = $cliente->__soapCall("ModificarCliente",["8","Juan","berriozabal","Juan@gmail.com"]).'<br>';
         //echo $return = $cliente->__soapCall("EliminarCliente",["10"]).'<br>';
         $return = $cliente->__soapCall("ObtenerClientes",[]);
        //$return = $cliente->__soapCall("ObtenerClienteId",["5"]);
        echo '<table>';
      //Imprimir encabezado de tabla
      echo '<thead >
                 <tr><th>Id</th><th>Nombre</th><th>Dirección</th><th>Correo</th></tr>
           </thead>';
      // Imprimir las filas de la tabla     
      foreach ($return as $item) {
        echo '<tr>
                <td>'. $item['Id'].'</td>
                <td>'. $item['Nombre'] .'</td>
                <td>'. $item['Direccion'] .'</td>
                <td>'. $item['Correo'] .'</td>
             </tr>';
      }
      echo '</table>';
        //  $result=  json_encode($return);
        // var_dump($result);   
    }
    catch(SOAPFault $e){
        echo 'error';
        echo $e->getMessage();
    }
?>