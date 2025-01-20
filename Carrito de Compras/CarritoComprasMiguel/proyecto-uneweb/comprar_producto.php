
<?php   include "./navegacion.php";
        include "./heading.php";
?>
<div class="tabla-modificar-agregar">
    <div class="tabla-producto">
        <h3 class="center">Nombre</h3>
        <h3 class="center">Foto</h3>
        <h3 class="center">Descripción</h3>
        <h3 class="center">Precio</h3>
        <p>   </p>
<?php
        $sql = "SELECT * FROM producto WHERE idProducto = " . $_GET['idpro'] . ";";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
?>      <p style="text-align: center;"><?= $row["nombre"] ?></p>
        <img style="height: 100%;" class="imagen-producto" src="<?= $row["foto"];?>" alt="<?= $row["nombre"];?>">
        <p style="text-align: center;"><?= $row["descripcion"] ?></p>
        <p style="text-align: center;"><?= $row["precio"] ?></p> 
        <a style="text-align: center; margin-top: 15px" href="./index.php">Regresar</a>  
    </div>
    <div class="comprar_producto">
        <form method="post" action="./pagar_logica.php?pro=<?=$_GET['idpro']?> & pre=<?=$row['precio']?>">
            <div class="contenedor-agregar no-margin" style="height: 550px;">
                <h2>Generar Compra</h2>
                <div>
                    <h3 style="text-align: center; font-size: 25px">Total a Pagar</h3>
                    <div class="contenedor-total-compra"><p class="total-compra"> $ <?= $row["precio"] ?></p></div>
                </div>
                <div>
                    <h4>Direccion de Tarjeta</h4>
                    <label for="tarjeta">
                    <input class="medium-input" type="number" name="tarjeta" id="tarjeta" required></label>
                </div>
                <div>
                    <h4>Código de seguridad</h4>
                    <label for="codigo">
                    <input class="medium-input" type="password" name="codigo" id="codigo" required></label>
                </div>
                <div>
                    <h4>Monto</h4>
                    <label for="monto">
                    <input class="medium-input" type="float" name="monto" id="monto" step="0.01" required></label>
                </div>
                <button class="boton boton-agregar boton-agregar-producto" type="submit">Pagar</button>
            </div>
        </form>
    </div>
</div>
