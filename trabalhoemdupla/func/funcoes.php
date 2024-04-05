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

function insertQuatroId($tabela, $campos, $value1, $value2,$value3,$value4)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($campos) VALUES (?,?,?,?)");
        $sqlLista->bindValue(1, $value1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $value2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $value3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $value4, PDO::PARAM_STR);
        $sqlLista->execute();
        $idInsertRetorno = $conn->lastInsertId();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $idInsertRetorno;
        } else {
            return null;
        }
        ;
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return($e->getMessage());
        $conn->rollback();
    }
    ;
    $conn = null;
}

function deletarRegistro($tabela, $idcampo, $idparametro)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlDelete = $conn->prepare("DELETE FROM $tabela WHERE $idcampo = ?");
        $sqlDelete ->bindValue(1, $idparametro, PDO::PARAM_INT);
        $sqlDelete ->execute();
        $conn->commit();

        if ($sqlDelete->rowCount() > 0) {
            return true;
        } else {
            return null;
        }
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}
