<?php
    include "./conexion.php";
    include "./heading.php";
    $sqlIdUsuario = "SELECT idCliente FROM cliente WHERE nombre = '".$_SESSION['user']."';";
    $result = mysqli_query($link, $sqlIdUsuario);
    $rowidusuario = mysqli_fetch_assoc($result); 
    $sqlAgregarItem = "CALL agregar_item(".$rowidusuario['idCliente'].",".$_GET['idpro'].");";
    mysqli_query($link, $sqlAgregarItem);
?>
<meta http-equiv="refresh" content="0;URL=index.php">


