<?php

namespace App\Controllers;

use App\Models\UserModel;

/**
 * @property \CodeIgniter\HTTP\Response $response
 * @property \CodeIgniter\HTTP\IncomingRequest $request
 */
class UserController extends BaseController
{
    // LISTAR TODOS
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();
        // echo "<pre>";
        // print_r($users);
        // echo "</pre>";
        // die();

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $users
        ]);
    }
    
    echo "<pre>";
    print_r($this->response->getBody());
    print_r($users);
    echo "</pre>";
    die();


    // CRIAR
    public function store()
    {
        $userModel = new UserModel();

        $data = $this->request->getJSON(true);

        // valida JSON
        if (!$data) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => 'JSON inválido ou vazio'
            ])->setStatusCode(400);
        }

        // valida name
        if (!isset($data['name']) || strlen($data['name']) < 3) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => [
                    'name' => 'O nome deve ter pelo menos 3 caracteres'
                ]
            ])->setStatusCode(400);
        }

        $userModel->insert([
            'name' => $data['name']
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'data' => [
                'message' => 'Usuário criado com sucesso'
            ]
        ])->setStatusCode(201);
    }

    // MOSTRAR UM
    public function show($id = null)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => 'Usuário não encontrado'
            ])->setStatusCode(404);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $user
        ]);
    }

    // ATUALIZAR
    public function update($id = null)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        if (!$user) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => 'Usuário não encontrado'
            ])->setStatusCode(404);
        }

        $data = $this->request->getJSON(true);

        // valida JSON
        if (!$data) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => 'JSON inválido ou vazio'
            ])->setStatusCode(400);
        }

        // valida name
        if (!isset($data['name']) || strlen($data['name']) < 3) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => [
                    'name' => 'O nome deve ter pelo menos 3 caracteres'
                ]
            ])->setStatusCode(400);
        }

        $userModel->update($id, [
            'name' => $data['name']
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'data' => [
                'message' => 'Usuário atualizado com sucesso'
            ]
        ]);
    }

    // DELETAR
    public function delete($id = null)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        if (!$user) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => 'Usuário não encontrado'
            ])->setStatusCode(404);
        }

        $userModel->delete($id);

        return $this->response->setJSON([
            'status' => 'success',
            'data' => [
                'message' => 'Usuário removido com sucesso'
            ]
        ]);
    }

}