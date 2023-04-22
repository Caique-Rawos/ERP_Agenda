<?php
    require_once "../conexao/conexao.php";

    $order = isset($_POST['last']) && $_POST['last'] == 1 ? 'ORDER BY id_cliente desc' : '';
    
    $stmt = $conn->query('SELECT id_cliente, nome FROM erp_clientes WHERE ativo = 1 '.$order.';');

        foreach ($stmt as $row) {
            echo '<option value="'. $row['id_cliente'] .'">'. $row['nome'] .'</option>';
        }

?>