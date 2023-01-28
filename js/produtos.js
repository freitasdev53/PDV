$(".adicionarProduto").on("click",function(){
    $("#cadastroProduto").modal("show")
})

$(".bt_salvar_produto").on("click",function(){
    if(!validaCampos("#formProdutos"))return false
    $.ajax({
        method : "POST",
        url    : "./processamento/enviaDados.php",
        data   : {
            nomeProduto     : $("input[name=nomeProduto]").val(),
            estoqueProduto  : $("input[name=estoqueProduto]").val(),
            precoProduto    : $("input[name=precoProduto]").val(),
            cbarrasProduto  : $("input[name=cbarrasProduto]").val(),
            IDProduto       : $("input[name=IDProduto]").val()
        }
    }).done(function(retorno){
        console.log(retorno)
        tableProdutos.ajax.reload( null, false )
        $("#cadastroProduto").modal("hide")
    })
})

$(".bt_excluir_usuario").on("click",function(){
    //EXCLUSÃO DE Contas
    $.ajax({
        method : "POST",
        url : "./processamento/apagaDados.php",
        data : {
            setor : 'Produtos',
            ID   : $("input[name=IDUser]").val()
        },
        success : function(resultado){
            // console.log(resultado)
            $("#alerta").modal("hide") & tableProdutos.ajax.reload( null, false );
        }
    })

})


