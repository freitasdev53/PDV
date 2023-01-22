<?php
include"../popup/modalFinalizar.php";
?>
<script src="./js/caixa.js"></script>
<div class="d-flex flex-wrap p-1">
    <div class="col-sm-2">
        <input name="buscarProduto" class="form-control rounded-0" type="text" class="form-control">
    </div>
    <div class="col-sm-2">
        <button class="btn btn-success rounded-0"><i class="fas fa-search"></i></button>
    </div>
</div>
<br>
<div class="col-sm-12 d-flex justify-content-center flex-wrap">
    <div class="col-sm-12">
        <table class="table table-bordered text-center tabela ">
            <thead class="bg-success text-white">
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>Total</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>

            </tbody>    
        </table>
    </div>
    <hr width="100%">
    <div class="col-sm-12 d-flex ">
        <div class="col-sm-4 d-flex">
            <h3>Total(R$):&nbsp;</h3>
            <h3>230&nbsp;</h3>
            <button class="btn btn-success finalizarVenda">Finalizar</button>
        </div>
    </div>
</div>