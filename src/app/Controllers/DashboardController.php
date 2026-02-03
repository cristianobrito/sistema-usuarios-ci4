<?php
namespace App\Controllers;

class DashboardController extends BaseController
{
    public function dashboard($name)
    {
        $data=[
          'NomeDash' => $name 
        ];
        return view('users/dashboard', $data);
    }
}

?>