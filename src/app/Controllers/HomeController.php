<?php 

namespace App\Controllers;

class HomeController extends BaseController
{
  public function index()
  {
    // return 'controle funcionando!';
    return view('home');
  }
}

?>