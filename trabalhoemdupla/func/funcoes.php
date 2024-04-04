<?php
function listarTabela($campos,$tabela, $campoOrdem)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela ORDER BY $campoOrdem ");
//        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function validarSenha($campos, $tabela, $campoBdString, $campoBdString2, $campoParametro, $campoParametro2, $campoBdAtivo, $valorAtivo) {
 $conn = conectar();
 try {
    $conn->beginTransaction();
    $sqlLista = $conn->prepare("SELECT $campos "
     . "FROM $tabela "
     . "WHERE $campoBdString = ? AND $campoBdString2 = ? AND $campoBdAtivo = ? ");
     $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_STR);
     $sqlLista->bindValue(2, $campoParametro2, PDO::PARAM_STR);
     $sqlLista->bindValue(3, $valorAtivo, PDO::PARAM_STR);
     $sqlLista->execute();
     $conn->commit();
     if ($sqlLista->rowCount() > 0) {
        return $sqlLista->fetchAll(PDO::FETCH_OBJ);
} else {
    return 'Vazio';
}
 } catch(PDOException $e) {
    // $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
    // $error_message .= 'File'. $e->getFile() . PHP_EOL;
    // $error_message .= 'Line'. $e->getLine() . PHP_EOL;
    // error_log($error_message,3, $error_message, 'log/arquivo_de_log.txt');
    $conn->rollback();
    throw $e;
 }
}

function validarSenhaCript($campos, $tabela, $campoBdString, $campoBdString2, $campoParametro, $campoParametro2, $campoBdAtivo, $valorAtivo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos "
        . "FROM $tabela "
        . "WHERE $campoBdString = ? AND $campoBdAtivo = ? ");
    $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_STR);
    $sqlLista->bindValue(2, $valorAtivo, PDO::PARAM_STR);
    $sqlLista-> execute();
    $conn->commit();
    if ($sqlLista->rowCount() > 0) {
        $retornoSql = $sqlLista->fetch(PDO::FETCH_OBJ);
        $senha_hash = $retornoSql -> $campoBdString2;
        if (password_verify($campoParametro2, $senha_hash)){
            return $retornoSql;
        }
        return 'senha';
} else {
    return 'usuario';
}
    return null;
} catch (Throwable $e) {
    $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
    $error_message .= 'File'. $e->getFile() . PHP_EOL;
    $error_message .= 'Line'. $e->getLine() . PHP_EOL;
     error_log($error_message,3, $error_message, 'log/arquivo_de_log.txt');
    $conn->rollback();
    throw $e;
    }
}