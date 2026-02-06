<?php
namespace App\Controllers;

class Users extends BaseController
{
  public function index()
  {
     $users=[
        ['id' => 1, 'name' => 'cristiano'],
        ['id' => 2, 'name' => 'joyce'],
        ['id' => 3, 'name' => 'akilles'],
        ['id' => 4, 'name' => 'luna'],
     ];

     return view('users/list', [
        'title' => 'lista de usuarios',
        'users' => $users
     ]); 
  }

  public function show($id)
  {
      $users=[
        ['id' => 1, 'name' => 'cristiano', 'email' => 'cris@email.com'],
        ['id' => 2, 'name' => 'joyce',     'email' => 'joy@email.com' ],
        ['id' => 3, 'name' => 'akilles',   'email' => 'ak@email.com'],
        ['id' => 4, 'name' => 'luna',      'email' => 'lua@email.com'],
     ];

     $userFound = null;

     foreach ($users as $user) {
        if ($user['id'] == $id) {
              $userFound = $user;
              break;
         }
      }

      if (!$userFound) {
        return 'Usuário não encontrado';
      }

      return view('users/show', [
        'user' => $userFound
      ]);
  }
}

?>