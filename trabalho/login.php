<?php   
include_once("config/conexao.php");
include_once("config/constantes.php");
include_once("func/funcoes.php");
$conn = conectar();
$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

$cpf = $dados['cpf'];
$senha = $dados['senha'];

$retornoValidar = validarSenhaCript('idadm, cpf, senha','adm', 'cpf', 'senha', $cpf, $senha, 'ativo', 'A');
if ($retornoValidar){
 if ($retornoValidar =='usuario') {
    echo json_encode(['success' => false, 'message' => 'Usuário Inválido.']);
 } else if ($retornoValidar == 'senha') {
    echo json_encode(['success'=> false, 'message'=> 'Senha inválida.']);
 } else {
    $_SESSION['idadm'] =$retornoValidar -> idadm;
    $_SESSION['cpf'] = $retornoValidar -> cpf;
     echo json_encode(['success' => true,'message' => 'Login efetuado com sucesso! Bora lá']);
    }
} else {
    echo json_encode(['success'=> false, 'message'=> 'Usuário ou senha inválidos.']);
}

?>