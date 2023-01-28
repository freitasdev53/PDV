<?php
require"class.php";
if(isset($_POST['nomeProduto'])){
    $dados = array(
        "IDProduto" => $_POST['IDProduto'],
        "nomeProduto" => $_POST['nomeProduto'],
        "estoqueProduto" => $_POST['estoqueProduto'],
        "valorProduto" => $_POST['precoProduto'],
        "codigoBarras" => $_POST['cbarrasProduto'],
    );
    // echo json_encode($dados);
    $produtos->salvarProduto($dados);
}