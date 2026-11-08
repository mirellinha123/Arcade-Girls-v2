<?php

ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../config.php";
include_once DBAPI;

$customers = [];
$customer = null;

/**
 * Formata uma data para exibição
 */
function formatData($data, $formato = 'd/m/Y')
{
    if (empty($data)) {
        return '';
    }

    try {
        $dt = new DateTime(
            $data,
            new DateTimeZone("America/Sao_Paulo")
        );

        return $dt->format($formato);
    } catch (Exception $e) {
        return '';
    }
}

/**
 * Formata valores monetários
 */
function formatarMoeda($valor)
{
    return 'R$ ' . number_format(
        (float) $valor,
        2,
        ',',
        '.'
    );
}

/**
 * Lista todos os jogos ou realiza uma pesquisa
 */
function index()
{
    global $customers;

    $busca = isset($_GET['busca'])
        ? trim($_GET['busca'])
        : '';

    if (!empty($busca)) {
        $customers = find_search(
            'jogos',
            $busca
        );
    } else {
        $customers = find_all('jogos');
    }

    if (!is_array($customers)) {
        $customers = [];
    }
}

/**
 * Visualiza um jogo pelo ID
 */
function view($id = null)
{
    global $customer;

    $id = (int) $id;

    if ($id <= 0) {
        header('Location: index.php');
        exit();
    }

    $customer = find('jogos', $id);

    if (!$customer) {
        header('Location: index.php');
        exit();
    }
}

/**
 * Cadastra um novo jogo
 */
function add()
{
    global $customer;

    if (
        empty($_POST['customer']) ||
        !is_array($_POST['customer'])
    ) {
        return;
    }

    $now = new DateTime(
        'now',
        new DateTimeZone('America/Sao_Paulo')
    );

    $dados = $_POST['customer'];

    $dados['data_criacao'] = $now->format("Y-m-d H:i:s");
    $dados['data_atualizacao'] = $now->format("Y-m-d H:i:s");

    save('jogos', $dados);

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['message'] = 'Jogo cadastrado com sucesso.';
    $_SESSION['type'] = 'success';

    header('Location: index.php');
    exit();
}

/**
 * Edita um jogo existente
 */
function edit()
{
    global $customer;

    $id = filter_input(
        INPUT_GET,
        'id',
        FILTER_VALIDATE_INT
    );

    if (!$id || $id <= 0) {
        header('Location: index.php');
        exit();
    }

    $jogoAtual = find('jogos', $id);

    if (!$jogoAtual) {
        header('Location: index.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (
            empty($_POST['customer']) ||
            !is_array($_POST['customer'])
        ) {
            $customer = $jogoAtual;
            return;
        }

        $now = new DateTime(
            'now',
            new DateTimeZone('America/Sao_Paulo')
        );

        $dados = $_POST['customer'];

        $dados['data_atualizacao'] = $now->format(
            "Y-m-d H:i:s"
        );

        update('jogos', $id, $dados);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['message'] = 'Jogo atualizado com sucesso.';
        $_SESSION['type'] = 'success';

        header('Location: view.php?id=' . $id);
        exit();
    }

    $customer = $jogoAtual;
}

/**
 * Exclui um jogo
 */
function delete($id = null)
{
    $id = (int) $id;

    if ($id <= 0) {
        header('Location: index.php');
        exit();
    }

    $jogo = find('jogos', $id);

    if (!$jogo) {
        header('Location: index.php');
        exit();
    }

    remove('jogos', $id);

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['message'] = 'Jogo excluído com sucesso.';
    $_SESSION['type'] = 'success';

    header('Location: index.php');
    exit();
}