$(".adicionarProduto").on("click",function(){
    $("#cadastroProduto").modal("show")
})

$(".bt_salvar_produto").on("click",function(){
    if(!validaCampos("#formProdutos")){
        alert("nao foi")
    }else{
        alert("foi")
    }
})


