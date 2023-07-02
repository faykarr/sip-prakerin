<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SMKModel;

class Admin extends BaseController
{
    // Method construct
    public function __construct()
    {
        // Model smk
        $this->smkModel = new SMKModel();
    }

    // Method daftar smk
    public function listSmk()
    {
        // go to view admin/master-data/smk/index.php
        $data = [
            'title' => 'Daftar SMK',
            // Get first_name from session
            'first_name' => session()->get('first_name'),
            // Get last_name from session
            'last_name' => session()->get('last_name'),
            // Get level from session
            'level' => session()->get('level'),
            // Get smk from model
            'smk' => $this->smkModel->findAll()
        ];
        return view('admin/master-data/smk/index', $data);
    }

    // Method add smk with required validation
    public function addSMK()
    {
        // Get input from form
        $npsn = $this->request->getPost('npsn');
        $nama = $this->request->getPost('nama_sekolah');
        $status_sekolah = $this->request->getPost('status_sekolah');
        $pembimbing = $this->request->getPost('pembimbing_prakerin');
        $no_hp = $this->request->getPost('no_hp_pembimbing');
        $jurusan = $this->request->getPost('jurusan_terdaftar');
        $alamat = $this->request->getPost('alamat_sekolah');
        $validation = \Config\Services::validation();

        // Validation rules
        $valid = $this->validate([
            'npsn' => [
                'label' => 'NPSN',
                'rules' => 'required|is_unique[tb_smk.npsn]|regex_match[/^[0-9]{8}$/]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar',
                    'regex_match' => '{field} harus berupa angka dan berjumlah 8 karakter'
                ]
            ],
            'nama_sekolah' => [
                'label' => 'Nama Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'status_sekolah' => [
                'label' => 'Status Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'pembimbing_prakerin' => [
                'label' => 'Pembimbing Prakerin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'no_hp_pembimbing' => [
                'label' => 'No. HP Pembimbing',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka'
                ]
            ],
            'jurusan_terdaftar' => [
                'label' => 'Jurusan Terdaftar',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'alamat_sekolah' => [
                'label' => 'Alamat Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);


        // If validation success
        if ($valid) {
            // Save data to database
            $this->smkModel->insert([
                'npsn' => $npsn,
                'nama_sekolah' => $nama,
                'status_sekolah' => $status_sekolah,
                'pembimbing_prakerin' => $pembimbing,
                'no_hp_pembimbing' => $no_hp,
                'jurusan_terdaftar' => $jurusan,
                'alamat_sekolah' => $alamat,
                'status_aktif' => 'Aktif'
            ]);

            // Set flashdata success
            session()->setFlashdata('success', 'Data berhasil ditambahkan');

            // Redirect to list smk
            return redirect()->to('/master-data/smk');
        } else {
            $errorMessages = [
                'npsn' => $validation->getError('npsn'),
                'nama_sekolah' => $validation->getError('nama_sekolah'),
                'status_sekolah' => $validation->getError('status_sekolah'),
                'pembimbing_prakerin' => $validation->getError('pembimbing_prakerin'),
                'no_hp_pembimbing' => $validation->getError('no_hp_pembimbing'),
                'jurusan_terdaftar' => $validation->getError('jurusan_terdaftar'),
                'alamat_sekolah' => $validation->getError('alamat_sekolah'),
                'error' => 'Data gagal ditambahkan'
            ];
            // Set flashdata error
            session()->setFlashdata($errorMessages);

            // Back to previous page
            return redirect()->to('/master-data/smk')->withInput();
        }
    }

    // Method store update smk to database
    public function updateSMK()
    {
        // Get input from form
        $npsn = $this->request->getPost('npsn');
        $nama = $this->request->getPost('nama_sekolah');
        $status_sekolah = $this->request->getPost('status_sekolah');
        $pembimbing = $this->request->getPost('pembimbing_prakerin');
        $no_hp = $this->request->getPost('no_hp_pembimbing');
        $jurusan = $this->request->getPost('jurusan_terdaftar');
        $alamat = $this->request->getPost('alamat_sekolah');
        $validation = \Config\Services::validation();

        // Validation rules
        $valid = $this->validate([
            'npsn' => [
                'label' => 'NPSN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'nama_sekolah' => [
                'label' => 'Nama Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'status_sekolah' => [
                'label' => 'Status Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'pembimbing_prakerin' => [
                'label' => 'Pembimbing Prakerin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'no_hp_pembimbing' => [
                'label' => 'No. HP Pembimbing',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka'
                ]
            ],
            'jurusan_terdaftar' => [
                'label' => 'Jurusan Terdaftar',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'alamat_sekolah' => [
                'label' => 'Alamat Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);


        // If validation success
        if ($valid) {
            // Save data to database
            $this->smkModel->save([
                'npsn' => $npsn,
                'nama_sekolah' => $nama,
                'status_sekolah' => $status_sekolah,
                'pembimbing_prakerin' => $pembimbing,
                'no_hp_pembimbing' => $no_hp,
                'jurusan_terdaftar' => $jurusan,
                'alamat_sekolah' => $alamat,
                'status_aktif' => 'Aktif'
            ]);

            // Set flashdata success
            session()->setFlashdata('success', 'Data berhasil diupdate');

            // Redirect to list smk
            return redirect()->to('/master-data/smk');
        } else {
            $errorMessages = [
                'npsn' => $validation->getError('npsn'),
                'nama_sekolah' => $validation->getError('nama_sekolah'),
                'status_sekolah' => $validation->getError('status_sekolah'),
                'pembimbing_prakerin' => $validation->getError('pembimbing_prakerin'),
                'no_hp_pembimbing' => $validation->getError('no_hp_pembimbing'),
                'jurusan_terdaftar' => $validation->getError('jurusan_terdaftar'),
                'alamat_sekolah' => $validation->getError('alamat_sekolah'),
                'error' => 'Data gagal diupdate'
            ];
            // Set flashdata error
            session()->setFlashdata($errorMessages);

            // Back to previous page
            return redirect()->to('/master-data/smk')->withInput();
        }
    }




    // Method delete smk
    public function deleteSMK($id)
    {
        // Delete data from database
        $this->smkModel->delete($id);

        // Set flashdata success
        session()->setFlashdata('success', 'Data successfully deleted.');

        // Redirect to list smk
        return redirect()->to('/master-data/smk');
    }


    // Method daftar anak prakerin
    public function listPrakerin()
    {
        // go to view admin/master-data/anak-prakerin/index.php
        $data = [
            'title' => 'Daftar Anak Prakerin',
            // Get first_name from session
            'first_name' => session()->get('first_name'),
            // Get last_name from session
            'last_name' => session()->get('last_name'),
            // Get level from session
            'level' => session()->get('level')
        ];
        return view('admin/master-data/prakerin/index', $data);
    }

    // Method daftar asisten
    public function listAsisten()
    {
        // go to view admin/master-data/asisten/index.php
        $data = [
            'title' => 'Daftar Asisten',
            // Get first_name from session
            'first_name' => session()->get('first_name'),
            // Get last_name from session
            'last_name' => session()->get('last_name'),
            // Get level from session
            'level' => session()->get('level')
        ];
        return view('admin/master-data/asisten/index', $data);
    }
}