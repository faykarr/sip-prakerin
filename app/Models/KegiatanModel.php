<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table = 'tb_kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['id_asisten', 'asisten_pembantu', 'tanggal', 'waktu', 'ruang_lab', 'detail_kegiatan'];

    // Join table tb_kegiatan and tb_asisten
    public function getKegiatan()
    {
        return $this->db->table('tb_kegiatan')
            ->join('tb_asisten', 'tb_asisten.id_asisten = tb_kegiatan.id_asisten')
            ->get()->getResultArray();
    }

    // Get data kegiatan by id_asisten logged in
    public function getKegiatanById($id_asisten)
    {
        return $this->db->table('tb_kegiatan')
            ->join('tb_asisten', 'tb_asisten.id_asisten = tb_kegiatan.id_asisten')
            ->where('tb_kegiatan.id_asisten', $id_asisten)
            ->get()->getResultArray();
    }


}