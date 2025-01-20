<?php
    include "./navegacion.php";
    include "./heading.php";
?>
<div class="tabla-modificar">
    <div class="agregar_producto">
        <form method="post" action="./modificar_producto_logica.php">
            <div class="contenedor-modificar">
<?php           $sql = "SELECT * FROM producto WHERE idProducto='$_GET[mod]'";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($result)
?>              <h2 class="center">Modificar Producto "<?php print $row['nombre']; ?>"</h2>
                <div>
                    <h4>Nombre</h4>
                    <label for="nombre">
                    <input class="medium-input" type="text" name="nombre" id="nombre" value="<?php print $row['nombre']; ?>"></label>
                </div>
                <div>
                    <h4>Precio</h4>
                    <label for="precio">
                    <input class="medium-input" type="number" name="precio" id="precio" value="<?php print $row['precio']; ?>"></label>
                </div>
                <div>
                    <h4>Stock</h4>
                    <label for="stock">
                    <input class="medium-input" type="number" name="stock" id="stock" value="<?php print $row['stock']; ?>"></label>
                </div>
                <div>
                    <h4>URL de la imagen</h4>
                    <label for="foto">
                    <input class="medium-input" type="text" name="foto" id="foto" value="<?php print $row['foto']; ?>"></label>
                </div>
                <div>
                    <h4>Descripción del producto</h4>
                    <label for="descripcion">
                    <textarea class="large-input" id="descripcion" name="descripcion" rows="4" cols="50"><?php print $row['descripcion']; ?></textarea>
                </div>
                <input type="hidden" name="oculto" id="oculto" value="<?php print $row['idProducto']; ?>" />
                <button class="boton boton-agregar boton-agregar-producto" type="submit">Modificar</button>
            </div>
        </form>
    </div>
</div>