<?php
namespace App\Controllers;


class TesteController extends BaseController
{
    public function teste($name)
    {
        $data=[
            'NomeTeste' => $name
        ];
        return view('users/teste', $data);
    }
}

?>