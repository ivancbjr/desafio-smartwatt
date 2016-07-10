<?php

$occurrences=json_decode(file_get_contents("../data/occurrences.json"),true);
$retorno["data"]="";
$k=0;
foreach($occurrences as $dados){
    $retorno["data"][$k][]=$dados["occurType"];
    $retorno["data"][$k][]=$dados["content"]["createdDate"];
    $retorno["data"][$k][]=$dados["content"]["name"];
    $retorno["data"][$k][]=$dados["content"]["type"];
    $retorno["data"][$k][]=$dados["content"]["description"];
    $retorno["data"][$k][]=$dados["content"]["id"];
    $retorno["data"][$k][]='<input type="button" class="btn btn-default JS_addNew" data-toggle="modal" data-target="#myModal" value="ADD">';
    $k++;
}
echo json_encode($retorno);