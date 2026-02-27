<?php
namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
  public function index()
  {
     $model = new UserModel();

   //   $users = $model->getUsers();  antes era mokado 
     $users = $model->findAll();   // estou pegando do banco

     return view('users/index', [
        'users' => $users
     ]); 
  }

  public function show($id)
  {
     $model = new UserModel();

   //   $user = $model->getUserById($id);
     $user = $model->find($id);    // agora vem do banco


     if(!$user){
       return 'Usuario não encontrado';
     }

      return view('users/show', [
        'user' => $user
      ]);
  }
}

?>