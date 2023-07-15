<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class General extends BaseController
{
    // Method profile
    public function profile()
    {
        // Get id_asisten from session
        $id_asisten = session()->get('id_asisten');
        // Get asisten from model user
        $asisten = $this->userModel->getAsistenByUsername($id_asisten);

        $data = [
            'title' => 'Profile',
            // Get first_name from session
            'first_name' => session()->get('first_name'),
            // Get last_name from session
            'last_name' => session()->get('last_name'),
            // Get jabatan from session
            'jabatan' => session()->get('jabatan'),
            // Get level from session
            'level' => session()->get('level'),
            // Get asisten from model
            'asisten' => $asisten,
        ];
        // return view to /app/Views/general/profile/index.php
        return view('general/profile/index', $data);
    }

    // Change password process method
    public function changePassword()
    {
        // Get id_asisten from session
        $id_asisten = session()->get('id_asisten');
        // Get asisten from model user
        $asisten = $this->userModel->getAsistenById($id_asisten);

        // Get data from form
        $old_password = $this->request->getPost('old_password');
        $new_password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');

        // Validation rules
        $valid = $this->validate([
            'old_password' => [
                'label' => 'Old Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required'
                ]
            ],
            'new_password' => [
                'label' => 'New Password',
                'rules' => 'required|min_length[8]|max_length[16]',
                'errors' => [
                    'required' => '{field} is required',
                    'min_length' => '{field} must be at least 8 characters',
                    'max_length' => '{field} must be at most 16 characters'
                ]
            ],
            'confirm_password' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[new_password]',
                'errors' => [
                    'required' => '{field} is required',
                    'matches' => '{field} does not match with New Password'
                ]
            ]
        ]);

        // Validation instance
        $validation = \Config\Services::validation();

        // Check if validation fails
        if (!$valid) {
            $errorMessage = [
                'old_password' => $validation->getError('old_password'),
                'new_password' => $validation->getError('new_password'),
                'confirm_password' => $validation->getError('confirm_password'),
                'error' => 'Change password failed!'
            ];
            session()->setFlashdata($errorMessage);
            return redirect()->to('/profile');
        } else {
            // Check if old password match with password md5
            if (md5($old_password) == $asisten['password']) {
                // Check if new password match
                if ($new_password == $confirm_password) {
                    // Update password with md5
                    $this->userModel->update($asisten['id_user'], ['password' => md5($new_password)]);
                    session()->setFlashdata('success', 'Change password success!');
                    return redirect()->to('/profile');
                } else {
                    session()->setFlashdata('error', 'Change password failed!');
                    session()->setFlashdata('confirm_password', 'Confirm password does not match with New Password');
                    return redirect()->to('/profile');
                }
            } else {
                session()->setFlashdata('error', 'Change password failed!');
                session()->setFlashdata('old_password', 'Old password does not match');
                return redirect()->to('/profile');
            }
        }
    }

    // Method untuk menampilkan halaman input kegiatan harian prakerin
    public function kegiatan()
    {
        // Get id_asisten from session
        if (session()->get('level') == 'admin') {
            $row = $this->kegiatanModel->getKegiatan();
        } else {
            $row = $this->kegiatanModel->getKegiatanById(session()->get('id_asisten'));
        }

        $data = [
            'title' => 'Input Kegiatan',
            // Get first_name from session
            'first_name' => session()->get('first_name'),
            // Get last_name from session
            'last_name' => session()->get('last_name'),
            // Get jabatan from session
            'jabatan' => session()->get('jabatan'),
            // Get level from session
            'level' => session()->get('level'),
            // Get smk from model
            'asisten' => $this->asistenModel->where('status', 'Aktif')->findAll(),
            // Get kegiatan from model
            'kegiatan' => $row,
        ];
        // return view to /app/Views/general/kegiatan/index.php
        return view('general/kegiatan/index', $data);
    }

    // Method addKegiatan store to database
    public function addKegiatan()
    {
        // Get id_asisten from session
        $id_asisten = session()->get('id_asisten');
        // Get asisten_pembantu from input
        $asisten_pembantu = $this->request->getPost('asisten_pembantu');
        // Get ruang_lab from input
        $ruang_lab = $this->request->getPost('ruang_lab');
        // Get detail_kegiatan from input
        $detail_kegiatan = $this->request->getPost('detail_kegiatan');
        // Get tanggal from current date
        $tanggal = date('Y-m-d');
        // Get waktu from current time
        $waktu = date('H:i');

        // Validation input
        if (
            !$this->validate([
                'asisten_pembantu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Asisten Pembantu harus diisi'
                    ]
                ],
                'detail_kegiatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Detail Kegiatan harus diisi'
                    ]
                ],
            ])
        ) {
            // $errorMessage variable
            $errorMessage = [
                'asisten_pembantu' => $this->validation->getError('asisten_pembantu'),
                'detail_kegiatan' => $this->validation->getError('detail_kegiatan'),
                'error' => 'Data gagal ditambahkan.'
            ];
            // Set flashdata untuk error
            session()->setFlashdata($errorMessage);
            // Jika validasi gagal, kembali ke halaman input kegiatan
            return redirect()->to('/input-data/kegiatan')->withInput();
        }

        // Jika validasi berhasil, simpan data ke database
        $this->kegiatanModel->insert([
            'id_asisten' => $id_asisten,
            'asisten_pembantu' => $asisten_pembantu,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'ruang_lab' => $ruang_lab,
            'detail_kegiatan' => $detail_kegiatan,
        ]);

        // Set session flashdata
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');

        // Redirect to /input-data/kegiatan
        return redirect()->to('/input-data/kegiatan');
    }

    // Methode deleteKegiatan
    public function deleteKegiatan($id_kegiatan)
    {
        // Delete data kegiatan by id_kegiatan
        $this->kegiatanModel->delete($id_kegiatan);
        // Set session flashdata
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        // Redirect to /input-data/kegiatan
        return redirect()->to('/input-data/kegiatan');
    }

    // Method Update to database
    public function updateKegiatan()
    {
        // Get id_asisten from post
        $id_asisten = $this->request->getPost('id_asisten');
        // Get asisten_pembantu from input
        $asisten_pembantu = $this->request->getPost('asisten_pembantu');
        // Get ruang_lab from input
        $ruang_lab = $this->request->getPost('ruang_lab');
        // Get detail_kegiatan from input
        $detail_kegiatan = $this->request->getPost('detail_kegiatan');
        // Get tanggal from input
        $tanggal = date('Y-m-d', strtotime($this->request->getPost('tanggal')));
        // Get waktu from input
        $waktu = $this->request->getPost('waktu');

        // Validation input
        if (
            !$this->validate([
                'asisten_pembantu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Asisten Pembantu harus diisi'
                    ]
                ],
                'detail_kegiatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Detail Kegiatan harus diisi'
                    ]
                ],
            ])
        ) {
            // $errorMessage variable
            $errorMessage = [
                'asisten_pembantu' => $this->validation->getError('asisten_pembantu'),
                'detail_kegiatan' => $this->validation->getError('detail_kegiatan'),
                'error' => 'Data gagal diupdate.'
            ];
            // Set flashdata untuk error
            session()->setFlashdata($errorMessage);
            // Jika validasi gagal, kembali ke halaman input kegiatan
            return redirect()->to('/input-data/kegiatan')->withInput();
        }

        // Jika validasi berhasil, simpan data ke database
        $this->kegiatanModel->save([
            'id_kegiatan' => $this->request->getPost('id_kegiatan'),
            // Get id_kegiatan from post
            'id_asisten' => $id_asisten,
            'asisten_pembantu' => $asisten_pembantu,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'ruang_lab' => $ruang_lab,
            'detail_kegiatan' => $detail_kegiatan,
        ]);

        // Set session flashdata
        session()->setFlashdata('success', 'Data berhasil diupdate.');

        // Redirect to /input-data/kegiatan
        return redirect()->to('/input-data/kegiatan');
    }

    // Method nilai
    public function nilai()
    {
        $data = [
            'title' => 'Input Kegiatan',
            // Get first_name from session
            'first_name' => session()->get('first_name'),
            // Get last_name from session
            'last_name' => session()->get('last_name'),
            // Get jabatan from session
            'jabatan' => session()->get('jabatan'),
            // Get level from session
            'level' => session()->get('level'),
            // Get smk from model
            'nilai' => $this->nilaiModel->getAllNilai(),
        ];

        // return view to general/nilai/index with data
        return view('general/nilai/index', $data);
    }

}