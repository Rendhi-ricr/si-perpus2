<?php

namespace App\Controllers;

use App\Models\petugasModels;

class Login extends BaseController
{
    protected $petugasModels;

    public function __construct()
    {
        $this->petugasModels = new petugasModels();
    }

    public function index()
    {
        $login = $this->request->getPost('login');

        if ($login) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            if ($email == '' or $password == '') {
                $err = "Silahkan masukkan email dan password";
            } else {
                // Try to find admin by phone number
                $dataAdmin = $this->petugasModels->where("email", $email)->first();

                if ($dataAdmin && $dataAdmin['password'] == $password) {
                    $dataSesi = [
                        'email' => $dataAdmin['email'],
                        'password' => $dataAdmin['password'],
                    ];
                    session()->set($dataSesi);
                    return redirect()->to('/admin');
                } else {
                    // Handle if admin not found or password is incorrect
                    $err = "Email atau password tidak sesuai";
                }
            }

            if ($err) {
                session()->setFlashdata("email", $email);
                session()->setFlashdata('err', $err);
                return redirect()->to("/login");
            }
        }
        $data = [
            "title" => "Login"
        ];

        return view('pages/login', $data);
    }
}
