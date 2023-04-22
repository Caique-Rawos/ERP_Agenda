<?php
session_start();

require "../conexao/conexao.php";

$tipo = isset($_POST['tipo']) ? strtoupper($_POST['tipo']) : '1';
$referencia = isset($_POST['referencia']) ? $_POST['referencia'] : '';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$custo = isset($_POST['custo']) ? $_POST['custo'] : 0.00;
$preco1 = isset($_POST['preco1']) ? $_POST['preco1'] : 0.00;
$preco2 = isset($_POST['preco2']) &&  $_POST['preco2'] != '' ? $_POST['preco2'] : 0.00;
$sem_estoque = isset($_POST['sem_estoque']) ? $_POST['sem_estoque'] : '0';
$estoque = isset($_POST['estoque']) ? $_POST['estoque'] : '0';

if($sem_estoque == 1){
    $estoque = 0;
}


if($referencia == '' || $descricao == ''){
    echo '0';
    exit;
}else{
$stmt = $conn->prepare('SELECT count(id_prod) as quant FROM erp_prod_serv WHERE prod_ref = :ref;');

$stmt->bindValue(':ref', $referencia);

if($stmt->execute()){
    $resultado = $stmt->fetchAll();

    if($resultado[0]['quant'] > 0){
        echo '1';
        exit;
    }else{
        $stmt = $conn->prepare('INSERT INTO erp_prod_serv (prod_ref, prod_descri, prod_custo, prod_venda1, prod_venda2, prod_tipo, sem_estoque, prod_estoque) values (:prod_ref, :prod_descri, :prod_custo, :prod_venda1, :prod_venda2, :prod_tipo, :sem_estoque, :prod_estoque);');

        $stmt->bindValue(':prod_ref', $referencia);
        $stmt->bindValue(':prod_descri', $descricao);
        $stmt->bindValue(':prod_custo', $custo);
        $stmt->bindValue(':prod_venda1', $preco1);
        $stmt->bindValue(':prod_venda2', $preco2);
        $stmt->bindValue(':prod_tipo', $tipo);
        $stmt->bindValue(':sem_estoque', $sem_estoque);
        $stmt->bindValue(':prod_estoque', $estoque);


        if($stmt->execute()){
            echo '4';
        exit;
        }else{
            $stmt = $conn->prepare('INSERT INTO erp_error_log (motivo, arquivo) values ("Erro ao criar novo Produto ou Servico", "proc_cad_prod.php");');
            $stmt->execute();

            echo '2';
            exit;
        }

    }
    
}else{
    $stmt = $conn->prepare('INSERT INTO erp_error_log (motivo, arquivo) values ("Erro ao buscar referencia ja existente", "proc_cad_prod.php");');
    $stmt->execute();

    echo '3';
    exit;
}

}
?>