<!DOCTYPE html>
<html lang="es">

<?php
 session_start();
 if(isset($_SESSION['usuario'])){
    header('Location: pruebaUsuarios.php');
 }
?>
<head>  
    <title>Iniciar Sessión</title>
    <meta charset="utf-8">
</head>
<body>
<?php 
  include 'layout/header.php';
?>
    <center>
    <div class="container">
        <div class="abs-center">
            <form action="pruebaControllerLogin.php" method="post" class="form-consulta" > 
            <table>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="email" name="inpEmail" placeholder="Correo electronico.." class="form-control" required ></td>
                </tr>
                <tr>
                    <td><label>Contraseña:</label></td>
                    <td><input type="password" name="inpPassword" placeholder="Ingrese contraseña.." class="form-control" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-info" id="btnIniciarSesion" >Iniciar Sesion</button></td>
                </tr>
            </table>
            </form>
        </div>
    <div>
    </center>

<br>
<?php 
  include 'layout/footer.php';
?>
<script>
    $('input[name=inpEmail]').on('keyup', () => {
    var input1 = $('input[name=inpEmail]').val();

    if (input1.length > 13) { 
         $('input[name=inpPassword]').removeAttr('disabled');
    } 
    else {
         $('input[name=inpPassword]').prop('disabled', true);
         $('#btnIniciarSesion').prop('disabled', true);
    }
    });

    $('input[name=inpPassword]').on('keyup', () => {
        var input2 = $('input[name=inpPassword]').val();

        if (input2.length >= 4) {
            $('#btnIniciarSesion').removeAttr('disabled');
        } 
        else {
            $('#btnIniciarSesion').prop('disabled', true);
        }
    });

</script>