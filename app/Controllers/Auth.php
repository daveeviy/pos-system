<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/users');
        }

        return view('auth/login', ['title' => 'Login']);
    }

    public function attemptLogin()
    {
        $session   = session();
        $userModel = new UserModel();

        $username = trim($this->request->getPost('username'));
        $password = trim($this->request->getPost('password'));

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'id'         => $user['id'],
                'username'   => $user['username'],
                'full_name'  => $user['full_name'],
                'isLoggedIn' => true,
            ];
            $session->set($sessionData);
            return redirect()->to('/users');
        }

        return redirect()->back()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}