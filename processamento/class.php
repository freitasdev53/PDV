<?php

require"bd.php";
class Produtos{
    //salva ou edita um produto
    public static function salvarProduto($dados){
        $valor = PDV::trataValor($dados['valorProduto'],1);
        if($dados['IDProduto']){
            $SQL = mysqli_query(PDV::conectarDatabase(),"UPDATE produtos SET nomeProduto = '".$dados['nomeProduto']."', estoqueProduto = '".$dados['estoqueProduto']."', valorProduto = '".$valor."', codigoBarras = '".$dados['codigoBarras']."' WHERE IDProduto = '".$dados['IDProduto']."' ");
        }else{
            $SQL = mysqli_query(PDV::conectarDatabase(),"INSERT INTO produtos (nomeProduto,estoqueProduto,valorProduto,codigoBarras) VALUES ('".$dados['nomeProduto']."','".$dados['estoqueProduto']."','".$valor."', '".$dados['codigoBarras']."' ) ");
        }
        return $SQL;
    }
    //apaga um produto
    public static function excluirProduto($ID){
        $SQL = mysqli_query(PDV::conectarDatabase(),"DELETE FROM produtos WHERE IDProduto = '".$ID."' ");
        return $SQL;
    }
    //Exibe apenas um produto
    public static function exibirProduto($ID){
        $SQL = mysqli_query(PDV::conectarDatabase(),"SELECT * FROM produtos WHERE IDProduto = '".$ID."' ");
        return $SQL;
    }
    //Exibe a lista de produtos
    public static function exibirProdutos(){
        $SQL = mysqli_query(PDV::conectarDatabase(),"SELECT * FROM produtos");
        return $SQL;
    }
}

class Caixa{
    //Realiza uma venda
    public static function realizarVenda($produto){
        foreach($produto as $pro){
            $SQL = mysqli_query(PDV::conectarDatabase(),"INSERT INTO vendas (IDProduto,DTVenda,Quantidade) VALUES ('".$pro['IDProduto']."',NOW(),'".$pro['quantidadeProduto']."') ") && mysqli_query(PDV::conectarDatabase(),"UPDATE produtos SET estoqueProduto = produtos.estoqueProduto - '".$pro['quantidadeProduto']."' WHERE IDProduto = '".$pro['IDProduto']."' ");
        }
        return $SQL;
    }

    public static function listarVendas(){
        $SQL = mysqli_query(PDV::conectarDatabase(),"SELECT pro.nomeProduto as produto, ven.DTVenda as datahora, ven.Quantidade as quantidade, pro.valorProduto * ven.Quantidade as total FROM vendas as ven INNER JOIN produtos as pro USING(IDProduto)");
        return $SQL;
    }
    //
}

$produtos = new Produtos;
$caixa = new Caixa;