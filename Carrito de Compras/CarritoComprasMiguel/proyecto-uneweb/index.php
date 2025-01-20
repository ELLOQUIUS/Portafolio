<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Carrito de Compras</title>
</head>
<body>
    <?php 
        include "./conexion.php";
        include "./navegacion.php"
    ?>
    <div class="productos">
    <?php
        $sql = "SELECT * FROM producto;";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)){
    
            include "./producto.php";      
        } ?>
    </div>        
</body>
</html>