<?php
    class Empleados
    implements ICrud, IVentas, IFunciones
    {
        private $reporte;
        private $ventas;
        private $pagos;
        private $resultados = array();
        
        public function __construct()
        {
            $this->reporte = new GenerarPDF();
            $this->ventas = new Ventas();
            $this->pagos = new Pagos();
        }

        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $nombre = $datos['nombre'];
            $q->prepare("CALL p_insertarempleados(-1, ?)");
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $nombret='';
            $filas =0;
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_mostrarempleados(?)");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->store_result();
            $filas = $q->num_rows;
            if($filas > 0)
            {
                $q->bind_result($id, $nombret);
    
                $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
                'Nombre</th>'.
                '</tr></thead><tbody>';
    
                while ($q->fetch()) {
                    $rs .= '<tr>
                    <td>'.$id.'</td>
                    <td>'.$nombret.'</td>
                    <td><form method="post" action="empleado">
                            <button> Eliminar </button>
                            <input type="hidden" name="_id" value="'.$id.'">
                        </form>
                    </td>
                    <td>
                        <button class="editar" _ide="'.$id.'"> Editar </button>
                    </td>
                    </tr>';
                }
    
                $q->close();
                return $rs.'</tbody></table>
                <script>
                    $(".editar").click(function(){
                        let _ide = $(this).attr("_ide");
                        alert("Yeii" + _ide);
                        $.post("modificarempleado",{ide:_ide}, function(mensaje){
                            $("#x").html(mensaje);
                        });
                    });
                </script>';
            }
            else return 'Aún no existen registros.';
        }
        function Modificar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_insertarempleados(?, ?)");
            $q->bind_param('ss', $datos['idEmpleado'], $datos['nombre']);
            $q->execute();
            $q->close();
        }
        function ConsultaID($id)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from empleados where id=?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->bind_result($id,$nombre);
            $q->fetch();
            $q->close();
            return array($id,$nombre);
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from empleados where idEmpleado=?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->close();
        }
        function clientesTotales(array $datos)
        {
            //Se tienen que mandar en el array, el id del empleado, el nombre del empleado, la cantidad de clientes y la fecha
            //Filtrado por la fecha del día solicitado
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $this->resultados = $this->ConsultasFilas($q, "select * from v_clientesTotales where fecha = ?",
                $datos['fecha']);
            $this->reporte->GenerarReporte($this->resultados, 'Clientes totales '.$datos['fecha'], 'Clientes_'.$datos['fecha']);
            $q->close();
        }
        function calcularCobro(array $datos)
        {
            $valor=0.0;
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $valor = $this-> Consultas($q, "select valor from tipoAuto where clasificacion=?",
                $datos['clasificacion']);
            $pago = $valor * doubleval($datos['cantidad']);
            $datos['pago'] = $pago;
            //Ventas
            $this->ventas->Insertar($datos);
            //Pagos
            $cantidadActual=$this-> Consultas($q, "select count(*) from pagos where fecha=?",
            $datos['fecha']);
            if($cantidadActual != 0)
            {
                $datos['pago'] += $cantidadActual;
                $this->pagos->Modificar($datos);
            }
            else
                $this->pagos->Insertar($datos);
            $q->close();
        }
        function ConsultasFilas($q, $consulta, $parametro)
        {
            $q->prepare($consulta);
            $q->bind_param('s', $parametro);
            $q->execute();
            $result = $q->get_result();
            $rows = array();
            while ($row = $result->fetch_assoc()) 
            {
                $rows[] = $row;
            }
            return $rows;
        }
        function Consultas($q, $consulta, $parametro)
        {
            $resultado = '';
            $q->prepare($consulta);
            $q->bind_param('s', $parametro);
            $q->execute();
            $q->bind_result($resultado);
            $q->fetch();
            return $resultado;
        }
    }
?>