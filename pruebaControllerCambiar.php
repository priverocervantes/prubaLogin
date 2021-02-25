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

        $sql = $bd->prepare("SELECT estado FROM usuarios WHERE id = ? LIMIT 1;");
        $sql->execute([$id]);
        $datoUsuario =$sql->fetch(PDO::FETCH_OBJ);

        $estado=$datoUsuario->estado;
        print($estado);
        if($estado==1){
            $sql2 = $bd->prepare("UPDATE usuarios SET estado=2 WHERE id = ?;");
            $resultado=$sql2->execute([$id]);
        }elseif($estado==2){
            $sql2 = $bd->prepare("UPDATE usuarios SET estado=1 WHERE id = ?;");
            $resultado=$sql2->execute([$id]);
        }

        if($resultado == TRUE) {
            echo $_SESSION['Message'] ="Cambio Realizado Exitosamente!";
            header('Location: pruebaUsuarios.php');
        }else{
            header('Location: pruebaUsuarios.php');
        }
    }
?>
