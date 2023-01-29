<div class="modal fade " id="finalizarVenda" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Finalizar venda</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formFinalizar" class="form-controls">
          <input type="hidden" name="valorTotal">
                <div class="col-sm-12 input">
                    <label for="pagamentoProduto">Valor recebido</label>
                    <input name="pagamentoProduto" type="text" class="form-control moneyInput" maxlength="10" minlength="1">
                    <div class="error-input text-danger">
                      Preenchimento incorreto!
                    </div>
                </div>
                <div class="col-sm-12 d-flex justify-content-center">
                    <h3>Troco:&nbsp;&nbsp;</h3>
                    <h3 id='valTroco'></h3>
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success bt_finalizar_venda">Finalizar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
