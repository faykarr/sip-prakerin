<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class General extends BaseController
{
    // Method untuk menampilkan halaman input kegiatan harian prakerin
    public function kegiatan()
    {
        $data = [
            'title' => 'Input Kegiatan',
            // Get first_name from session
            'first_name' => session()->get('first_name'),
            // Get last_name from session
            'last_name' => session()->get('last_name'),
            // Get level from session
            'level' => session()->get('level'),
            // Get smk from model
            'asisten' => $this->asistenModel->where('status', 'Aktif')->findAll(),
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
        // Get tanggal from input
        $tanggal = $this->request->getPost('tanggal');
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
            // Set flashdata untuk error
            session()->setFlashdata('error', 'Data gagal ditambahkan.');
            // Jika validasi gagal, kembali ke halaman input kegiatan
            return redirect()->to('/input-data/kegiatan')->withInput();
        }

        // Jika validasi berhasil, simpan data ke database
        $this->kegiatanModel->save([
            'id_asisten' => $id_asisten,
            'asisten_pembantu' => $asisten_pembantu,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'ruang_lab' => $ruang_lab,
            'detail_kegiatan' => $detail_kegiatan,
        ]);

        // Set session flashdata
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        // Redirect to /input-data/kegiatan
        return redirect()->to('/input-data/kegiatan');
    }
}