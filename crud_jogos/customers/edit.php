<?php
include_once "function.php";

edit();

include HEADER_TEMPLATE;
?>

<h2>Atualizar Jogo</h2>

<form
    action="edit.php?id=<?php echo urlencode($customer['id']); ?>"
    method="post"
>
    <div class="row">
        <div class="form-group col-md-3">
            <label for="codigo_produto">Código do produto</label>

            <input
                type="text"
                class="form-control"
                id="codigo_produto"
                name="customer[codigo_produto]"
                maxlength="20"
                value="<?php echo htmlspecialchars($customer['codigo_produto'], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >
        </div>

        <div class="form-group col-md-6">
            <label for="nome">Nome do jogo</label>

            <input
                type="text"
                class="form-control"
                id="nome"
                name="customer[nome]"
                maxlength="255"
                value="<?php echo htmlspecialchars($customer['nome'], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >
        </div>

        <div class="form-group col-md-3">
            <label for="preco">Preço</label>

            <input
                type="number"
                class="form-control"
                id="preco"
                name="customer[preco]"
                min="0"
                step="0.01"
                value="<?php echo htmlspecialchars($customer['preco'], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="plataforma">Plataforma</label>

            <input
                type="text"
                class="form-control"
                id="plataforma"
                name="customer[plataforma]"
                maxlength="100"
                value="<?php echo htmlspecialchars($customer['plataforma'], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >
        </div>

        <div class="form-group col-md-4">
            <label for="genero">Gênero</label>

            <input
                type="text"
                class="form-control"
                id="genero"
                name="customer[genero]"
                maxlength="100"
                value="<?php echo htmlspecialchars($customer['genero'], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >
        </div>

        <div class="form-group col-md-4">
            <label for="ano_lancamento">Ano de lançamento</label>

            <input
                type="number"
                class="form-control"
                id="ano_lancamento"
                name="customer[ano_lancamento]"
                min="1900"
                max="2100"
                value="<?php echo htmlspecialchars($customer['ano_lancamento'], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="classificacao_indicativa">
                Classificação indicativa
            </label>

            <select
                class="form-select"
                id="classificacao_indicativa"
                name="customer[classificacao_indicativa]"
                required
            >
                <option value="">Selecione</option>

                <?php
                $classificacoes = [
                    'Livre',
                    '10 anos',
                    '12 anos',
                    '14 anos',
                    '16 anos',
                    '18 anos'
                ];
                ?>

                <?php foreach ($classificacoes as $classificacao): ?>
                    <option
                        value="<?php echo htmlspecialchars($classificacao, ENT_QUOTES, 'UTF-8'); ?>"
                        <?php echo $customer['classificacao_indicativa'] === $classificacao ? 'selected' : ''; ?>
                    >
                        <?php echo htmlspecialchars($classificacao, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="data_chegada">Data de chegada</label>

            <input
                type="date"
                class="form-control"
                id="data_chegada"
                name="customer[data_chegada]"
                value="<?php echo htmlspecialchars($customer['data_chegada'], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >
        </div>

        <div class="form-group col-md-4">
            <label for="quantidade_estoque">
                Quantidade em estoque
            </label>

            <input
                type="number"
                class="form-control"
                id="quantidade_estoque"
                name="customer[quantidade_estoque]"
                min="0"
                step="1"
                value="<?php echo htmlspecialchars($customer['quantidade_estoque'], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="estado_conservacao">
                Estado de conservação
            </label>

            <select
                class="form-select"
                id="estado_conservacao"
                name="customer[estado_conservacao]"
                required
            >
                <option value="">Selecione</option>

                <?php
                $estados = [
                    'Novo',
                    'Excelente',
                    'Seminovo',
                    'Bom',
                    'Regular',
                    'Ruim'
                ];
                ?>

                <?php foreach ($estados as $estado): ?>
                    <option
                        value="<?php echo htmlspecialchars($estado, ENT_QUOTES, 'UTF-8'); ?>"
                        <?php echo $customer['estado_conservacao'] === $estado ? 'selected' : ''; ?>
                    >
                        <?php echo htmlspecialchars($estado, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="tipo_midia">Tipo de mídia</label>

            <select
                class="form-select"
                id="tipo_midia"
                name="customer[tipo_midia]"
                required
            >
                <option value="">Selecione</option>

                <?php
                $tiposMidia = [
                    'Cartucho',
                    'CD',
                    'DVD',
                    'Disco',
                    'Digital'
                ];
                ?>

                <?php foreach ($tiposMidia as $tipo): ?>
                    <option
                        value="<?php echo htmlspecialchars($tipo, ENT_QUOTES, 'UTF-8'); ?>"
                        <?php echo $customer['tipo_midia'] === $tipo ? 'selected' : ''; ?>
                    >
                        <?php echo htmlspecialchars($tipo, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label for="descricao">Descrição</label>

            <textarea
                class="form-control"
                id="descricao"
                name="customer[descricao]"
                maxlength="500"
                rows="6"
                required
            ><?php echo htmlspecialchars($customer['descricao'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
    </div>

    <div id="actions" class="row mt-3">
        <div class="col-md-12">
            <button
                type="submit"
                class="btn btn-secondary"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Salvar alterações
            </button>

            <a
                href="view.php?id=<?php echo urlencode($customer['id']); ?>"
                class="btn btn-light"
            >
                <i class="fa-solid fa-arrow-left"></i>
                Cancelar
            </a>
        </div>
    </div>
</form>

<?php include FOOTER_TEMPLATE; ?>