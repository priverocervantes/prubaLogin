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

        $sql = $bd->prepare("DELETE FROM usuarios WHERE id = ?;");
        $resultado=$sql->execute([$id]);

        if($resultado == TRUE) {
            echo $_SESSION['Message'] ="Eliminado Exitosamente!";
            header('Location: pruebaUsuarios.php');
        }else{
            header('Location: pruebaUsuarios.php');
        }
    }

?>