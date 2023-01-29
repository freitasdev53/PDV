<?php
include"../popup/modalFinalizar.php";
include"../processamento/class.php";
?>
<script src="./js/caixa.js"></script>
<div class="d-flex flex-wrap p-1">
    <div class="col-sm-2">
        <input list="produtosLista" class="form-control rounded-0" name="produto" id="produto">
    </div>
    <div class="col-sm-2">
        <button class="btn btn-success bt-caixa rounded-0"><i class="fas fa-search"></i></button>
    </div>
</div>
<datalist id="produtosLista">
    <?php
    foreach($produtos->exibirProdutos() as $prod){
    ?>
        <option 
        data-id="<?=$prod['IDProduto']?>"
        data-nome="<?=$prod['nomeProduto']?>"
        data-estoque="<?=$prod['estoqueProduto']?>"
        data-precoexibe="<?=PDV::trataValor($prod['valorProduto'],0)?>"
        data-preco="<?=$prod['valorProduto']?>" 
        value="<?=$prod['codigoBarras']?>"
        >
        <?=$prod['nomeProduto']?>
        </option>
    <?php
    }
    ?>
</datalist>
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
            <tbody class="caixaLista">

            </tbody>    
        </table>
    </div>
    <br>
    <div class="col-sm-12 d-flex ">
        <div class="col-sm-4 d-flex">
            <h3>Total(R$):&nbsp;</h3>
            <h3 id='valTotal'>0,00</h3>
        </div>
    </div>
</div>
<br>
<button class="btn btn-success finalizarVenda">&nbsp;Finalizar</button>
<!-- <h5 id='teste'></h5> -->