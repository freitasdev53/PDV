$(".finalizarVenda").on("click",function(){
    $("#finalizarVenda").modal("show")
})

$(".bt_finalizar_venda").on("click",function(){
    var venda = []
    if(!validaCampos("#formFinalizar")){
        alert("nao foi")
    }else{
        //CRIA UM JSON COM OS PRODUTOS LISTADOS
       $(".caixaLista tr").each(function(){
            venda.push({
                "IDProduto"                : $(this).attr("data-id"),
                "quantidadeProduto" : $(".qtd",this).text().trim(),
            })
       })
        //REALIZA A VENDA
        $.ajax({
            method : "POST",
            url    : "./processamento/enviaDados.php",
            data   : {
                venda  : venda,
            }
        }).done(function(retorno){
            console.log(retorno)
            // tableProdutos.ajax.reload( null, false )
            console.log(retorno)
            $("#finalizarVenda").modal("hide")
        })
        //
    }
})

$(".bt-caixa").click(function(){
    var CDBarras = $("input[name=produto]").val()
    if(CDBarras == ""){
        return false
    }else{

        var QTProduto = $('#produtosLista option').filter(function() {
            return this.value == CDBarras;
        }).data('estoque');

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
            "total"         : 0.0,
            "QTCaixa"       : QTProduto
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
        if(produto.QTCaixa < quantidade){
            alert("Quantidade insuficiente")
            return false
        }else{
            if(soma == true){
                $(".caixaLista #produto_"+produto.IDProduto).find(".total").text(trataValor(total,0))
                $(".caixaLista #produto_"+produto.IDProduto).attr("data-total",total)
                $(".caixaLista #produto_"+produto.IDProduto).attr("data-qtd",quantidade)
                $(".caixaLista #produto_"+produto.IDProduto).find(".qtd").text(quantidade)
            }else{
                $(".caixaLista").append('<tr id="produto_'+produto.IDProduto+'" data-id='+produto.IDProduto+' data-qtd='+quantidade+' data-total='+total+' data-val='+produto.valorTrata+'><td class="nomeProduto">'+produto.nomeProduto+'</td><td class="qtd">'+quantidade+'</td><td class="valorProduto">'+produto.valorExibe+'</td><td class="total">'+trataValor(total,0)+'</td><td><button class="btn btn-danger bt-remove-produto btn-xs btn-sm"><i class="nav-icon fa fa-trash"></i></button></td></tr>')
            }
        }
    }else{
        $(".caixaLista #produto_"+produto).attr("data-total",0.0)
    }
    $(".caixaLista tr").each(function(){
        $("#valTotal").text(trataValor(somaTotal += parseFloat($(this).attr("data-total")),0))
    })

    //
}

$("#finalizarVenda").on("show.bs.modal",function(){
    var valorTotal= trataValor($("#valTotal").text(),1)

    $("input[name=pagamentoProduto]").keyup(function(){
        var valorRecebido = trataValor($(this).val(),1);
        var troco = parseFloat(valorRecebido) - parseFloat(valorTotal)
        $("#valTroco").text(trataValor(troco,0))
    })
    
})

// $("#teste").text(trataValor("1,000,00",1) - trataValor("865,00",1))