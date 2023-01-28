<?php

require"../processamento/class.php";

$registros= $produtos->exibirProdutos();
$registros_total = mysqli_num_rows($registros);
if($registros_total > 0){
    foreach($registros as $registro){
        extract($registro);
        $item = [];
        $item[] = $nomeProduto;
        $item[] = $estoqueProduto;
        $item[] = PDV::trataValor($valorProduto,0);
        $item[] = $codigoBarras;
        $item[] = "
        <button class='btn btn-primary btn-xs btn-sm bt_editar_usuario' onclick='editarProduto($IDProduto)' ><i class='nav-icon fa fa-pencil-alt'></i></button>
        <button class='btn btn-danger btn-xs btn-sm' onclick='excluirProduto($IDProduto)' ><i class='nav-icon fa fa-trash'></i></button>
        ";
        $itensJSON[] = $item;
    }
}else{
    $itensJSON = [];
}



$resultados = [
    "recordsTotal" => intval($registros_total), 
    "recordsFiltered" => intval($registros_total), 
    "data" => $itensJSON 
];

echo json_encode($resultados);