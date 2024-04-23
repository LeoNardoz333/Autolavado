<?php
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
                case 'Pagos': 
                    {
                        $funcion = new Pagos(); 
                        return $funcion->Insertar($datos);
                        break;
                    }
                case 'Ventas': 
                    {
                        $funcion = new Ventas(); 
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
                case 'Pagos': 
                    {
                        $funcion = new Pagos(); 
                        return $funcion->Modificar($datos);
                        break;
                    }
                case 'Ventas': 
                    {
                        $funcion = new Ventas(); 
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