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

    // Get data kegiatan by date range
    public function getKegiatanByDateRange($date_range = null)
    {
        // Query untuk mencari data kegiatan berdasarkan date range
        $query = $this->db->table('tb_kegiatan')
            ->join('tb_asisten', 'tb_asisten.id_asisten = tb_kegiatan.id_asisten');

        // Filter data berdasarkan periode tanggal jika tanggal tidak kosong
        if ($date_range) {
            list($start_date, $end_date) = explode(' to ', $date_range);
            $formattedStartDate = date('Y-m-d', strtotime($start_date));
            $formattedEndDate = date('Y-m-d', strtotime($end_date));

            $query->where('tb_kegiatan.tanggal >=', $formattedStartDate)
                ->where('tb_kegiatan.tanggal <=', $formattedEndDate);
        }

        // Eksekusi query
        $result = $query->get();

        // Kembalikan hasil query dalam bentuk array
        return $result->getResultArray();
    }
}