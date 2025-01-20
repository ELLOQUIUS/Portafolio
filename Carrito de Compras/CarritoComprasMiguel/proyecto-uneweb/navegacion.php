<?php include "./conexion.php" ?>
<div class="navegacion">
<?php if (isset($_SESSION['user'])){
?>      <h2 class="nombre-carrito">Carrito <?php echo $_SESSION['user'] ?></h2>
<?php }else{
?>      <h2 class="nombre-carrito">Carrito de Compras</h2>
<?php }
?>      <div class="contenedor-enlaces">
        <a class="enlace" href="index.php">Home</a>
<?php if (isset($_SESSION['user'])){
?>      <a class="enlace" href="carrito.php">Carrito(
<?php   
        $sqlCreateTempTable = "CREATE TEMPORARY TABLE temporal AS SELECT idCliente FROM cliente WHERE nombre = '" . $_SESSION['user'] . "';";
        mysqli_query($link, $sqlCreateTempTable);
        $sqlCountItems = "SELECT COUNT(*) FROM carrito JOIN temporal ON temporal.idCliente = carrito.id_cliente;";
        $result = mysqli_query($link, $sqlCountItems);
        $row = mysqli_fetch_assoc($result);
        echo $row['COUNT(*)'];   
?>      )</a>
        <a class="enlace" href="compras.php">Compras</a>    
<?php   if ($_SESSION['admin']){
?>          <a class="enlace" href="agregar_producto.php">Agregar Producto</a>  
<?php   }
      }
?>
    </div>
<?php if (!isset($_SESSION['user'])){ 
?>      <a href="iniciar_sesion.php"><button class="inicio-sesion">Iniciar Sesión</button></a>
<?php }else{
?>      <a href="desloguearse.php"><button class="boton-red">Cerrar Sesión</button></a>           
<?php }
?>
</div>