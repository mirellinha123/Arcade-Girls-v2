<?php
include 'config.php';
include DBAPI;

include HEADER_TEMPLATE;

$erro = null;

try {
    $db = open_database();
} catch (Exception $e) {
    $erro = $e->getMessage();
}
?>

<h1>Dashboard</h1>

<?php if (!$erro): ?>

    <div class="row">

        <!-- Novo jogo -->
        <div class="col-6 col-sm-4 col-md-3 mb-4">
            <a
                href="customers/add.php"
                class="btn btn-secondary w-100 dashboard-card"
            >
                <div class="row">
                    <div class="col-12 text-center">
                        <i class="fa-solid fa-gamepad fa-5x"></i>
                    </div>

                    <div class="col-12 text-center">
                        <p>Novo Jogo</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Lista de jogos -->
        <div class="col-6 col-sm-4 col-md-3 mb-4">
            <a
                href="customers\index.php"
                class="btn btn-light w-100 dashboard-card"
            >
                <div class="row">
                    <div class="col-12 text-center">
                        <i class="fa-solid fa-list fa-5x"></i>
                    </div>

                    <div class="col-12 text-center">
                        <p>Jogos Cadastrados</p>
                    </div>
                </div>
            </a>
        </div>

    </div>

<?php else: ?>

    <div class="alert alert-danger" role="alert">
        <p>
            <strong>ERRO:</strong>
            Não foi possível conectar ao banco de dados!
        </p>

        <p>
            <?php echo htmlspecialchars($erro); ?>
        </p>
    </div>

<?php endif; ?>

<?php include FOOTER_TEMPLATE; ?>