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

        // Validation rules
        $valid = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required'
                ]
            ]
        ]);

        // Validation instance
        $validation = \Config\Services::validation();

        // Create instance of UserModel
        $userModel = new UserModel();

        // Get data from database
        $user = $userModel->getAsistenByUsername($username);

        // Check if validation fails
        if (!$valid) {
            $errorMessage = [
                'username' => $validation->getError('username'),
                'password' => $validation->getError('password')
            ];
            session()->setFlashdata($errorMessage);
            session()->setFlashdata('error', 'Login failed!');
            return redirect()->to('/login');
        } else {
            // Check if user exist
            if ($user) {
                // Check password
                if ($password == $user['password']) {
                    // Create session
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'first_name' => $user['nama_asisten'],
                        'level' => $user['level'],
                        'jabatan' => $user['jabatan'],
                        'id_asisten' => $user['id_asisten'],
                    ];

                    // Set session
                    session()->set($data);

                    // Set flash data success login
                    session()->setFlashdata('success', 'Login successfully!');

                    // Redirect to dashboard
                    return redirect()->to('/dashboard');
                } else {
                    // Set flashdata
                    session()->setFlashdata('password', 'Password is wrong');
                    session()->setFlashdata('error', 'Login failed!');

                    // Redirect to login page
                    return redirect()->to('/login')->withInput();
                }
            } else {
                // Set flashdata
                session()->setFlashdata('username', 'Username is not registered');
                session()->setFlashdata('error', 'Login failed!');

                // Redirect to login page
                return redirect()->to('/login')->withInput();
            }
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