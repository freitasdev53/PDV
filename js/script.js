$(".navegacao a").on("click",function(){
    $(this).addClass('bg-white text-dark').siblings().removeClass('bg-white text-dark');
    var pagina = "view/"+$(this).attr("data-page")
    abrirPagina(pagina)
})
function abrirPagina(file){
    $.ajax({
        url : file,
        cache : false
    }).done(function(exibicao){
        $(".exibicao").html(exibicao)
        $("#cadastroProduto #formProdutos .error-input").hide()
        $("#finalizarVenda #formFinalizar .error-input").hide()
        $(function(){
            $('.moneyInput').maskMoney({
              allowNegative: true,
              thousands:',', decimal:',',
              affixesStay: true});
        })
        $(".modal").on("hide.bs.modal",function(){
            $("input").val("")
            $("#valTroco").text("")
        })

        $('input[type=name]').bind('input',function(){
            str = $(this).val().replace(/[^A-Za-z\u00C0-\u00FF\-\/\s]+/g,'');
            str = str.replace(/[\s{ \2 }]+/g,' ');
            if(str == " ")str = "";
            $(this).val( str );
        });

        $("input[name=cbarrasProduto]").mask("0000000000000")
        $("input[name=estoqueProduto]").mask("00000")

    })
}

function validaCampos(form){
    var inputs = [];
    $(".input input").parents(".input").find(".error-input").hide()
    $(".input input",form).each(function(){
        if($(this).val().length < $(this).attr("minlength")){
            inputs.push($(this).attr("name"))
        }
    })

    if(inputs.length > 0){
        $(inputs).each(function(index,val){
            $(".input input[name='"+val+"']").parents(".input").find(".error-input").show()
        })
        return false
    }
    return true
}

function trataValor(valor,tratamento){
    if(tratamento == 0){
        //TRATAENTO PARA EXIBIR NA TELA
        return Intl.NumberFormat('pt-br', {style: 'currency', currency: 'BRL'}).format(valor).replace("R$","").trim()
    }else{
        //TRATAMENTO PARA PROCESSAR NO BACKEND
        var quantidade = 0;
        for (var i = 0; i < valor.length; i++) {
            if (valor[i] == "," || valor[i] == "." ) {
                quantidade++
            }
        }
        //PERGUNTA SE A QUANTIDADE DE VIRGULAS E IGUAL A DOIS
        if(quantidade == 2){
            return valor.replace(",",".").replace(".","")
        }else{
            return valor.replace(",",".").trim()
        }
    }
}