<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function dashboard()
    {
        // go to view admin/dashboard.php
        $data = [
            'title' => 'Dashboard'
        ];
        return view('admin/dashboard', $data);
    }
}