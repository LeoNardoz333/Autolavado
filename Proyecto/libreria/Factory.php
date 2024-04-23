<?php
    class Factory
    {
        static function Mostrar($tipo)
        {
            switch($tipo)
            {
                //case 'Login': return new Login(); break;
                case 'Administradores': return new Administradores(); break;
                case 'Clasificacion': return new Clasificacion(); break;
                case 'Clientes': return new Clientes(); break;
                case 'Empleados': return new Empleados(); break;
                case 'Pagos': return new Pagos(); break;
                case 'Ventas': return new Ventas(); break;
            }
        }
    }
?>