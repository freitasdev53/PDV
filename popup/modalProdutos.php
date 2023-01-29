<div class="modal fade " id="cadastroProduto" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar produto</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formProdutos" class="form-controls">
          <input type="hidden" name="IDProduto">
            <div class="row">
                <div class="col-sm-6 input">
                    <label for="nomeProduto">Nome</label>
                    <input name="nomeProduto" type="name" class="form-control" maxlength="60" minlength="5">
                    <div class="error-input text-danger">
                      Preenchimento incorreto!
                    </div>
                </div>
                <div class="col-sm-6 input">
                    <label for="estoqueProduto">Estoque</label>
                    <input type="text" name="estoqueProduto" class="form-control"  maxlength="5" minlength="1">
                    <div class="error-input text-danger">
                      Preenchimento incorreto!
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 input">
                    <label for="telefoneCliente">Preço</label>
                    <input type="text" name="precoProduto" class="form-control moneyInput" maxlength="10" minlength="1">
                    <div class="error-input text-danger">
                      Preenchimento incorreto!
                    </div>
                </div>
                <div class="col-sm-6 input">
                    <label for="cpfCliente">Codigo de barras</label>
                    <input type="text" name="cbarrasProduto" class="form-control" minlength="13">
                    <div class="error-input text-danger">
                      Preenchimento incorreto!
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary bt_salvar_produto">Salvar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
