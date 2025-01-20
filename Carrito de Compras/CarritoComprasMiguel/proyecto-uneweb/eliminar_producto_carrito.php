
<?php 
    include "./conexion.php";
    $sqleliP = "DELETE FROM carrito WHERE id_producto = $_GET[eliPC] AND id_cliente = $_GET[idC] AND item = $_GET[it]";
    $resulteliP = mysqli_query($link, $sqleliP);
    $sqlActItem = "CALL actualizar_items($_GET[idC],$_GET[it])";
    $res = mysqli_query($link, $sqlActItem);
    if (!mysqli_error($link)) {
?>
        <meta http-equiv="refresh" content="0;URL=carrito.php">
<?php }else{
?>      <script>alert("Estamos en mantenimiento preventivo");</script>
<?php } ?>

<meta http-equiv="refresh" content="0;URL=carrito.php">