<!-- No se implementa un pago real por temas de conexiones a bancos, lo cual
 no fue visto en el programa del curso -->

 <?php
    include "./conexion.php";

    // Verifico si los montos coinciden
    if ($_GET['pre'] == $_POST["monto"]){
        if ($_POST["monto"] == 0){
?>          <script> alert("No hay ningún producto que pagar!")</script>
            <meta http-equiv="refresh" content="0;URL=index.php">
<?php   }else{

            // Agrego la compra
            date_default_timezone_set('America/Caracas');
            $sqlCompra = "INSERT INTO compras(idCliente,fechaCompra,monto) VALUES (" . $_SESSION["id_del_cliente"] .",'" . date('Y-m-d H:i:s') . "'," . $_GET["pre"] . ");";
            mysqli_query($link, $sqlCompra);
            
            // Tomo la ultima compra que hizo el cliente
            $sqlMax = "SELECT idCompras FROM compras WHERE idCompras = (SELECT MAX(idCompras) FROM compras WHERE idCliente = " . $_SESSION["id_del_cliente"] . ");";
            $resMax = mysqli_query($link, $sqlMax);
            $rowMax = mysqli_fetch_array($resMax);

            // Agrego el producto a los detalles de la compra    
            $sqlDetallesCompra = "INSERT INTO detalle_compras(idProducto,idCompras,precioCompra) VALUES (" . $_GET["pro"] ."," . $rowMax["idCompras"] . "," . $_GET["pre"] . ");";  
            mysqli_query($link, $sqlDetallesCompra);

?>          <script> alert("Compra realizada con éxito!")</script>
            <meta http-equiv="refresh" content="0;URL=index.php">
<?php   }
    }else{
?>      <script>alert("El monto no coincide con el total a pagar")</script>
        <meta http-equiv="refresh" content="0;URL=index.php">
<?php } ?>