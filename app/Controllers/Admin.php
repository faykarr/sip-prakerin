<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function dashboard()
    {
        // go to view admin/dashboard.php
        $data = [
            'title' => 'Dashboard',
            // Get first_name from session
            'first_name' => session()->get('first_name'),
            // Get last_name from session
            'last_name' => session()->get('last_name'),
            // Get level from session
            'level' => session()->get('level')
        ];
        return view('admin/dashboard', $data);
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
