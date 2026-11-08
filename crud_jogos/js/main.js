/**
 * Passa os dados do jogo para o Modal e atualiza o link para exclusão
 */
$('#delete-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id'); // Extrai o id do atributo data-id do botão
    var nome = button.data('nome'); // Extrai o nome do atributo data-nome

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Jogo #' + id + ' - ' + nome);
    modal.find('#confirm').attr('href', 'delete.php?id=' + id);
});
