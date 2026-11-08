<?php
include_once "function.php";
index();
include HEADER_TEMPLATE;
?>

<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h2>Jogos</h2>
    </div>

    <div class="col-md-6 text-md-end botoes-jogos">
        <a class="btn btn-secondary" href="add.php">
            <i class="fa-solid fa-gamepad"></i>
            Novo Jogo
        </a>

        <a class="btn btn-light" href="index.php">
            <i class="fa-solid fa-arrows-rotate"></i>
            Atualizar
        </a>
    </div>
</div>

<form action="index.php" method="get" class="form-pesquisa mb-4">
    <div class="input-group">
        <input type="search" name="busca" class="form-control" placeholder="Digite o nome, plataforma ou gênero..."
            value="<?php
            echo isset($_GET['busca'])
                ? htmlspecialchars($_GET['busca'])
                : '';
            ?>">

        <button type="submit" class="btn btn-arcade">
            <i class="fa-solid fa-magnifying-glass"></i>
            Pesquisar
        </button>
    </div>
</form>

<?php if (!empty($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo htmlspecialchars($_SESSION['type']); ?> alert-dismissible fade show" role="alert">
        <?php echo htmlspecialchars($_SESSION['message']); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>

    <?php
    unset($_SESSION['message']);
    unset($_SESSION['type']);
?>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Data de Chegada</th>
                <th>Atualizado Em</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($customers)): ?>

                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td>
                            <?php echo htmlspecialchars($customer['id']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($customer['nome']); ?>
                        </td>

                        <td>
                            R$
                            <?php
                            echo number_format(
                                (float) $customer['preco'],
                                2,
                                ',',
                                '.'
                            );
                            ?>
                        </td>

                        <td>
                            <?php
                            echo !empty($customer['data_chegada'])
                                ? formatData(
                                    $customer['data_chegada'],
                                    'd/m/Y'
                                )
                                : 'Não informado';
                            ?>
                        </td>

                        <td>
                            <?php
                            echo !empty(
                                $customer['data_atualizacao']
                            )
                                ? formatData(
                                    $customer['data_atualizacao'],
                                    'd/m/Y - H:i:s'
                                )
                                : 'Não informado';
                            ?>
                        </td>

                        <td class="actions-vertical">
                            <a href="view.php?id=<?php
                            echo urlencode(
                                $customer['id']
                            );
                            ?>" class="btn btn-sm btn-light">
                                <i class="fa-solid fa-eye"></i>
                                Visualizar
                            </a>

                            <a href="edit.php?id=<?php
                            echo urlencode(
                                $customer['id']
                            );
                            ?>" class="btn btn-sm btn-secondary">
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>

                            <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                data-bs-target="#delete-modal" data-id="<?php echo $customer['id']; ?>"
                                data-nome="<?php echo htmlspecialchars($customer['nome']); ?>">
                                <i class="fa-solid fa-trash"></i>
                                Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">
                        <?php if (!empty($_GET['busca'])): ?>
                            Nenhum jogo encontrado para a pesquisa.
                        <?php else: ?>
                            Nenhum jogo cadastrado.
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
            
        </tbody>
    </table>
</div>

<?php include "modal.php"; ?>

<?php include FOOTER_TEMPLATE; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
        if (row.querySelector('td:first-child') && row.cells[0].textContent.trim() && row.cells[0].textContent.trim() !== 'ID') {
            row.addEventListener('click', function(event) {
                if (event.target.closest('.actions-vertical')) {
                    return;
                }

                const id = this.cells[0].textContent.trim();
                if (id && id !== 'ID') {
                    window.location.href = `view.php?id=${id}`;
                }
            });
        }
    });

    $('#delete-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nome = button.data('nome');

        var modal = $(this);
        modal.find('.modal-title').text('Excluir Jogo ' + id + ' - ' + nome);
        modal.find('#confirm').attr('href', 'delete.php?id=' + id);
    });
});
</script>