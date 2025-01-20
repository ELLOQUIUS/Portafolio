
<?php
    include "./navegacion.php";
    include "./heading.php";
    include "./conexion.php";
?>

<?php
    include "./navegacion.php";
    include "./heading.php";
    include "./conexion.php";
?>

<div id="tit-enl-detalles">
    <h2 class="texto-compras">Detalles de la Compra</h2>
    <a style="margin-top: 60px; font-size: 20px;" href="./compras.php">Regresar</a>
</div>
<div class="compras">
    <div class="encabezado-detalles">
        <p class="text-bigger">Código de Compra</p>
        <p class="text-bigger">Artículo</p>
        <p class="text-bigger">Precio de Compra</p>
    </div>
    <div class="desgloce-detalles">
<?php
        $sql = "SELECT * FROM detalle_compras WHERE idCompras = " . $_GET['det'] . ";";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)){
?>          <p class="texto-grid"><?= $row["idCompras"] ?></p>
<?php       $sqlProducto = "SELECT nombre,foto,precio FROM producto WHERE idProducto = " . $row["idProducto"] . ";";
            $resPro = mysqli_query($link, $sqlProducto); 
            $rowProd = mysqli_fetch_array($resPro);
?>          <div>
                <p style="text-align: center;"><?= $rowProd["nombre"];?></p>
                <img class="imagen-producto imagen-producto-detalles" src="<?= $rowProd["foto"];?>" alt="<?= $rowProd["nombre"];?>">
            </div>
            <p class="texto-grid">$ <?= $rowProd["precio"] ?></p>   
<?php   }
?>
    </div>
    <div class="end-detalles">
        <p class="text-bigger" style="font-size: 30px;">Monto total de la compra</p>
        <div>
            <p class="monto-detalles">$ <?= $_GET['pre'] ?></p>
        </div>
    </div>
</div>