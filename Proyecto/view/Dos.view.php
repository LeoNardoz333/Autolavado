<hr>
<div>Esta es la opción Uno</div>

<div class="row">
    <div class="col-6">
        <form method="post" action="Dos"
        enctype="multipart/form-data">
            <h4>Edad</h4>
            <input type="text" name="txtEdad"
            class="form-control">
            <button class="btn btn-primary" >Mostrar</button>
        </form>
    </div>
    <div class="col-6">
        <?php
        echo $resultadoEdad;
        ?>
    </div>
</div>