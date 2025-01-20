<?php
    include "./conexion.php";
    include "./heading.php" ?>

<body class="fondo">
    <form class="iniciar-sesion" method="post" action="./iniciar_sesion_logica.php">
        <div class="imagen-usuario"></div>
        <div class="datos-usuario">
            <div class="contenedor-input-usuario">
                <p>Usuario</p>
                <label for="usuario" id="input_usuario">
                <input class="input_usuario" id="usuario" name="user" type="text" required></label>
            </div>
            <div class="contenedor-input-contrasena">
                <p>Contraseña</p>
                <label for="contrasena" id="input_contrasena">
                <input class="input_contrasena" id="contrasena" name="password" type="password" required>
                </label>
            </div>
            <button class="inicio-sesion iniciar-sesion-iniciar" type="submit">Iniciar Sesión</button>
            <p class="enlace-registro">¿No tienes cuenta?, <a href="./registrar.php">Registrate aquí</a></p>
        </div>
    </form>
</body>