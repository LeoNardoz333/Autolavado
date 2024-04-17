<?php
    class Administradores
    implements ICrud, IPagos, IVentas
    {
        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
        }
        function Consultar($nombre)
        {

        }
        function Modificar(array $datos)
        {

        }
        function Borrar($id)
        {
            
        }
        function pagosDiarios()
        {

        }
        function empleadoDelDia()
        {

        }
        function clientesTotales()
        {
            
        }
    }
?>