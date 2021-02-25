<?php
    session_start();
    if(!isset($_GET['id'])){
        header('Location: pruebaUsuarios.php');
    }

  
    if(!isset($_SESSION['usuario'])){
        header('Location: pruebaLogin.php');

    }elseif(isset($_SESSION['usuario'])){
        include 'modelo/conexion.php';
        $id=$_GET['id'];
    
        $sql = $bd->prepare("SELECT *FROM usuarios WHERE id = ? LIMIT 1;");
        $sql->execute([$id]);
        $datosUsuario= $sql->fetch(PDO::FETCH_OBJ);
    }else{
        echo "Hubo un error";
    }


?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>Usuario Editar</title>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>

<body>
<?php 
  include 'layout/header.php';
?>
	<center>
   
    <hr>
    <a href="pruebaUsuarios.php">Volver</a>

    <h3>Editar Usuario </h3>
    <form method="POST" action="pruebaControllerEditar.php">
            <table>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="inpEmail" value="<?php echo $datosUsuario->email; ?>"  class="form-control" readonly></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><input type="password" name="inpContra" value="<?php echo base64_decode($datosUsuario->password); ?>"  class="form-control" required></td>
                </tr>
                <tr>
                    <td>Repetir Contraseña:</td>
                    <td><input type="password" name="inpContraR" value="<?php echo base64_decode($datosUsuario->password); ?>"  class="form-control" required></td>
                </tr>                
                <tr>
                    <td>Apellido:</td>
                    <td><input type="text" name="inpApellido" value="<?php echo $datosUsuario->apellido; ?>"  class="form-control" required></td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="inpNombre" value="<?php echo $datosUsuario->nombre; ?>"  class="form-control" required></td>
                </tr>                
                <tr><td></td>
                    <td ><input type="submit" name="Editar" value="Guardar Cambios" class="form-control btn-primary"></td>
                </tr>
                <input type="hidden"  name="hh" value="1">
            </table>
    </form>
    <!-- Fin Insert -->
    </center>

<br>
<?php 
  include 'layout/footer.php';
?>