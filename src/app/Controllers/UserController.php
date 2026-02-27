<?php

namespace App\Controllers;

use App\Models\UserModel;                        // importa o model

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();            // instancia o model (cria ele na memoria)

        $users = $userModel->findAll();          // vai no banco buscar tudo

        return $this->response->setJSON($users); // retorna como api json
    }

    public function store()                      // metodo store armazenar usuario [2026-02-27 10:09]
    {
       $userModel = new UserModel();             // 1. cria uma nova instancia do modelo UserModel

       // 2. Pega o corpo da requisição esperando que venha em formato JSON
       //    O true como parâmetro faz o CodeIgniter converter o JSON em array associativo
       $data = $this->request->getJSON(true);    

       // 3. Verifica se o campo 'name' existe no JSON e se não está vazio
       if (!isset($data['name']) || empty($data['name'])) {
           // 4. Se não veio o nome ou veio vazio → retorna erro 400 (Bad Request)
           return $this->response->setJSON([
               'error' => 'Nome é obrigatório'
           ])->setStatusCode(400);
           // Obs: o return encerra a execução do método imediatamente
       }
       
       // 5. Se chegou aqui é porque tem nome → faz a inserção no banco de dados
       //    O método insert() do modelo geralmente faz INSERT INTO users ...
       $userModel->insert([
           'name' => $data['name']
           // Aqui poderiam vir mais campos, ex: 'email', 'password', etc.
       ]);

       // 6. Retorna resposta de sucesso com status 201 (Created)
       return $this->response->setJSON([
           'message' => 'Usuário criado com sucesso'
       ])->setStatusCode(201);
    }
}