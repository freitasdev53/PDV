<?php
include"../popup/modalProdutos.php";
include"../popup/modalAlert.php";
?>
<script src="./js/datatablesGeral.js"></script>
<script src="./js/produtos.js"></script> 
<div class="d-flex flex-wrap p-1">
    <div class="col-sm-3">
        <button class="btn btn-success adicionarProduto">Adicionar produto</button>
    </div>
</div>
<hr width="100%">
<table id="example1" class="table table-bordered text-center tabela ">
    <thead class="bg-success text-white">
        <tr>
            <th>Nome</th>
            <th>Estoque</th>
            <th>Preço</th>
            <th>C/Barras</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>   
</table>
<script>
function editarCliente(IDCliente,IDEmpresa){
    // var dados = await fetch('view.php?Setor=Empresa&ID='+ID);
    // var response = await dados.json()
    // console.log(response)
    // alert(IDEmpresa);
    // return false;
    var modal = "#cadastroCliente";
    $.ajax({
        method : "POST",
        url : "views/view.php",
        data : {
            "ID" : IDCliente,
            "Setor" : "Cliente"
        },
        success : function(response){
            var rs = JSON.parse(response)
            $(modal).modal("show");
            $('input[name=IDCliente]').val(rs['IDCliente'])
            $('input[name=nomeCliente]').val(rs['nomeCliente'])
            $('input[name=emailCliente]').val(rs['emailCliente'])
            $('input[name=telefoneCliente]').val(rs['telefoneCliente'])
            $('input[name=cpfCliente]').val(rs['cpfCliente'])
        }
    })
}

function editarProduto(IDProduto){
    // alert(IDProduto)
    // return false
    var modal = "#cadastroProduto";
    $.ajax({
        method : "POST",
        url : "./processamento/view.php",
        data : {
            "ID" : IDProduto,
            "Setor" : "Produtos"
        },
        success : function(response){
            var rs = JSON.parse(response)
            $(modal).modal("show");
            $('input[name=IDProduto]').val(rs['IDProduto'])
            $('input[name=nomeProduto]').val(rs['nomeProduto'])
            $('input[name=estoqueProduto]').val(rs['estoqueProduto'])
            $('input[name=precoProduto]').val(Intl.NumberFormat('pt-br', {style: 'currency', currency: 'BRL'}).format(rs['valorProduto']).replace("R$","").trim());
            $('input[name=cbarrasProduto]').val(rs['codigoBarras'])
        }
    })
}

function excluirProduto(IDProduto){
    // alert(IDProduto)
    // return false
    var modalQuiz = "#alerta";
    $(modalQuiz).modal("show");
    $(".modal-title").text("Exclusão de produto")
    $("input[name=IDUser]",modalQuiz).val(IDProduto);
    $(".bt_excluir_usuario",modalQuiz).show()
    $(".bt_desativar_usuario",modalQuiz).hide()
}
</script>