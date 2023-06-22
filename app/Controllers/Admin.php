<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{

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
            'level' => session()->get('level')
        ];
        return view('admin/master-data/smk/index', $data);
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