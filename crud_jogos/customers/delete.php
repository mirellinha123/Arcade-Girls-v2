<?php
session_start();

include_once "../config.php";
include_once DBAPI;

try {
    // Validar se o ID foi passado
    if (!isset($_GET['id'])) {
        throw new Exception("ID não definido.");
    }

    $id = (int) $_GET['id'];

    if ($id <= 0) {
        throw new Exception("ID inválido.");
    }

    // Verificar se o jogo existe
    $jogo = find('jogos', $id);
    
    if (!$jogo) {
        throw new Exception("Jogo não encontrado.");
    }

    // Deletar o jogo
    remove('jogos', $id);

    $_SESSION['message'] = 'Jogo excluído com sucesso!';
    $_SESSION['type'] = 'success';

} catch (Exception $e) {
    $_SESSION['message'] = 'Erro ao excluir jogo: ' . $e->getMessage();
    $_SESSION['type'] = 'danger';
}

// Sempre redireciona para o index
header("Location: index.php");
exit();
?>