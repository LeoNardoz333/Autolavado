<hr>
<div>Esta es la opción Uno</div>

<div class="row">
    <div class="col-6">
        <form method="post" action="Uno"
        enctype="multipart/form-data">
            <h4>Nombre</h4>
            <input type="text" name="txtNombre"
            class="form-control">
            <button class="btn btn-primary" >Mostrar</button>
        </form>
    </div>
    <div class="col-6">
        <?php
        echo $resultado;
        ?>
    </div>
</div>