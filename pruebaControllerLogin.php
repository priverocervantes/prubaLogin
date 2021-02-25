<?php
 session_start();
 
    include 'modelo/conexion.php'; 
    $email=$_POST['inpEmail'];
    $password=base64_encode($_POST['inpPassword']);

    $sql = $bd->prepare("SELECT * FROM usuarios WHERE email = ? and password=?;");
    $sql->execute([$email,$password]);

    $datosUsuario= $sql->fetch(PDO::FETCH_OBJ);

    if($datosUsuario == FALSE){
        header('Location: pruebaLogin.php');
    }elseif($sql->rowCount()==1){
       echo $_SESSION['usuario'] =$datosUsuario->id;
       header('Location: pruebaUsuarios.php');

    }

?>