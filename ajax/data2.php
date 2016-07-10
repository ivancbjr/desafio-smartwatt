<?php

$chartData=json_decode(file_get_contents("../data/chartData.json"),true);
//cores definidas pela smartwatt
$colorAxis=array('#647378','#a0afaf','#69aa73','#82c387','#5aafd7','#73c8f5','#dca000','#fab900');
$k=1;
foreach($chartData as $dados){

    $retorno["series"][$k]["name"]="ID Point ".$dados["location"]["id_point"];
    $retorno["series"][$k]["data"]=array_values($dados["data"]);
    $retorno["series"][$k]["color"]=$colorAxis[$k]; //não dinamico - limitado ao número de resultados
	
	//opcao para selectbox
	$retorno["option"][$k]=$retorno["series"][$k]["name"];
    $k++;
}


//opçoes selecionadas pela selectbox
if(isset($_GET["opcoes"])){
	$r_opcoes=explode("-",$_GET["opcoes"]);
	$i=0;
	foreach($retorno["series"] as $k=>$dados){
		if(in_array($k,$r_opcoes))
			$m["series"][$i++]=$dados;
	}
	echo json_encode($m);
	exit;
}



echo json_encode($retorno);