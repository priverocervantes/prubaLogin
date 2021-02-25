<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: pruebaLogin.php');

    }elseif(isset($_SESSION['usuario'])){
        include 'modelo/conexion.php';
        $sql= $bd->query("SELECT * FROM usuarios;");
        $usuarios =$sql->fetchAll(PDO::FETCH_OBJ);
        $id=$_SESSION['usuario'];
        $sql2 = $bd->prepare("SELECT * FROM usuarios WHERE id = ? LIMIT 1;");
        $sql2->execute([$id]);
        $datosUsuario= $sql2->fetch(PDO::FETCH_OBJ);
    }else{
        echo "Hubo un error";
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>Usuarios Creados</title>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>

<body>

<?php 
  include 'layout/header.php';
?>
<label >
    <?php
        if(isset($_SESSION['Message'])){
            echo $_SESSION['Message'];
        }
    ?>
</label>
	<center>
    <h3>Hola <?php echo $datosUsuario->nombre." " .$datosUsuario->apellido ?>!! </h3>
    <a href="pruebaControllerCerrar.php">Cerrar Sesión</a>
        <h3>Ingresar usuarios</h3>
        <form method="POST" action="pruebaControllerInsertar.php">
                <table>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="inpEmail"   class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>Contraseña:</td>
                        <td><input type="password" name="inpContra"   class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>Repetir Contraseña:</td>
                        <td><input type="password" name="inpContraR"  class="form-control" required></td>
                    </tr>                
                    <tr>
                        <td>Apellido:</td>
                        <td><input type="text" name="inpApellido"  class="form-control" required></td>
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="inpNombre"  class="form-control" required></td>
                    </tr>                
                    <tr>
                        <td><input type="reset" name="" value="Vaciar Campos" class="form-control btn-info"  ></td>
                        <td><input type="submit" name="Enviar" value="Ingresar Usuario" class="form-control btn-primary"></td>
                    </tr>
                    <input type="hidden"  name="hh" value="1">
                </table>
        </form>
    <hr>
    <h3>Listado de usarios creados</h3>
		<table  class="table table-responsive-sm">
        <tr>
            <td>ID</td>
            <td>EMAIL</td>
            <td>ESTADO</td>
            <td>NOMBRE</td>
            <td>FECHA ALTA</td>
            <td>FECHA MOD</td>
            <td>ACCIONES</td>
        </tr>
        <?php
            foreach ($usuarios as $dato) { 
                ?>
                <tr>
                    <td><?php echo $dato->id ?></td>
                    <td><?php echo $dato->email ?></td>
                    <td><?php if($dato->estado ==1){?>
                                Habilitado
                        <?php }else{?>
                            Deshabilitado
                        <?php } ?>
                    </td>
                    <td><?php echo $dato->nombre ." ".$dato->apellido ?></td>
                    <td><?php echo $dato->fecha_alta ?></td>
                    <td><?php echo $dato->fecha_modificacion ?></td>            
                    <td><a href="pruebaEditar.php?id=<?php echo $dato->id ?>" class="form-control btn btn-success" style="display:inline">Editar</a>
                    <a href="PruebaControllerCambiar.php?id=<?php echo $dato->id ?>" class="form-control btn btn-warning" style="display:inline">Cambiar Estado</a>
                    <a href="PruebaControllerEliminar.php?id=<?php echo $dato->id ?>" class="form-control btn btn-danger" style="display:inline">Eliminar</a></td>     
                </tr>
                <?php
            }
        ?>
        </table>
   
    </center>

<br>
<?php 
  include 'layout/footer.php';
?>


<script>
  $('input[name=inpEmail]').on('keyup', () => {
    var input1 = $('input[name=inpEmail]').val();

    if (input1.length > 13) { 
         $('input[name=inpContra]').removeAttr('disabled');
    } 
    else {
         $('input[name=inpContra]').prop('disabled', true);
         $('#Enviar').prop('disabled', true);
    }
    });

    $('input[name=inpContra]').on('keyup', () => {
        var input2 = $('input[name=inpContra]').val();

        if (input2.length >= 4) {
            $('#Enviar').removeAttr('disabled');
        } 
        else {
            $('#Enviar').prop('disabled', true);
        }
    });
</script>