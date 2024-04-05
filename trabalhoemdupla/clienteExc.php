<?php
include_once('config/constantes.php');
include_once('config/conexao.php');
include_once('func/funcoes.php');
$conn = conectar();


// echo json_encode("deu certo");


// if (!empty($dados) && isset($dados)) {
//     $idgenero = isset($dados["id"]) ? intval($dados["id"]) : 0;

//     $retornoDelete = ExcluirGen('genero', 'idgenero', $idgenero);
//     echo json_encode($retornoDelete);
//     if ($retornoDelete > 0) {
//         echo json_encode(['success' => true, 'message' => "Gênero deletado com sucesso!"]);
//     } else {
//         echo json_encode(["success" => false, "message" => "Gênero não deletado! Erro variável"]);
//     }
// } else {
//     echo json_encode(["success" => false, "message" => "Gênero não deletado! Erro variável"]);
// }

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados) && isset($dados)) {
    $idcliente = isset($dados["id"]) ? intval($dados["id"]) : 0;

    $retornodelete = deletarRegistro('cliente','idcliente',$idcliente);
    if ($retornodelete > 0) {
        echo json_encode(['success' => true, 'message' => "Cliente excluida com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Cliente não excluida! ErroR Bd"]);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Cliente não excluida! ErroR variável"]);
}