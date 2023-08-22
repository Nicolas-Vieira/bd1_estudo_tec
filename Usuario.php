<?php

class Usuario {
    public int $cpf;
    public String $nome;
    public DateTime $data_nascimento;
    
    public function __construct($cpf, $nome, $data_nascimento) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
    }

    // Método estático para buscar um user pelo CPF
    public static function getUser(array $users, int $cpf) {
        foreach ($users as $user) {
            if ($user->cpf === $cpf) {
                return $user;
            }
        }
        return null;
    }

    public function toJson() {
        $data_formatada = $this->data_nascimento->format('Y-m-d');
        $data = array(
            'cpf' => $this->cpf,
            'nome' => $this->nome,
            'data_nascimento' => $data_formatada
        );
        return json_encode($data);
    }

    // Método para transformar o item em array
    public function toArray() {
        return [
            'cpf' => $this->cpf,
            'nome' => $this->nome,
            'data_nascimento' => $this->data_nascimento->format('Y-m-d')
        ];
    }
}

?>