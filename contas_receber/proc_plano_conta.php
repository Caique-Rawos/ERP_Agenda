<?php

require "../conexao/conexao.php";

$conta = isset($_POST['conta_inp']) &&  trim($_POST['conta_inp']) != '' ? $_POST['conta_inp'] : die('1');


$stmt = $conn->prepare('SELECT id_plano_conta FROM erp_plano_conta WHERE descricao = :conta;');

$stmt->bindValue(':conta', $conta);

if($stmt->execute()){

    if($stmt->rowCount() > 0){
        echo '2';
        exit;
    }else{
        $stmt = $conn->prepare("INSERT INTO erp_plano_conta (descricao) VALUES (:conta);");

        $stmt->bindValue(':conta', $conta, PDO::PARAM_STR);

        if($stmt->execute()){
            echo '0';
        exit;
        }else{
            $stmt = $conn->prepare('INSERT INTO erp_error_log (motivo, arquivo) values ("Erro ao criar novo Plano de Conta", "contas_receber/proc_plano_conta.php");');
            $stmt->execute();

            echo '3';
            exit;
        }
    }
    
}else{
    $stmt = $conn->prepare('INSERT INTO erp_error_log (motivo, arquivo) values ("Erro ao buscar Plano de Conta ja existente", "contas_receber/proc_plano_conta.php");');
    $stmt->execute();

    echo '4';
    exit;
}


?>