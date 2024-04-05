<?php
include_once ("func/funcoes.php");
include_once ("config/conexao.php");
include_once ("config/constantes.php");

if ($_SESSION['idadm']) {
    $idUsuarioSession = $_SESSION['idadm'];
} else {
    session_destroy();
    header('Location: ./index.php?error=404');
    die();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstecnic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css\style.css" media="screen" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body style='background-color: rgb(7, 22, 32);'>
    <div id="viewport">
        <!-- Sidebar -->
        <div id="sidebar">
            <header>
                <a href="./dashboard.php" class='p-3' style='font-size:25px'><img class='w-25'
                        src='img/logovazia.png'></a>
            </header>
            <ul class="nav p-4 zoomzinho">
                <li>
                    <a href='#' class='btn border border-0' style='font-size:20px'
                        onclick="carregaMenu('listarCliente')">Meus clientes</a>
                </li>
            </ul>
            <hr>
            </hr>
            <p></p>
            <ul class="nav p-4 zoomzinho">
                <li>
                    <a href='#' class='btn border border-0' style='font-size:20px'
                        onclick="carregaMenu('listarServico')">Meus serviços</a>
                </li>
            </ul>
            <hr>
            </hr>
            <p></p>
            <ul class="nav p-4 zoomzinho">
                <li>
                    <a href='#' class='btn border border-0' style='font-size:20px'
                        onclick="carregaMenu('listarPedido')">Meus pedidos</a>
                </li>
            </ul>
            <hr>
            </hr>

        </div>

        <div class="col-md-12 p-4" style='background-color: rgb(14, 47, 70);'>
            <h4 class='text-white'>Olá Administrador! <button class='btn btn-light position-absolute end-0'><i
                        class="bi bi-box-arrow-left"></i></button></h4>

        </div>

        <!-- Content -->
        <div id='show'></div>







        <!-- Modal Add Cliente -->
        <div class="modal fade" id="modalAddCliente" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">CADASTRO DE CLIENTE</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name='frmAddCliente' id="frmAddCliente" method='POST' action="#">
                            <div class="mb-3">
                                <label for="inNome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" name='inNome' id="inNome" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="inCpf" class="form-label">CPF:</label>
                                <input type="text" class="form-control" name='inCpf' id="inCpf" autocomplete='off' maxlength="14">
                            </div>
                            <div class="mb-3">
                                <label for="inTelefone" class="form-label">Telefone:</label>
                                <input type="text" class="form-control" name='inTelefone' id="inTelefone" autocomplete='off' maxlength="14"> 
                            </div>
                            
                            <button type="submit" id='btnAddCliente' class="btn btn-primary">Cadastrar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

      <!-- Modal Add Servico -->
      <div class="modal fade" id="modalAddServico" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">CADASTRO DE SERVIÇO</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name='frmAddServico' id="frmAddServico" method='POST' action="#">
                            <div class="mb-3">
                                <label for="inServico" class="form-label">Serviço:</label>
                                <input type="text" class="form-control" name='inServico' id="inServico" aria-describedby="emailHelp">
                            </div>
                            
                            <button type="submit" id='btnAddServico' class="btn btn-primary">Cadastrar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src='js/funcdois.js'></script>
</body>

</html>