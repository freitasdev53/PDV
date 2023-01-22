$(".finalizarVenda").on("click",function(){
    $("#finalizarVenda").modal("show")
})

$(".bt_finalizar_venda").on("click",function(){
    if(!validaCampos("#formFinalizar")){
        alert("nao foi")
    }else{
        alert("foi")
    }
})