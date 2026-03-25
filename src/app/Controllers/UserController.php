<?php

namespace App\Controllers;

use App\Services\UserService;

class UserController extends BaseController
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $users = $this->userService->getAll();

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $users
        ]);
    }

    public function show($id = null)
    {
        $user = $this->userService->getById($id);

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

    public function store()
    {
        $data = $this->request->getJSON(true);

        $rules = [
            'name' => 'required|min_length[3]'
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        $result = $this->userService->create($data);

        if ($result['error']) {
        return $this->response->setJSON([
            'status' => 'error',
            'errors' => $result['message']
        ])->setStatusCode(400);
       }

       return $this->response->setJSON([
        'status' => 'success',
        'data' => $result['message']
       ])->setStatusCode(201);
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        $result = $this->userService->update($id, $data);

        if ($result['error']) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $result['message']
            ])->setStatusCode(400);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $result['message']
        ]);
    }

    public function delete($id = null)
    {
        $result = $this->userService->delete($id);

        if ($result['error']) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $result['message']
            ])->setStatusCode(404);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $result['message']
        ]);
    }
}