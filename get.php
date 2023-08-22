<?php
require_once 'Usuario.php';

if(isset($_GET['cpf'])){
    if($_GET['cpf'] == 'all'){
        $content = file_get_contents("users.json", true);
        echo $content;
    }else{
          $content = file_get_contents("users.json", true);
          $arrayContent = json_decode($content);

          foreach ($arrayContent as $userData) {
              $user = new Usuario($userData->cpf, $userData->nome, new DateTime($userData->data_nascimento));
              if ($user->cpf == intval($_GET['cpf'])) {
                    echo $user->toJson();
                    break;
              }
          }
          
          if(Usuario::getUser($arrayContent, intval($_GET['cpf'])) === null){
                 echo 'Usuário não encontrado.';
          }
    }
}

?>