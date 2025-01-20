<?php
    include "./conexion.php";
    $sql = "SELECT nombre,contrasena,administrador,idCliente FROM cliente WHERE '$_POST[user]' = nombre;";
    $result = mysqli_query($link, $sql); //ejecuto la consulta
    if (!mysqli_error($link)) {
        $row = mysqli_fetch_assoc($result);
        if ($row != null){
            if ($row["contrasena"] == "$_POST[password]"){
                $_SESSION['user'] = $row["nombre"];
                $_SESSION['id_del_cliente'] = $row["idCliente"];
                if ($row["administrador"] == 1) {
                    $_SESSION['admin'] = true;
                }else{
                    $_SESSION['admin'] = false;
                }
?>              <meta http-equiv="refresh" content="0;URL=index.php">
<?php       }else{
?>              <script>alert("Contraseña Incorrecta. Vuelva a intentar")</script>
                <meta http-equiv="refresh" content="0;URL=iniciar_sesion.php"> 
<?php       }
        ;}else{
?>          <script>alert("Usuario no encontrado")</script>
            <meta http-equiv="refresh" content="0;URL=iniciar_sesion.php"> 
<?php   } 
    }else{
?>      <script>alert("Estamos en mantenimiento preventivo")</script>
        <meta http-equiv="refresh" content="0;URL=iniciar_sesion.php">  
<?php } ?>