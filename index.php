<?php
session_start();
require "conexao/conexao.php";

function verificaLogin(){
    return isset($_SESSION['id_usuario']) &&  
    trim($_SESSION['id_usuario']) != '' && 
    isset($_SESSION['email']) && 
    trim($_SESSION['email']) != '';
}

$alias = isset($_GET['r']) ? $_GET['r'] : 'null';

if($alias == 'null'){

    if(verificaLogin()){

        header('Location: index.php?r=sistema');
        exit;

    }else{
        include_once "login/div_login.php";
    }
    
}else{
    if(verificaLogin() || $alias == 'criar_login'){
        $stmt = $conn->prepare('SELECT arquivo FROM erp_pagina_acessiveis where alias = :alias and ativo = 1;');
        $stmt->bindValue(':alias', $alias);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        if(count($resultado) > 0)
        include_once $resultado[0]['arquivo'];
        else{
        include_once "erro/erro.php";
        }
    }else{
        include_once "login/div_login.php";
    }
    
}
?>
