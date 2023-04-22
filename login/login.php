<?php
session_start();

if(isset($_SESSION['id_usuario']) &&  trim($_SESSION['id_usuario']) != '' && isset($_SESSION['email']) && trim($_SESSION['email']) != ''){
    header('Location: ../index.php?r=sistema');
    exit;
}

require "../conexao/conexao.php";

$email = isset($_POST['email']) ? strtoupper($_POST['email']) : 'null';
$senha = isset($_POST['senha']) ? md5($_POST['senha']) : 'null';

if($email == 'null' || $senha == 'null'){
    header('Location: ../index.php');
    exit;
}else{
$stmt = $conn->prepare('SELECT * FROM erp_usuario WHERE email = :id AND senha = :senha;');

$stmt->bindValue(':id', $email);
$stmt->bindValue(':senha', $senha);

if($stmt->execute()){
    $resultado = $stmt->fetchAll();

    if($resultado[0]['id_usuario'] != '' && $resultado[0]['email'] != ''){
        $_SESSION['id_usuario'] = $resultado[0]['id_usuario'];
        $_SESSION['email'] = $resultado[0]['email'];

        header('Location: ../index.php?r=sistema');
        exit;

    }else{
        header('Location: ../index.php?err');
        exit;
    }
    
}else{
    $stmt = $conn->prepare('INSERT INTO erp_error_log (motivo, arquivo) values ("Erro, quebra de MYSQL ao procurar usuario informado, email: \''.htmlentities($email, ENT_HTML5  , 'UTF-8').'\' senha: \''.$senha.'\'", "login.php");');
    $stmt->execute();

    header('Location: ../index.php?err');
    exit;
}

}
?>