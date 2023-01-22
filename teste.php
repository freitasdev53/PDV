<?php


function trataValor($valor,$tratamento){
    //RECEBE VALORES DO BANCO DE DADOS PARA IMPRIMIR NA TELA
    switch($tratamento){
        case "0":
            return number_format($valor,2,",",",");
        break;
        case "1":
            $envBanco = $valor; //VALOR
            $firstChar = strtok($envBanco,","); //NUMEROS ANTES DA PRIMEIRA VIRGULA
            $lastChar = strstr($envBanco,","); //NUMEROS DEPOIS DA VIRGULA
            $valorTratado = str_replace(",","",$firstChar.ltrim($lastChar,",")); //JUNTA OS DOIS E RETIRAM AS VIRGULAS JUNTO COM OS CENTAVOS
            $strlenValor = strlen($valorTratado) -2; //BUSCA OS DOIS ULTIMOS CARACTERES QUE SÃO OS CENTAVOS
            return substr_replace($valorTratado,".",$strlenValor,0); //COLOCA UM PONTO NOS DOIS ULTIMOS CARACTERES PARA BUSCAR OS CENTAVOS
        break;
    }
}

//0 IMPRIME O VALOR TRATADO DO BANCO DE DADOS
//1 RETIRA AS VIRGULAS E ENVIA O VALOR PARA O BANCO DE DADOS OU REALIZA UM CALCULO COM ELE

$recebeBanco1 = 1000000.00;
$recebeBanco2 = 0.19;
$totalRecebeBanco = $recebeBanco1 + $recebeBanco2;

// echo trataValor($totalRecebeBanco,0)."<br>";

//TRATA E ENVIA PARA O BANCO

$teste1 = trataValor("0,05",1);
$teste2 = trataValor("45,10",1);

echo $teste1 + $teste2;


