<?php
include_once "function.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

view($id);

include HEADER_TEMPLATE;
?>

<h2 style="color: var(--ciano-neon) !important; text-shadow: 0 0 10px rgba(0, 240, 255, 0.75);">
    Jogo <?php echo htmlspecialchars($customer['id'], ENT_QUOTES, 'UTF-8'); ?>
</h2>

<?php if (!empty($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo htmlspecialchars($_SESSION['type'], ENT_QUOTES, 'UTF-8'); ?>" role="alert">
        <?php echo htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8'); ?>
    </div>

    <?php
    unset($_SESSION['message']);
    unset($_SESSION['type']);
?>
<?php endif; ?>

<h3>Informações do produto</h3>

<dl class="dl-horizontal">
    <dt>Código do produto:</dt>
    <dd>
        <?php echo htmlspecialchars($customer['codigo_produto'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>

    <dt>Nome do jogo:</dt>
    <dd>
        <?php echo htmlspecialchars($customer['nome'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>

    <dt>Plataforma:</dt>
    <dd>
        <?php echo htmlspecialchars($customer['plataforma'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>

    <dt>Preço:</dt>
    <dd>
        R$
        <?php
        echo number_format(
            (float) $customer['preco'],
            2,
            ',',
            '.'
        );
        ?>
    </dd>

    <dt>Gênero:</dt>
    <dd>
        <?php echo htmlspecialchars($customer['genero'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>

    <dt>Ano de lançamento:</dt>
    <dd>
        <?php echo htmlspecialchars($customer['ano_lancamento'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>

    <dt>Classificação indicativa:</dt>
    <dd>
        <?php echo htmlspecialchars($customer['classificacao_indicativa'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>
</dl>

<h3>Informações da loja</h3>

<dl class="dl-horizontal">
    <dt>Data de chegada:</dt>
    <dd>
        <?php
        echo !empty($customer['data_chegada'])
            ? formatData($customer['data_chegada'], 'd/m/Y')
            : 'Não informado';
        ?>
    </dd>

    <dt>Quantidade em estoque:</dt>
    <dd>
        <?php echo htmlspecialchars($customer['quantidade_estoque'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>

    <dt>Estado de conservação:</dt>
    <dd>
        <?php echo htmlspecialchars($customer['estado_conservacao'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>

    <dt>Tipo de mídia:</dt>
    <dd>
        <?php echo htmlspecialchars($customer['tipo_midia'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>
</dl>

<h3>Informações adicionais</h3>

<dl class="dl-horizontal">
    <dt>Descrição:</dt>
    <dd>
        <?php
        echo !empty($customer['descricao'])
            ? nl2br(htmlspecialchars($customer['descricao'], ENT_QUOTES, 'UTF-8'))
            : 'Nenhuma descrição informada';
        ?>
    </dd>
</dl>

<div id="actions" class="row mt-4">
    <div class="col-md-12">
        <a href="edit.php?id=<?php echo urlencode($customer['id']); ?>" class="btn btn-secondary">
            <i class="fa-solid fa-pen-to-square"></i>
            Editar
        </a>

        <a href="index.php" class="btn btn-light">
            <i class="fa-solid fa-arrow-left"></i>
            Voltar
        </a>
    </div>
</div>

<?php include FOOTER_TEMPLATE; ?>