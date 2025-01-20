<?php 
include("./conexion.php");
$sql = "UPDATE producto SET nombre='$_POST[nombre]',foto='$_POST[foto]',descripcion='$_POST[descripcion]',precio='$_POST[precio]',stock='$_POST[stock]' WHERE idProducto='$_POST[oculto]'";
$result = mysqli_query($link, $sql);
if (!mysqli_error($link)) {
?>
    <script>alert("Se modifico el producto correctamente");</script>
<?php
}else{ 
?>  <script>alert("Estamos en mantenimiento preventivo");</script>
<?php }
?>
<meta http-equiv="refresh" content="0;URL=agregar_producto.php">