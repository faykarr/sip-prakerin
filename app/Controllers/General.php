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
}