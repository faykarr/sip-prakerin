<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AsistenModel;
use App\Models\PrakerinModel;
use App\Models\SMKModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $smkModel = new SMKModel();
        $prakerinModel = new PrakerinModel();
        $asistenModel = new AsistenModel();

        // go to view admin/dashboard.php
        $data = [
            'title' => 'Dashboard',
            // Get first_name from session
            'first_name' => session()->get('first_name'),
            // Get last_name from session
            'last_name' => session()->get('last_name'),
            // Get level from session
            'level' => session()->get('level'),
            // Get count smk data
            'count_smk' => $smkModel->getCountSMK(),
            // Get count siswa prakerin
            'count_prakerin' => $prakerinModel->countAll(),
            // Get count siswa prakerin aktif
            'count_prakerin_aktif' => $prakerinModel->where('status_prakerin', 'Aktif')->countAllResults(),
            // Get count asisten
            'count_asisten' => $asistenModel->countAll(),
        ];
        return view('dashboard', $data);
    }
}