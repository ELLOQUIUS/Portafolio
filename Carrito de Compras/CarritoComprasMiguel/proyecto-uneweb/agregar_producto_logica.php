<?php
  include "./conexion.php";
  $sql="INSERT INTO producto (nombre,foto,descripcion,precio,stock) VALUES
  ('$_POST[nombre]','$_POST[foto]','$_POST[descripcion]','$_POST[precio]',
  '$_POST[stock]')";
  $result = mysqli_query($link, $sql); //ejecuto la consulta
  if (!mysqli_error($link)) {
?>
    <script>alert("Producto ingresado correctamente");</script>
<?php
  }else{
?>
    <script>alert ("Estamos en mantenimiento preventivo");</script>
<?php }
?>
<meta http-equiv="refresh" content="0;URL=agregar_producto.php">
