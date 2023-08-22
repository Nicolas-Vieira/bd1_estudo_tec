<?php
require_once 'Usuario.php';

$data = json_decode(file_get_contents('php://input'), true);

if($data != null){
       $content = file_get_contents("users.json",true);
       $arrayContent = json_decode($content, true);

       $newUsuario = new Usuario($data['cpf'], $data['nome'], new DateTime($data['data_nascimento']));
       array_push($arrayContent, $newUsuario->toArray());

       file_put_contents("users.json", json_encode($arrayContent));
       echo json_encode($arrayContent);

}else{
       echo 'Nenhum dado recebido!';
}

?>