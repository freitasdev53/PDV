<?php

require"../processamento/class.php";
if(isset($_POST['de']) && isset($_POST['ate'])){
    if($_POST['de'] == "" && $_POST['ate'] == ""){
        $intervalo = "naoexiste";
    }else{
        $intervalo = array(
            "de" => $_POST['de'],
            "ate" => $_POST['ate']
        );
    }
}else{
    $intervalo = "naoexiste";
}
$registros= $caixa->listarVendas($intervalo);
$registros_total = mysqli_num_rows($registros);
if($registros_total > 0){
    foreach($registros as $registro){
        extract($registro);
        $item = [];
        $item[] = $produto;
        $item[] = date("d/m/Y H:i:s", strtotime($datahora));
        $item[] = $quantidade;
        $item[] = PDV::trataValor($total,0);
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