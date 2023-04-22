<?php
session_start();

require "../conexao/conexao.php";

$email = isset($_POST['email']) ? strtoupper($_POST['email']) : 'null';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$senha = isset($_POST['senha']) ? md5($_POST['senha']) : 'null';

$email_gerente = isset($_POST['email_gerente']) ? strtoupper($_POST['email_gerente']) : 'null';
$senha_gerente = isset($_POST['senha_gerente']) ? md5($_POST['senha_gerente']) : 'null';

if($email == 'null' || $senha == 'null' || $email_gerente == 'null' || $senha_gerente == 'null'){
    header('Location: ../index.php?r=criar_login&err');
    exit;
}else{
$stmt = $conn->prepare('SELECT * FROM erp_usuario WHERE email = :email AND senha = :senha;');

$stmt->bindValue(':email', $email_gerente);
$stmt->bindValue(':senha', $senha_gerente);

if($stmt->execute()){
    $resultado = $stmt->fetchAll();

    if($resultado[0]['id_usuario'] == '1'){
        $stmt = $conn->prepare('INSERT INTO erp_usuario (email, nome, senha) values (:email, :nome, :senha);');

        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':nome', $username);
        $stmt->bindValue(':senha', $senha);

        if($stmt->execute()){
            $stmt = $conn->prepare('SELECT LAST_INSERT_ID() AS last_id FROM erp_usuario;');
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            $_SESSION['id_usuario'] = $resultado[0]['last_id'];
            $_SESSION['email'] = $email;

            header('Location: ../index.php?r=sistema');
            exit;

        }else{
            $stmt = $conn->prepare('INSERT INTO erp_error_log (motivo, arquivo) values ("Erro ao criar novo usuario, email: \''.htmlentities($email, ENT_HTML5  , 'UTF-8').'\' senha: \''.$senha.'\'", "criar_user.php");');
            $stmt->execute();

            header('Location: ../index.php?r=criar_login&err');
            exit;
        }

    }else{
        header('Location: ../index.php?r=criar_login&err');
        exit;
    }
    
}else{
    $stmt = $conn->prepare('INSERT INTO erp_error_log (motivo, arquivo) values ("Erro ao encontrar Gerente informado, email: \''.htmlentities($email_gerente, ENT_HTML5  , 'UTF-8').'\' senha: \''.$senha_gerente.'\'", "criar_user.php");');
    $stmt->execute();

    header('Location: ../index.php?r=criar_login&err');
    exit;
}

}
?>