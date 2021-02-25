<?php
    session_start();

    if(!isset($_POST['hh'])){
        exit();
    }
    include 'modelo/conexion.php';
    $usuarioPadre=$_SESSION['usuario'];
    
    $email=$_POST['inpEmail'];
    $contra=base64_encode ($_POST['inpContra']);
    $contraR=base64_encode ($_POST['inpContraR']);
    $nombre=$_POST['inpNombre'];
    $apellido=$_POST['inpApellido'];
    $estado="1";
    $fechaAlta=date('Y-m-d H:i:s');
    
    $sql = $bd->prepare("SELECT id FROM usuarios WHERE email = ? LIMIT 1;");
    $sql->execute([$email]);

    $numeroDeFilas = $sql->rowCount();

    if ($numeroDeFilas <= 0) {

        if($contra==$contraR){
            $sql= $bd->prepare("INSERT INTO usuarios (email,password,nombre,apellido,estado,fecha_alta,fecha_modificacion,fecha_baja,id_padre) VALUES(?,?,?,?,?,?,?,?,?);");

            $resultado =$sql->execute([$email,$contra,$nombre,$apellido,$estado,$fechaAlta,'','',$usuarioPadre]);

            if($resultado == TRUE) {
                echo $_SESSION['Message'] ="Creado Exitosamente!";
                header('Location: pruebaUsuarios.php');
            }else{
                header('Location: pruebaUsuarios.php');
            }
        }
    }else{
        echo"No se puede registrar porque esta ingresado previamente";
    }
?>