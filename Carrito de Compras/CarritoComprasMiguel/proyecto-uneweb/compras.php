<?php
    include "./navegacion.php";
    include "./heading.php";
    include "./conexion.php";
?>

<h2 class="texto-compras">Compras Realizadas</h2>
<div class="compras">
    <div class="encabezado">
        <p class="text-bigger">Código de Compra</p>
        <p class="text-bigger">Fecha de Compra</p>
        <p class="text-bigger">Monto</p>
        <p class="text-bigger">Estado</p>
        <p>    </p>
    </div>
    <div class="desgloce">
<?php
        $sql = "SELECT * FROM compras WHERE idCliente = " . $_SESSION["id_del_cliente"] . ";";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)){
?>          <p style="text-align: center;"><?= $row["idCompras"] ?></p>
            <p style="text-align: center;"><?= $row["fechaCompra"] ?></p>
            <p style="text-align: center;"><?= $row["monto"] ?></p>
            <p style="text-align: center;">Realizado</p> 
            <a style="text-align: center; margin-top: 15px" href="./detalle_compra.php?det= <?= $row["idCompras"] ?> & pre=<?= $row["monto"] ?>">Ver detalles</a>  
<?php   }
?>
    </div>
    
</div>