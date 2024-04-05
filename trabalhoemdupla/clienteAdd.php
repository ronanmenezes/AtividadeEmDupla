<?php
include_once ("config/constantes.php");
include_once ("config/conexao.php");
include_once ("func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$nome = $dados ["inNome"];
$cpf = $dados ["inCpf"];
$telefone = $dados ["inTelefone"];

$retornoInsert = insertQuatroId ('cliente','nome, cpf, telefone, cadastro',"$nome","$cpf","$telefone", DATATIMEATUAL);

if($retornoInsert>0){
    echo json_encode(['sucesso'=> true, 'mensagem'=>'Cadastrado com sucesso!', 'atualizar' => 'listarCliente']);
} else{
    echo json_encode(['sucesso'=> false, 'mensagem'=>'Erro no cadastro :(', 'atualizar' => 'listarCliente']);
}



