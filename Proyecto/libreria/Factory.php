<?php
    require 'libreria/IClientes.php';
    require 'libreria/ICrud.php';
    require 'libreria/IFunciones.php';
    require 'libreria/IPagos.php';
    require 'libreria/IVentas.php';
    class Factory
    {
        static function Mostrar($tipo, $filtro)
        {
            switch($tipo)
            {
                case 'Clasificacion': 
                    {
                        $funcion = new Clasificacion(); 
                        return $funcion->Consultar($filtro);
                        break;
                    }
                case 'Clientes': 
                    {
                        $funcion = new Clientes(); 
                        return $funcion->Consultar($filtro);
                        break;
                    }
                case 'Empleados': 
                    {
                        $funcion = new Empleados(); 
                        return $funcion->Consultar($filtro);
                        break;
                    }
                case 'Pagos': 
                    {
                        $funcion = new Pagos(); 
                        return $funcion->Consultar($filtro);
                        break;
                    }
                case 'Ventas': 
                    {
                        $funcion = new Ventas(); 
                        return $funcion->Consultar($filtro);
                        break;
                    }
                case 'Usuarios': 
                    {
                        $funcion = new Usuarios(); 
                        return $funcion->Consultar($filtro);
                        break;
                    }
                case 'Ventas Totales': 
                    {
                        $funcion = new VentasTotales(); 
                        return $funcion->Consultar($filtro);
                        break;
                    }
            }
        }
        static function Insertar($tipo, array $datos)
        {
            switch($tipo)
            {
                case 'Clasificacion': 
                    {
                        $funcion = new Clasificacion(); 
                        return $funcion->Insertar($datos);
                        break;
                    }
                case 'Clientes': 
                    {
                        $funcion = new Clientes(); 
                        return $funcion->Insertar($datos);
                        break;
                    }
                case 'Empleados': 
                    {
                        $funcion = new Empleados(); 
                        return $funcion->Insertar($datos);
                        break;
                    }
                /*case 'Pagos': 
                    {
                        $funcion = new Empleados(); 
                        return $funcion->calcularCobro($datos);
                        break;
                    }*/
                case 'Ventas': 
                    {
                        $funcion = new Empleados(); 
                        return $funcion->calcularCobro($datos);
                        break;
                    }
                case 'Usuarios': 
                    {
                        $funcion = new Usuarios(); 
                        return $funcion->Insertar($datos);
                        break;
                    }
                case 'Ventas Totales': 
                    {
                        $funcion = new VentasTotales(); 
                        return $funcion->Insertar($datos);
                        break;
                    }
            }
        }
        static function Modificar($tipo, array $datos)
        {
            switch($tipo)
            {
                case 'Clasificacion': 
                    {
                        $funcion = new Clasificacion(); 
                        return $funcion->Modificar($datos);
                        break;
                    }
                case 'Clientes': 
                    {
                        $funcion = new Clientes(); 
                        return $funcion->Modificar($datos);
                        break;
                    }
                case 'Empleados': 
                    {
                        $funcion = new Empleados(); 
                        return $funcion->Modificar($datos);
                        break;
                    }
                /*case 'Pagos': 
                    {
                        $funcion = new Pagos(); 
                        return $funcion->Modificar($datos);
                        break;
                    }*/
                case 'Ventas': 
                    {
                        $funcion = new Ventas(); 
                        return $funcion->Modificar($datos);
                        break;
                    }
                case 'Usuarios': 
                    {
                        $funcion = new Usuarios(); 
                        return $funcion->Modificar($datos);
                        break;
                    }
                case 'Ventas Totales': 
                    {
                        $funcion = new VentasTotales(); 
                        return $funcion->Modificar($datos);
                        break;
                    }
            }
        }
        static function ConsultaID($tipo, $id)
        {
            switch($tipo)
            {
                case 'Clasificacion': 
                    {
                        $funcion = new Clasificacion(); 
                        return $funcion->ConsultaID($id);
                        break;
                    }
                case 'Clientes': 
                    {
                        $funcion = new Clientes(); 
                        return $funcion->ConsultaID($id);
                        break;
                    }
                case 'Empleados': 
                    {
                        $funcion = new Empleados(); 
                        return $funcion->ConsultaID($id);
                        break;
                    }
                case 'Pagos': 
                    {
                        $funcion = new Pagos(); 
                        return $funcion->ConsultaID($id);
                        break;
                    }
                case 'Ventas': 
                    {
                        $funcion = new Ventas(); 
                        return $funcion->ConsultaID($id);
                        break;
                    }
                case 'Usuarios': 
                    {
                        $funcion = new Usuarios(); 
                        return $funcion->ConsultaID($id);
                        break;
                    }
                case 'Ventas Totales': 
                    {
                        $funcion = new VentasTotales(); 
                        return $funcion->ConsultaID($id);
                        break;
                    }
            }
        }
        static function Borrar($tipo, $id)
        {
            switch($tipo)
            {
                case 'Clasificacion': 
                    {
                        $funcion = new Clasificacion(); 
                        return $funcion->Borrar($id);
                        break;
                    }
                case 'Clientes': 
                    {
                        $funcion = new Clientes(); 
                        return $funcion->Borrar($id);
                        break;
                    }
                case 'Empleados': 
                    {
                        $funcion = new Empleados(); 
                        return $funcion->Borrar($id);
                        break;
                    }
                case 'Pagos': 
                    {
                        $funcion = new Pagos(); 
                        return $funcion->Borrar($id);
                        break;
                    }
                case 'Ventas': 
                    {
                        $funcion = new Ventas(); 
                        return $funcion->Borrar($id);
                        break;
                    }
                case 'Usuarios': 
                    {
                        $funcion = new Usuarios(); 
                        return $funcion->Borrar($id);
                        break;
                    }
                case 'Ventas Totales': 
                    {
                        $funcion = new VentasTotales(); 
                        return $funcion->Borrar($id);
                        break;
                    }
            }
        }
    }
?>