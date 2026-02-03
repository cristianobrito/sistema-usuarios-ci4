<?php
namespace App\Controllers;

class UsersController extends BaseController
{
  public function login()
  {
     return view('users/login');
  }

  public function profile($name)
  {
    $data=[
      'username' => $name
    ];

    return view('users/profile', $data);
  }
}

?>