<?php

namespace App\Controllers;

use App\Models\UserModel;                        // importa o model

// isso é um dock block para poder melhorar as pesquisas
/**
 * @property \CodeIgniter\HTTP\Response $response
 * @property \CodeIgniter\HTTP\IncomingRequest $request
 */


class UserController extends BaseController      // obrigatorio extender
{
    public function index()                      // nome da funçao
    {
        $userModel = new UserModel();            // instancia o model (cria ele na memoria)

        $users = $userModel->findAll();          // vai no banco buscar tudo

        return $this->response->setJSON($users); // retorna o objeto http da resposta para permitir o encadeamneto -> 
    }

    public function store()                      // metodo store armazenar usuario [2026-02-27 10:09]
    {
       $userModel = new UserModel();             // 1. cria uma nova instancia do modelo UserModel

       // 2. Pega o corpo da requisição esperando que venha em formato JSON
       //    O true como parâmetro faz o CodeIgniter converter o JSON em array associativo
       $data = $this->request->getJSON(true);    

       // regras
       $rules = [
        'name' => 'required|min_length[3]'
       ];

       if(!$this->validate($rules)){
        return $this->response->setJSON([
            'error' => $this->validator->getErrors()
        ])->setStatusCode(400);
       }

       // 3. Verifica se o campo 'name' existe no JSON e se não está vazio
       // removendo essavalidação manual
    //    if (!isset($data['name']) || empty($data['name'])) {
           // 4. Se não veio o nome ou veio vazio → retorna erro 400 (Bad Request)
        //    return $this->response->setJSON([
        //        'error' => 'Nome é obrigatório'
        //    ])->setStatusCode(400);
           // Obs: o return encerra a execução do método imediatamente
    //    }
       
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

    // update
    public function update($id = null)      // nome da função
    {
      $userModel = new UserModel();         // instancia cria o model na memoria $userModel

      $user = $userModel->find($id);        // find() busca no banco um unico registro pelo id

      if (!$user) {                         // true or false se não encontrar o $user no banco
          return $this->response->setJSON([        // setJSON() converte array e obj em string json e recebe ler no body e headers
              'error' => 'Usuário não encontrado'  // retorna um erro em formato json como resposta  
          ])->setStatusCode(404);                  // 404 indica que estabeleceu a conexao mais nao encontrou 
      }                                            // o recurso

      $data = $this->request->getJSON(true);       // le dados json enviados no body  true faz o retorno ser um array associativo  
                                                   // resutado final data é um array associativo do json recebido
      $userModel->update($id, [                    // update() atualiza um registro existente ela permite passar um array de dados
          'name' => $data['name'] ?? $user['name'] // true??false se data tiver um nome use ele se nao use(mantenha) o do usuario
      ]);
      
      return $this->response->setJSON([                  // a resposta é em json no body e no headers que o usuario foi atualizado
          'message' => 'Usuário atualizado com sucesso'  // Content-Type: application/json
      ]);

    }

    // delete
    public function delete($id = null)
    {
        $userModel = new UserModel();
    
        $user = $userModel->find($id);
    
        if (!$user) {
            return $this->response->setJSON([
                'error' => 'Usuário não encontrado'
            ])->setStatusCode(404);
        }
    
        $userModel->delete($id);
    
        return $this->response->setJSON([
            'message' => 'Usuário removido com sucesso'
        ]);
    }

    // get buscar 
    public function show($id = null)
{
    $userModel = new UserModel();

    $user = $userModel->find($id);

    if (!$user) {
        return $this->response->setJSON([
            'error' => 'Usuário não encontrado'
        ])->setStatusCode(404);
    }

    return $this->response->setJSON($user);
}
}