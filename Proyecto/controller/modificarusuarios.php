<?php
session_start();
require 'config.php';
require 'libreria/Usuarios.php';
require 'libreria/Factory.php';
require 'libreria/GenerarPDF.php';
require 'libreria/Empleados.php';
require 'libreria/Pagos.php';
require 'libreria/Ventas.php';
$f = new Factory();
if(isset($_POST['ide']))
{
    $dc = $f->ConsultaID('Usuarios',$_POST['ide']);
    echo $mensaje =
    '<form method="post" action="rusuarios">
						
    <div class="form-group">
        <label for="name" class="cols-sm-2 control-label">Empleado</label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="name" id="name"  placeholder="Empleado" value='
                .$dc[2].'/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="cols-sm-2 control-label">Usuario</label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="username" id="username"  placeholder="Usuario" '.
                'value='.$dc[3].'/>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="pass" class="cols-sm-2 control-label">Contraseña</label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                <input type="pass" class="form-control" name="pass" id="pass"  placeholder="Contraseña" value='
                .$dc[4].'/>
            </div>
        </div>
    </div>
    <?php /*
    <div class="form-group">
        <label for="permisos" class="cols-sm-2 control-label">Permisos</label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="permisos" id="permisos" '.
                'value = '.$dc[5].' placeholder="Enter your Email"/>
                <input type="hidden" name="txtidUsuario" value='.$dc[0].'/>
                <input type="hidden" name="ide" value='.$dc[1].'/>
            </div>
        </div>
    </div> */
    ?>

    <div class="form-group ">
        <button type="button" class="btn btn-primary btn-lg mt-3">Register</button>
    </div>
    </form>';
}