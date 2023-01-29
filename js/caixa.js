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

$(".bt-caixa").click(function(){
    var CDBarras = $("input[name=produto]").val()
    if(CDBarras == ""){
        return false
    }else{
        var IDProduto = $('#produtosLista option').filter(function() {
            return this.value == CDBarras;
        }).data('id');
    
        var valorExibe = $('#produtosLista option').filter(function() {
            return this.value == CDBarras;
        }).data('precoexibe');
    
        var valorTrata = $('#produtosLista option').filter(function() {
            return this.value == CDBarras;
        }).data('preco');
    
        var nomeProduto = $('#produtosLista option').filter(function() {
            return this.value == CDBarras;
        }).data('nome');
        
        var dadosProdutos = {
            "CDBarras"      : CDBarras,
            "IDProduto"     : IDProduto,
            "valorExibe"    : valorExibe,
            "valorTrata"    : valorTrata,
            "nomeProduto"   : nomeProduto,
            "quantidade"    : 1,
            "total"         : 0.0
        }

        adicionarProdutoCaixa(dadosProdutos,"adc")

    }
})
//FUNCAO PARA EXIBIR PARA O USUARIO NA TELA
//Intl.NumberFormat('pt-br', {style: 'currency', currency: 'BRL'}).format(rs['valorProduto']).replace("R$","").trim()

$(".caixaLista").on("click",".bt-remove-produto",function(e){
    IDProduto = $(this).parents("tr").attr("data-id")
    adicionarProdutoCaixa(IDProduto,"del")
    $(".caixaLista #produto_"+IDProduto).remove()
})

function adicionarProdutoCaixa(produto,acao){
    //VALORES RECEBIDOS
    // console.log(produto)
    var somaTotal = 0.0
    if(acao == "adc"){
        soma = false
        var total = produto.valorTrata
        var quantidade = produto.quantidade
        //VERIFICACAO SE TEM JA ALGUM IGUAL
        $(".caixaLista tr").each(function(){
            if($(this).attr("data-id") == produto.IDProduto){
                soma = true
                quantidade = parseInt($(this).attr("data-qtd")) + parseInt(produto.quantidade)
                total = quantidade * produto.valorTrata
            }
            //$("#valTotal").text(somaValoresTotais(valoresTotais))
        })
        //ADICAO NA LINHA
        if(soma == true){
            $(".caixaLista #produto_"+produto.IDProduto).find(".total").text(trataValorExibe(total))
            $(".caixaLista #produto_"+produto.IDProduto).attr("data-total",total)
            $(".caixaLista #produto_"+produto.IDProduto).attr("data-qtd",quantidade)
            $(".caixaLista #produto_"+produto.IDProduto).find(".qtd").text(quantidade)
        }else{
            $(".caixaLista").append('<tr id="produto_'+produto.IDProduto+'" data-id='+produto.IDProduto+' data-qtd='+quantidade+' data-total='+total+' data-val='+produto.valorTrata+'><td>'+produto.nomeProduto+'</td><td class="qtd">'+quantidade+'</td><td>'+produto.valorExibe+'</td><td class="total">'+trataValorExibe(total)+'</td><td><button class="btn btn-danger bt-remove-produto btn-xs btn-sm"><i class="nav-icon fa fa-trash"></i></button></td></tr>')
        }
    }else{
        $(".caixaLista #produto_"+produto).attr("data-total",0.0)
    }
    $(".caixaLista tr").each(function(){
        $("#valTotal").text(trataValorExibe(somaTotal += parseFloat($(this).attr("data-total"))))
    })

    //
}