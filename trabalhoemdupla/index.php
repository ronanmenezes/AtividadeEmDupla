<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstecnic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css\style.css" media="screen" />
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>

<div class="row">
    <div class="col-md-4 p-2"></div>

    <div class="col-md-4 position-absolute top-50 start-50 translate-middle border p-5 rounded-5">
        <form action='#' method='POST' name='loginForm' id='loginForm'>
            <center><img src='img/logovazia.png' class='w-25'></center>
           
            <div class="mb-3">
                <label class="form-label" for="icpf">CPF:</label>
                <input type="text" name="cpf" id="icpf" class="form-control" autocomplete='off' maxlength="14" required />

            </div>
            <div class="mb-3">
                <label class="form-label" for="isenha">Senha:</label>
                <input type="password" name="senha" id="isenha" class="form-control" required />
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" >
                <label class="form-check-label" for="exampleCheck1" >Confirmo ter permissão de entrar na área restrita</label>
            </div>
            <button type="button" class="btn btn-primary" onclick='fazerLogin();'>Entrar</button>
        <p></p>
        <div class="alert alert-danger" role="alert" id="erromsg" style='display: none;'>
                                </div>
        </form>
    </div>
    <div class="col-md-4 p-2"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src='js/func.js'></script>
</body>

</html>