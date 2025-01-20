<?php
    include "./navegacion.php";
    include "./heading.php";
?>
<div class="tabla-modificar-agregar">
    <div class="agregar_producto">
        <form method="post" action="./agregar_producto_logica.php">
            <div class="contenedor-agregar">
                <h2>Agregar Producto</h2>
                <div>
                    <h4>Nombre</h4>
                    <label for="nombre">
                    <input class="medium-input" type="text" name="nombre" id="nombre"></label>
                </div>
                <div>
                    <h4>Precio</h4>
                    <label for="precio">
                    <input class="medium-input" type="number" name="precio" id="precio"></label>
                </div>
                <div>
                    <h4>Stock</h4>
                    <label for="stock">
                    <input class="medium-input" type="number" name="stock" id="stock"></label>
                </div>
                <div>
                    <h4>URL de la imagen</h4>
                    <label for="foto">
                    <input class="medium-input" type="text" name="foto" id="foto"></label>
                </div>
                <div>
                    <h4>Descripción del producto</h4>
                    <label for="descripcion">
                    <textarea class="large-input" id="descripcion" name="descripcion" rows="4" cols="50"></textarea>
                </div>
                <button class="boton boton-agregar boton-agregar-producto" type="submit">Agregar</button>
            </div>
        </form>
    </div>
    <div class="tabla-productos">
        <h3 class="center">ID</h3>
        <h3 class="center">Nombre</h3>
        <h3 class="center">Foto</h3>
        <h3 class="center">Descripción</h3>
        <h3 class="center">Precio</h3>
        <h3 class="center">Stock</h3>
        <h3 class="center">Acciones</h3>
<?php
        $sql = "SELECT * FROM producto;";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)){

            include "./producto_tabla.php";
?>          <div class="opciones">
                <button class="boton-modificar"><a class="no-decoration" href="modificar_producto.php?mod=<?php print$row['idProducto']; ?> ">Modificar</a></td></button>
                <button class="boton-eliminar"><a class="no-decoration" href="eliminar_producto.php?eli=<?php print $row['idProducto']; ?>">Eliminar</a></button>
            </div>
<?php   }
?>
    </div>
</div>
