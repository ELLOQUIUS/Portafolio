
<p class="center"><?= $filas['item']; ?></p>
<?php
include "./conexion.php";
$sqlproductos = "SELECT * FROM producto WHERE idProducto = '" . $filas['id_producto'] . "' ;";
$respuesta = mysqli_query($link, $sqlproductos);
$prod = mysqli_fetch_assoc($respuesta)
?><div>
    <p class="center"><?= $prod['nombre']; ?></p>
    <img class="imagen-producto" src="<?= $prod["foto"];?>" alt="<?= $prod["nombre"];?>">
</div>
<p class="center"><?= $prod['descripcion']; ?></p>
<p class="center"><?= $prod['precio']; ?></p>
<?php
    $_SESSION['total'] = round($_SESSION['total'], 2) + round($prod['precio'], 2); 
?>