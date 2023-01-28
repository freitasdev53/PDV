<?php
require"class.php";
$v_Id = $_POST["ID"];
$v_Setor = $_POST["Setor"];

switch($v_Setor){
    case "Produtos":
        $dados = $produtos->exibirProduto($v_Id);
        foreach($dados as $dado){
            $retorno = $dado;
        }
    break;
}

echo json_encode($retorno);