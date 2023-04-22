<?php

require "../conexao/conexao.php";

$nome = isset($_POST['nome']) &&  trim($_POST['nome']) != '' ? $_POST['nome'] : die('1');
$cpf  = isset($_POST['cpf'])  ? $_POST['cpf']  : null;
$tel  = isset($_POST['tel'])  ? $_POST['tel']  : null;
$nasc = isset($_POST['nasc']) ? $_POST['nasc'] : null;
$end  = isset($_POST['end'])  ? $_POST['end']  : null;
$obs  = isset($_POST['obs'])  ? $_POST['obs']  : null;

//atencao, precisa ter o mesmo nome das variaveis definidas acima
$verifica_null = array("nome", "cpf", "tel", "nasc", "end", "obs");

foreach ($verifica_null as $value){
    if($$value == null){
        $verifica_null[$value] = PDO::PARAM_NULL;
    }else{
        $verifica_null[$value] = PDO::PARAM_STR;
    }
}

$stmt = $conn->prepare('SELECT id_cliente FROM erp_clientes WHERE nome = :nome;');

$stmt->bindValue(':nome', $nome);

if($stmt->execute()){

    if($stmt->rowCount() > 0){
        echo '2';
        exit;
    }else{
        $stmt = $conn->prepare("INSERT INTO erp_clientes (nome, telefone, endereco, data_aniversario, cpf_cnpj, obs) VALUES (:nome, :tel, :endr, :nasc, :cpf, :obs);");

        $stmt->bindValue(':nome', $nome, $verifica_null['nome']);
        $stmt->bindValue(':cpf',  $cpf,  $verifica_null['cpf']);
        $stmt->bindValue(':tel',  $tel,  $verifica_null['tel']);
        $stmt->bindValue(':nasc', $nasc, $verifica_null['nasc']);
        $stmt->bindValue(':endr', $end,  $verifica_null['end']);
        $stmt->bindValue(':obs',  $obs,  $verifica_null['obs']);

        if($stmt->execute()){
            echo '0';
        exit;
        }else{
            $stmt = $conn->prepare('INSERT INTO erp_error_log (motivo, arquivo) values ("Erro ao criar novo Cliente", "contas_receber/proc_cli.php");');
            $stmt->execute();

            echo '3';
            exit;
        }

    }
    
}else{
    $stmt = $conn->prepare('INSERT INTO erp_error_log (motivo, arquivo) values ("Erro ao buscar nome ja existente", "contas_receber/proc_cli.php");');
    $stmt->execute();

    echo '4';
    exit;
}

?>