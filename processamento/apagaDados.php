<?php
require"class.php";
$setor = $_POST['setor'];
$ID = $_POST['ID'];
switch($setor){
    case "Produtos":
        echo $produtos->excluirProduto($ID);
    break;
}