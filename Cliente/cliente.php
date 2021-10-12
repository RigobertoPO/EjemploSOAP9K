<?php
    $cliente=new SoapClient(null,array(
        'location'=> "http://localhost/ejemplosoap9k/Server/servidor.php",
        'uri'     => "http://localhost/ejemplosoap9k/Server/servidor.php",
        'trace'   =>1)
    );
    try{
        $num1=$_POST['numero1'];
        $num2=$_POST['numero2'];
         echo $return = $cliente->__soapCall("saludar",["Luis"]).'<br>';
         echo $return = $cliente->__soapCall("Bienvenida",["Maria"]).'<br>';
         echo $return= $cliente->__soapCall("sumar",[$num1,$num2]).'<br>';
         echo $return= $cliente->__soapCall("restar",[$num1,$num2]).'<br>';
         echo $return= $cliente->__soapCall("multiplicar",[$num1,$num2]).'<br>';
    }
    catch(SOAPFault $e){
        echo 'error';
        echo $e->getMessage();
    }
?>