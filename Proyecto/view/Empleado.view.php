
<div>Empleado destacados</div>
<div class="header-left">
	<img src="images/alavado.png">
</div>
<div class="row">
    <div class="col-6" id="x">
        <form method="post" action="empleado">
            Nombre <input type="text" name="txtNombre" placeholder="Nombre Empleado" class="form-control"> 
            <button class="btn btn-primary">
                Guardar
            </button>
        </form>
    </div>
    <div class="col-6">
        <?php echo $resultado; ?>
    </div>
</div>
