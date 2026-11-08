<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/**
 * Lista de tabelas permitidas
 */
function validarTabela($table)
{
    $tabelasPermitidas = [
        "jogos"
    ];

    if (!in_array($table, $tabelasPermitidas, true)) {
        throw new Exception("Tabela não permitida.");
    }

    return $table;
}

/**
 * Abre a conexão com o banco de dados
 */
function open_database()
{
    try {
        $conn = new mysqli(
            DB_HOST,
            DB_USER,
            DB_PASSWORD,
            DB_NAME
        );

        $conn->set_charset("utf8mb4");

        return $conn;
    } catch (Exception $e) {
        throw new Exception(
            "Erro ao conectar no banco de dados: " . $e->getMessage()
        );
    }
}

/**
 * Fecha a conexão com o banco de dados
 */
function close_database($conn)
{
    if ($conn instanceof mysqli) {
        $conn->close();
    }
}

/**
 * Pesquisa um registro pelo ID
 * ou retorna todos os registros da tabela
 */
function find($table = null, $id = null)
{
    $found = null;
    $database = null;

    try {
        $table = validarTabela($table);
        $database = open_database();

        if ($id !== null) {
            $sql = "SELECT * FROM `$table` WHERE id = ?";

            $stmt = $database->prepare($sql);

            $id = (int) $id;

            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $found = $result->fetch_assoc();
            }

            $stmt->close();
        } else {
            $sql = "SELECT * FROM `$table` ORDER BY id DESC";

            $result = $database->query($sql);

            if ($result->num_rows > 0) {
                $found = $result->fetch_all(MYSQLI_ASSOC);
            } else {
                $found = [];
            }
        }
    } catch (Exception $e) {
        salvarErroSessao($e);
    }

    close_database($database);

    return $found;
}

/**
 * Pesquisa todos os registros de uma tabela
 */
function find_all($table)
{
    return find($table);
}

/**
 * Pesquisa jogos por nome, plataforma, gênero, etc
 */
function find_search($table, $busca)
{
    $found = [];
    $database = null;

    try {
        $table = validarTabela($table);
        $database = open_database();

        $sql = "SELECT *
                FROM `$table`
                WHERE nome LIKE ?
                   OR plataforma LIKE ?
                   OR genero LIKE ?
                ORDER BY nome";

        $stmt = $database->prepare($sql);

        $termo = "%" . $busca . "%";

        $stmt->bind_param(
            "sss",
            $termo,
            $termo,
            $termo
        );

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }

        $stmt->close();
    } catch (Exception $e) {
        salvarErroSessao($e);
    }

    close_database($database);

    return $found;
}

/**
 * Insere um registro no banco de dados
 */
function save($table = null, $data = null)
{
    $database = null;

    try {
        $table = validarTabela($table);
        $database = open_database();

        if (empty($data) || !is_array($data)) {
            throw new Exception("Nenhum dado foi enviado.");
        }

        $columns = [];
        $values = [];
        $types = "";
        $parameters = [];

        foreach ($data as $key => $value) {
            $key = trim($key, "'");

            $columns[] = "`" . $key . "`";
            $values[] = "?";

            $types .= "s";
            $parameters[] = $value;
        }

        $columnsSql = implode(", ", $columns);
        $valuesSql = implode(", ", $values);

        $sql = "INSERT INTO `$table` ($columnsSql)
                VALUES ($valuesSql)";

        $stmt = $database->prepare($sql);

        bindParameters(
            $stmt,
            $types,
            $parameters
        );

        $stmt->execute();
        $stmt->close();

        $_SESSION["message"] = "Jogo cadastrado com sucesso.";
        $_SESSION["type"] = "success";
    } catch (Exception $e) {
        salvarErroSessao($e);
    }

    close_database($database);
}

/**
 * Atualiza um registro pelo ID
 */
function update($table = null, $id = 0, $data = null)
{
    $database = null;

    try {
        $table = validarTabela($table);
        $database = open_database();

        if (empty($data) || !is_array($data)) {
            throw new Exception("Nenhum dado foi enviado.");
        }

        $items = [];
        $types = "";
        $parameters = [];

        foreach ($data as $key => $value) {
            $key = trim($key, "'");

            $items[] = "`" . $key . "` = ?";
            $types .= "s";
            $parameters[] = $value;
        }

        $itemsSql = implode(", ", $items);

        $sql = "UPDATE `$table`
                SET $itemsSql
                WHERE id = ?";

        $types .= "i";
        $parameters[] = (int) $id;

        $stmt = $database->prepare($sql);

        bindParameters(
            $stmt,
            $types,
            $parameters
        );

        $stmt->execute();
        $stmt->close();

        $_SESSION["message"] = "Jogo atualizado com sucesso.";
        $_SESSION["type"] = "success";
    } catch (Exception $e) {
        salvarErroSessao($e);
    }

    close_database($database);
}

/**
 * Remove um registro pelo ID
 */
function remove($table = null, $id = null)
{
    $database = null;

    try {
        $table = validarTabela($table);

        if (!$id) {
            return;
        }

        $database = open_database();

        $sql = "DELETE FROM `$table` WHERE id = ?";

        $stmt = $database->prepare($sql);

        $id = (int) $id;

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();

        $_SESSION["message"] = "Jogo removido com sucesso.";
        $_SESSION["type"] = "success";
    } catch (Exception $e) {
        salvarErroSessao($e);
    }

    close_database($database);
}

/**
 * Faz o bind dos parâmetros da consulta
 */
function bindParameters($stmt, $types, $parameters)
{
    $bind = [];
    $bind[] = $types;

    foreach ($parameters as $key => $value) {
        $bind[] = &$parameters[$key];
    }

    call_user_func_array(
        [$stmt, "bind_param"],
        $bind
    );
}

/**
 * Salva o erro na sessão
 */
function salvarErroSessao($e)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION["message"] = "Não foi possível realizar a operação.";
    $_SESSION["type"] = "danger";
}
?>