<?php
include_once("func/funcoes.php");
include_once("config/conexao.php");
include_once("config/constantes.php");

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css\style.css" media="screen" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <div id="viewport">
        <!-- Sidebar -->
        <div id="sidebar">
            <header>
                <a href="./dashboard.php" class='p-3' style='font-size:25px'>BOOTSTECNIC</a>
            </header>
            <ul class="nav p-4 zoomzinho">
                <li>
                    <a href='#' class='btn border border-0' style='font-size:20px' onclick="carregaMenu('listarCliente')">Meus clientes</a>
                </li>
            </ul>
            <hr>
            </hr>
            <p></p>
            <ul class="nav p-4 zoomzinho">
                <li>
                    <a href='#' class='btn border border-0' style='font-size:20px' onclick="carregaMenu('listarServico')">Meus serviços</a>
                </li>
            </ul>
            <hr>
            </hr>
            <p></p>
            <ul class="nav p-4 zoomzinho">
                <li>
                    <a href='#' class='btn border border-0' style='font-size:20px' onclick="carregaMenu('listarPedido')">Meus pedidos</a>
                </li>
            </ul>
            <hr></hr>

        </div>
        <!-- Content -->
       <?php
       include_once('cliente.php');
       include_once('servico.php')
       ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src='js/func.js'></script>
</body>

</html>