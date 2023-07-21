<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AsistenModel;
use App\Models\PrakerinModel;
use App\Models\SMKModel;

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
            'level' => session()->get('level'),
            // Get jabatan from session
            'jabatan' => session()->get('jabatan'),
            // Get smk from model
            'smk' => $this->smkModel->getCountSiswaPrakerin()
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
                'status_aktif' => 'Tidak Aktif'
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
        $status_aktif = $this->request->getPost('status_aktif');
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
                'status_aktif' => $status_aktif
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
            // Get jabatan from session
            'jabatan' => session()->get('jabatan'),
            // Get level from session
            'level' => session()->get('level'),
            // Get SMK data from database
            'sekolah' => $this->smkModel->where('status_aktif', 'Aktif')->findAll(),
            // Get data from database
            'prakerin' => $this->prakerinModel->getPrakerinJoin(),
        ];
        return view('admin/master-data/prakerin/index', $data);
    }

    // Method tambah siswa prakerin with validation
    public function addPrakerin()
    {
        // Get input from form
        $nisn = $this->request->getPost('nisn');
        $nama = $this->request->getPost('nama_siswa');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $tanggal_lahir = date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir')));
        $no_hp_siswa = $this->request->getPost('no_hp_siswa');
        $asal_sekolah = $this->request->getPost('asal_sekolah');
        $kelas = $this->request->getPost('kelas');
        $jurusan = $this->request->getPost('jurusan');
        $tanggal_mulai = date('Y-m-d', strtotime($this->request->getPost('tanggal_mulai')));
        $tanggal_pencabutan = date('Y-m-d', strtotime($this->request->getPost('tanggal_pencabutan')));
        $tahun_ajaran = $this->request->getPost('tahun_ajaran');
        $nama_orang_tua = $this->request->getPost('nama_orang_tua');
        $no_hp_orang_tua = $this->request->getPost('no_hp_orang_tua');
        $alamat = $this->request->getPost('alamat');
        // Validation Service
        $validation = \Config\Services::validation();

        // Validation rules
        $valid = $this->validate([
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required|numeric|is_unique[tb_prakerin.nisn]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tanggal_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'no_hp_siswa' => [
                'label' => 'No. HP Siswa',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka'
                ]
            ],
            'asal_sekolah' => [
                'label' => 'Asal Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jurusan' => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tanggal_mulai' => [
                'label' => 'Tanggal Mulai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tanggal_pencabutan' => [
                'label' => 'Tanggal Pencabutan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tahun_ajaran' => [
                'label' => 'Tahun Ajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'nama_orang_tua' => [
                'label' => 'Nama Orang Tua',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'no_hp_orang_tua' => [
                'label' => 'No. HP Orang Tua',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        // If validation is false then go back to add prakerin page
        if (!$valid) {
            $errorMessage = [
                'nisn' => $validation->getError('nisn'),
                'nama_siswa' => $validation->getError('nama_siswa'),
                'jenis_kelamin' => $validation->getError('jenis_kelamin'),
                'tempat_lahir' => $validation->getError('tempat_lahir'),
                'tanggal_lahir' => $validation->getError('tanggal_lahir'),
                'no_hp_siswa' => $validation->getError('no_hp_siswa'),
                'asal_sekolah' => $validation->getError('asal_sekolah'),
                'kelas' => $validation->getError('kelas'),
                'jurusan' => $validation->getError('jurusan'),
                'tanggal_mulai' => $validation->getError('tanggal_mulai'),
                'tanggal_pencabutan' => $validation->getError('tanggal_pencabutan'),
                'tahun_ajaran' => $validation->getError('tahun_ajaran'),
                'nama_orang_tua' => $validation->getError('nama_orang_tua'),
                'no_hp_orang_tua' => $validation->getError('no_hp_orang_tua'),
                'alamat' => $validation->getError('alamat'),
                'error' => 'Data gagal ditambahkan'
            ];
            session()->setFlashdata($errorMessage);
            return redirect()->to('/master-data/prakerin/')->withInput();
        } else {
            // If validation is true then save data to database
            $data = [
                'nisn' => $nisn,
                'nama_siswa' => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'no_hp_siswa' => $no_hp_siswa,
                'npsn' => $asal_sekolah,
                'kelas' => $kelas,
                'jurusan' => $jurusan,
                'periode_awal' => $tanggal_mulai,
                'periode_akhir' => $tanggal_pencabutan,
                'tahun_ajaran' => $tahun_ajaran,
                'nama_orang_tua' => $nama_orang_tua,
                'no_hp_orang_tua' => $no_hp_orang_tua,
                'alamat_siswa' => $alamat
            ];
            $this->prakerinModel->insert($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/master-data/prakerin');
        }

    }

    // Method update prakerin
    public function updatePrakerin()
    {
        // Get input from form
        $id_prakerin = $this->request->getPost('id_prakerin');
        $nisn = $this->request->getPost('nisn');
        $nama = $this->request->getPost('nama_siswa');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $tanggal_lahir = date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir')));
        $no_hp_siswa = $this->request->getPost('no_hp_siswa');
        $asal_sekolah = $this->request->getPost('asal_sekolah');
        $kelas = $this->request->getPost('kelas');
        $jurusan = $this->request->getPost('jurusan');
        $tanggal_mulai = date('Y-m-d', strtotime($this->request->getPost('tanggal_mulai')));
        $tanggal_pencabutan = date('Y-m-d', strtotime($this->request->getPost('tanggal_pencabutan')));
        $tahun_ajaran = $this->request->getPost('tahun_ajaran');
        $nama_orang_tua = $this->request->getPost('nama_orang_tua');
        $no_hp_orang_tua = $this->request->getPost('no_hp_orang_tua');
        $alamat = $this->request->getPost('alamat');
        $status_prakerin = $this->request->getPost('status_prakerin');
        // Validation Service
        $validation = \Config\Services::validation();

        // Validation rules
        $valid = $this->validate([
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka'
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tanggal_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'no_hp_siswa' => [
                'label' => 'No. HP Siswa',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka'
                ]
            ],
            'asal_sekolah' => [
                'label' => 'Asal Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jurusan' => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tanggal_mulai' => [
                'label' => 'Tanggal Mulai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tanggal_pencabutan' => [
                'label' => 'Tanggal Pencabutan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tahun_ajaran' => [
                'label' => 'Tahun Ajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'nama_orang_tua' => [
                'label' => 'Nama Orang Tua',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'no_hp_orang_tua' => [
                'label' => 'No. HP Orang Tua',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        // If validation is false then go back to add prakerin page
        if (!$valid) {
            $errorMessage = [
                'nisn' => $validation->getError('nisn'),
                'nama_siswa' => $validation->getError('nama_siswa'),
                'jenis_kelamin' => $validation->getError('jenis_kelamin'),
                'tempat_lahir' => $validation->getError('tempat_lahir'),
                'tanggal_lahir' => $validation->getError('tanggal_lahir'),
                'no_hp_siswa' => $validation->getError('no_hp_siswa'),
                'asal_sekolah' => $validation->getError('asal_sekolah'),
                'kelas' => $validation->getError('kelas'),
                'jurusan' => $validation->getError('jurusan'),
                'tanggal_mulai' => $validation->getError('tanggal_mulai'),
                'tanggal_pencabutan' => $validation->getError('tanggal_pencabutan'),
                'tahun_ajaran' => $validation->getError('tahun_ajaran'),
                'nama_orang_tua' => $validation->getError('nama_orang_tua'),
                'no_hp_orang_tua' => $validation->getError('no_hp_orang_tua'),
                'alamat' => $validation->getError('alamat'),
                'error' => 'Data gagal diupdate'
            ];
            session()->setFlashdata($errorMessage);
            return redirect()->to('/master-data/prakerin/')->withInput();
        } else {
            // If validation is true then save data to database
            $data = [
                'id_prakerin' => $id_prakerin,
                'nisn' => $nisn,
                'nama_siswa' => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'no_hp_siswa' => $no_hp_siswa,
                'npsn' => $asal_sekolah,
                'kelas' => $kelas,
                'jurusan' => $jurusan,
                'periode_awal' => $tanggal_mulai,
                'periode_akhir' => $tanggal_pencabutan,
                'tahun_ajaran' => $tahun_ajaran,
                'nama_orang_tua' => $nama_orang_tua,
                'no_hp_orang_tua' => $no_hp_orang_tua,
                'alamat_siswa' => $alamat,
                'status_prakerin' => $status_prakerin
            ];
            $this->prakerinModel->save($data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to('/master-data/prakerin');
        }

    }

    // Method delete prakerin
    public function deletePrakerin($id)
    {
        $this->prakerinModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/master-data/prakerin');
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
            // Get jabaatan from session
            'jabatan' => session()->get('jabatan'),
            // Get level from session
            'level' => session()->get('level'),
            // Get all data from table asisten order by jabatan ASC
            'asisten' => $this->asistenModel->orderBy('jabatan', 'ASC')->findAll()
        ];
        return view('admin/master-data/asisten/index', $data);
    }
}