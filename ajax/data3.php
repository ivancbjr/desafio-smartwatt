<?php

$map=json_decode(file_get_contents("../data/location.json"),true);
$k=0;
foreach($map as $dados){
    $retorno[$k]["lat"]=$dados["location"]["lat"];
    $retorno[$k]["lng"]=$dados["location"]["lng"];
    $retorno[$k]["name"]=strip_tags($dados["content"]["0"]);
    unset($dados["content"]["0"]);
    $retorno[$k]["info"]=preg_replace("/<div>(.*?)<\/div>/","$1",(implode("<br/>",$dados["content"])));
    $k++;
}
echo json_encode($retorno);