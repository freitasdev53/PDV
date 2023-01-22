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