<!-- Modal de Delete -->
<div class="modal fade" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">
                    Excluir Jogo
                </h4>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                Deseja realmente excluir este jogo?
            </div>

            <div class="modal-footer">
                <a id="confirm" class="btn btn-sm btn-light" href="delete.php">
                    <i class="fa-solid fa-circle-check"></i>
                    Sim
                </a>

                <button type="button" class="btn btn-sm btn-dark" data-bs-dismiss="modal">
                    <i class="fa-solid fa-circle-xmark"></i>
                    Não
                </button>
            </div>
        </div>
    </div>
</div>