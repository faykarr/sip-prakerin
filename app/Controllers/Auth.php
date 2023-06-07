<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    // loginProcess method
    public function loginProcess()
    {
        // Get data from form
        $username = $this->request->getPost('username');

        // Get MD5 password from form
        $password = md5($this->request->getPost('password'));

        // Create instance of UserModel
        $userModel = new UserModel();

        // Get data from database
        $user = $userModel->where('username', $username)->first();

        // Check if user exist
        if ($user) {
            // Check password
            if ($password == $user['password']) {
                // Create session
                $data = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'level' => $user['level'],
                    'isLoggedIn' => true,
                ];

                // Set session
                session()->set($data);

                // Redirect to dashboard
                return redirect()->to('/dashboard');
            } else {
                // Set flashdata
                session()->setFlashdata('error', 'Password is wrong');

                // Redirect to login page
                return redirect()->to('/login');
            }
        } else {
            // Set flashdata
            session()->setFlashdata('error', 'Username is not registered');

            // Redirect to login page
            return redirect()->to('/login');
        }

    }

    // logout method

    public function logout()
    {
        // Destroy session
        session()->destroy();

        // Redirect to login page
        return redirect()->to('/login');
    }
}