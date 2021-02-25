<?php
    session_start();

    if(!isset($_POST['hh'])){
        header('Location: pruebaUsuarios.php');
    }
    include 'modelo/conexion.php';

    $email=$_POST['inpEmail'];
    $contra=base64_encode($_POST['inpContra']);
    $contraR=base64_encode($_POST['inpContraR']);
    $nombre=$_POST['inpNombre'];
    $apellido=$_POST['inpApellido'];
    $fechaMod=date('Y-m-d H:i:s');

    $sql = $bd->prepare("SELECT id FROM usuarios WHERE email = ? LIMIT 1;");
    $sql->execute([$email]);

    $datoUsuario =$sql->fetch(PDO::FETCH_OBJ);

    $id=$datoUsuario->id;

    $numeroDeFilas = $sql->rowCount();

    if ($numeroDeFilas == 1) {

        if($contra==$contraR){
            $sql= $bd->prepare("UPDATE usuarios SET password=?,nombre=?,apellido=?,fecha_modificacion=? WHERE id=?;");

            $resultado =$sql->execute([$contra,$nombre,$apellido,$fechaMod,$id]);
           
            if($resultado == TRUE) {
                echo $_SESSION['Message'] ="Editado Exitosamente!";
                header('Location: pruebaUsuarios.php');
            }else{
                header('Location: pruebaUsuarios.php');
            }
        }
    }else{
        echo"No se puede actualizar.";
    }
    
?>