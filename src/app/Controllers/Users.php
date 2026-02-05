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
}

?>