<?php
class Cliente
{

    public function Bienvenida($mensaje)
    {
        return 'Hola '.$mensaje;
    } 
    public function InsertarCliente($nombre,$direccion,$correo)
    {
        include 'conexion.php';
        $conexion= new Conexion();
        $consulta=$conexion->prepare("INSERT INTO Clientes (Nombre,Direccion,Correo)
        VALUES(:nombre, :direccion, :correo)");
        $consulta -> bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $consulta -> bindParam(":direccion", $direccion, PDO::PARAM_STR);
        $consulta -> bindparam("correo",$correo, PDO::PARAM_STR);
        $consulta -> execute();
        return 1;
    } 
    public function ModificarCliente($id,$nombre,$direccion,$correo)
    {
        include 'conexion.php';
        $conexion= new Conexion();
        $consulta=$conexion->prepare("UPDATE Clientes SET Nombre=:nombre,Direccion=:direccion,Correo=:correo
        WHERE Id=:id");
        $consulta -> bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $consulta -> bindParam(":direccion", $direccion, PDO::PARAM_STR);
        $consulta -> bindparam("correo",$correo, PDO::PARAM_STR);
        $consulta -> bindparam(":id",$id, PDO::PARAM_STR);
        $consulta -> execute();
        return 1;
    } 
    public function EliminarCliente($id)
    {
        include 'conexion.php';
        $conexion= new Conexion();
        $consulta=$conexion->prepare("DELETE FROM Clientes WHERE Id=:id");
        $consulta -> bindparam(":id",$id, PDO::PARAM_STR);
        $consulta -> execute();
        return 1;
    } 
    public function ObtenerClientes()
    {
        include 'conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("SELECT * FROM clientes");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC); //OBTENEMOS LOS DATOS DE LA TABLA
        return $consulta->fetchAll();
    }   
    public function ObtenerClienteId($id)
    {
        include 'conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("SELECT * FROM clientes WHERE Id=:id");
        $consulta -> bindparam(":id",$id, PDO::PARAM_STR);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC); //OBTENEMOS LOS DATOS DE LA TABLA
        return $consulta->fetchAll();
    }   
}
try{
    $server=new SoapServer(
        null,
        [
            'uri'=>'http://localhost/webservice/EjemploSOAP/Server/ServidorWS.php',
        ]
    );
    $server->setClass('Cliente');
    $server->handle();
}
catch(SOAPFault $f){
print $f->faulstring;
}
?>