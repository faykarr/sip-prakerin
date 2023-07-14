<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class General extends BaseController
{
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