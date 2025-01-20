
<!-- No se implementa un pago real por temas de conexiones a bancos, lo cual
 no fue visto en el programa del curso -->

 <?php
    include "./conexion.php";

    // Verifico si los montos coinciden
    if ($_SESSION['total'] == $_POST["monto"]){
        if ($_POST["monto"] == 0){
?>          <script> alert("No hay ningún producto que pagar!")</script>
            <meta http-equiv="refresh" content="0;URL=index.php">
<?php   }else{
            // Veo los productos que tiene el carrito para luego agregarlos a detalles de la compra
            $sqlCarrito = "SELECT item,id_producto FROM carrito WHERE id_cliente = '" . $_SESSION["id_del_cliente"] . "';";
            $res_carrito = mysqli_query($link, $sqlCarrito);

            // Elimino el carrito ya que en teoria el pago se procesa con exito
            $sqlEliCarrito = "DELETE FROM carrito WHERE id_cliente = '" . $_SESSION["id_del_cliente"] . "';";
            mysqli_query($link, $sqlEliCarrito);

            // Agrego la compra
            date_default_timezone_set('America/Caracas');
            $sqlCompra = "INSERT INTO compras(idCliente,fechaCompra,monto) VALUES (" . $_SESSION["id_del_cliente"] .",'" . date('Y-m-d H:i:s') . "'," . $_SESSION["total"] . ");";
            mysqli_query($link, $sqlCompra);
            
            // Tomo la ultima compra que hizo el cliente
            $sqlMax = "SELECT idCompras FROM compras WHERE idCompras = (SELECT MAX(idCompras) FROM compras WHERE idCliente = " . $_SESSION["id_del_cliente"] . ");";
            $resMax = mysqli_query($link, $sqlMax);
            $rowMax = mysqli_fetch_array($resMax);

            // Agrego los productos a los detalles de la compra
            while ($rowCarrito = mysqli_fetch_assoc($res_carrito)){
                $sqlPrecio = "SELECT precio FROM producto WHERE idProducto = " . $rowCarrito["id_producto"] . ";"; 
                $prec = mysqli_query($link, $sqlPrecio);
                $tempPrecio = mysqli_fetch_array($prec);    
                $sqlDetallesCompra = "INSERT INTO detalle_compras(idProducto,idCompras,precioCompra) VALUES (" . $rowCarrito["id_producto"] ."," . $rowMax["idCompras"] . "," . $tempPrecio["precio"] . ");";  
                mysqli_query($link, $sqlDetallesCompra);
            }
?>          <script> alert("Pago realizado con éxito!")</script>
            <meta http-equiv="refresh" content="0;URL=index.php">
<?php   }
    }else{
?>      <script>alert("El monto no coincide con el total a pagar")</script>
        <meta http-equiv="refresh" content="0;URL=carrito.php">
<?php } ?>