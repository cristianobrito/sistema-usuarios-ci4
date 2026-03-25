<?php

namespace App\Services;

use App\Models\UserModel;

class UserService
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getAll()
    {
        return $this->userModel->findAll();
    }

    public function getById($id)
    {
        return $this->userModel->find($id);
    }

    public function create($data)
    {
        if (!isset($data['name']) || strlen($data['name']) < 3) {
            return [
                'error' => true,
                'message' => 'O nome deve ter pelo menos 3 caracteres'
            ];
        }

        $this->userModel->insert([
            'name' => $data['name']
        ]);

        return [
            'error' => false,
            'message' => 'Usuário criado com sucesso'
        ];
    }

    public function update($id, $data)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return [
                'error' => true,
                'message' => 'Usuário não encontrado'
            ];
        }

        if (!isset($data['name']) || strlen($data['name']) < 3) {
            return [
                'error' => true,
                'message' => 'O nome deve ter pelo menos 3 caracteres'
            ];
        }

        $this->userModel->update($id, [
            'name' => $data['name']
        ]);

        return [
            'error' => false,
            'message' => 'Usuário atualizado com sucesso'
        ];
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return [
                'error' => true,
                'message' => 'Usuário não encontrado'
            ];
        }

        $this->userModel->delete($id);

        return [
            'error' => false,
            'message' => 'Usuário removido com sucesso'
        ];
    }
}

/**
 *     DISSECAR
 *  1. namespace App\Services;    <-- crio um namaespace serve de endereço
 *  2. use App\Models\UserModel;  <-- importo a classe do banco de dados
 *  3. class UserService          <-- cria a classe
 *  4. protected $userModel;      <-- encapsulamento so a classe ve
 *  5. public function __construct() <-- cria o construtor 
 *  6. $this->userModel = new UserModel(); <-- instancia o model 
 *  7. isset() <-- verifica se uma variável foi definida (inicializada) e se ela não é nula (null). 
 *  8. strlen() <-- calcula o tamanho (comprimento) de uma string, retornando o número total de bytes nela contidos.
 * 
 */