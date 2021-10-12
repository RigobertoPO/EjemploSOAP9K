<?php
class Calculadora
{
    public function saludar ()
    {
        return 'Hola '. func_get_args()[0];
    }
    public function Bienvenida($mensaje)
    {
        return 'Hola '.$mensaje;
    }
    public function sumar($numero1,$numero2)
    {
        return $numero1+$numero2;
    }
    public function restar($numero1,$numero2)
    {
        return $numero1-$numero2;
    }
    public function multiplicar($numero1,$numero2)
    {
        return $numero1*$numero2;
    }
}
try{
    $server=new SoapServer(
        null,
        [
            'uri'=>'http://localhost/ejemplosoap9k/Server/servidor.php',
        ]
    );
    $server->setClass('Calculadora');
    $server->handle();
}
catch(SOAPFault $f){
print $f->faulstring;
}
?>