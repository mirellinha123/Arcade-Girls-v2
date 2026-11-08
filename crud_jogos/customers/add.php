<?php
include_once "function.php";

add();

include HEADER_TEMPLATE;
?>

<h2>Novo Jogo</h2>

<form
    action="add.php"
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
                placeholder="Ex: SMW001"
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
                placeholder="Digite o nome do jogo"
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
                placeholder="0.00"
                required
            >
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="plataforma">Plataforma</label>

            <select
                class="form-select"
                id="plataforma"
                name="customer[plataforma]"
                required
            >
                <option value="">Selecione</option>
                <option value="PlayStation 4">PlayStation 4</option>
                <option value="PlayStation 5">PlayStation 5</option>
                <option value="Xbox One">Xbox One</option>
                <option value="Xbox Series">Xbox Series</option>
                <option value="Nintendo Switch">Nintendo Switch</option>
                <option value="Super Nintendo">Super Nintendo</option>
                <option value="Arcade">Arcade</option>
                <option value="PC">PC</option>
                <option value="Outro">Outro</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="genero">Gênero</label>

            <input
                type="text"
                class="form-control"
                id="genero"
                name="customer[genero]"
                maxlength="100"
                placeholder="Ex: Ação, RPG, Esportes"
                required
            >
        </div>

        <div class="form-group col-md-4">
            <label for="ano_lancamento">
                Ano de lançamento
            </label>

            <input
                type="number"
                class="form-control"
                id="ano_lancamento"
                name="customer[ano_lancamento]"
                min="1950"
                max="2100"
                placeholder="Ex: 1990"
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
                <option value="Livre">Livre</option>
                <option value="10 anos">10 anos</option>
                <option value="12 anos">12 anos</option>
                <option value="14 anos">14 anos</option>
                <option value="16 anos">16 anos</option>
                <option value="18 anos">18 anos</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="data_chegada">Data de chegada</label>

            <input
                type="date"
                class="form-control"
                id="data_chegada"
                name="customer[data_chegada]"
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
                placeholder="Ex: 5"
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
                <option value="Novo">Novo</option>
                <option value="Excelente">Excelente</option>
                <option value="Seminovo">Seminovo</option>
                <option value="Bom">Bom</option>
                <option value="Regular">Regular</option>
                <option value="Ruim">Ruim</option>
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
                <option value="Cartucho">Cartucho</option>
                <option value="CD">CD</option>
                <option value="DVD">DVD</option>
                <option value="Disco">Disco</option>
                <option value="Digital">Digital</option>
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
                placeholder="Digite uma descrição sobre o jogo"
                required
            ></textarea>
        </div>
    </div>

    <div id="actions" class="row mt-3">
        <div class="col-md-12">
            <button
                type="submit"
                class="btn btn-secondary"
            >
                <i class="fa-solid fa-floppy-disk"></i>
                Salvar
            </button>

            <a
                href="index.php"
                class="btn btn-light"
            >
                <i class="fa-solid fa-arrow-left"></i>
                Cancelar
            </a>
        </div>
    </div>
</form>

<?php include FOOTER_TEMPLATE; ?>