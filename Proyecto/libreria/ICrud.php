<?php
    interface ICrud
    {
        function Insertar(array $datos);
        function Consultar($filtro);
        function Modificar(array $datos);
        function ConsultaID($id);
        function Borrar($id);
    }
?>