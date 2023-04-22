<?php
    require_once "../conexao/conexao.php";

    $order = isset($_POST['last']) && $_POST['last'] == 1 ? 'ORDER BY id_plano_conta desc' : '';

    $stmt = $conn->query('SELECT id_plano_conta, descricao FROM erp_plano_conta WHERE ativo = 1 '.$order.';');

        foreach ($stmt as $row) {
            echo '<option value="'. $row['id_plano_conta'] .'">'. $row['descricao'] .'</option>';
        }

?>