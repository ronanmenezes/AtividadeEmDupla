<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

$control = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);


if (isset($control) && !empty($control)) {
    switch ($control) {
        case 'listarCliente':
            include_once('cliente.php');
            break;
        case 'listarServico':
            include_once('servico.php');
            break;
        case 'listarPedido':
            include_once('pedido.php');
            break;
            default:
            echo 'Menu Indisponível!';
    }
}