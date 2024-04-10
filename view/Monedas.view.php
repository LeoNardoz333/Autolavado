<hr>
<div>Conversor de pesos a dólares</div>

<div class="row">
    <div class="col-6">
        <form method="post" action="Monedas"
        enctype="multipart/form-data">
            <h4>Pesos</h4>
            <input type="text" name="txtMoneda"
            class="form-control">
            <button class="btn btn-primary" >Convertir</button>
        </form>
    </div>
    <div class="col-6">
        <?php
        if(!empty($resultadoM))
        {
            echo 'Es igual a: ' . $resultadoM . ' dólares.';
        }
        ?>
    </div>
</div>