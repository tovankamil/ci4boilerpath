<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Admin_Berita extends Model
{

    public function connectDatabase()
	{
		return $db  = \Config\Database::connect();

	}
    function allberita()
    {
        $db = $this->connectDatabase();
        // data member
        $query = $db->query("select id_berita,judul_seo,judul,gambar,isi,tanggal,peliput
         from berita where status='0'  order by tanggal desc ");
        //$db->close();
        return $query->getResultArray();
    }
    function beritaById($id)
    {
        $db = $this->connectDatabase();
        // data member
        $query = $db->query("select id_berita,judul_seo,judul,gambar,isi,tanggal,peliput
         from berita where status='0' and id_berita ='$id'  order by tanggal desc limit 1 ");
        //$db->close();
        return $query->getResultArray();
    }

}

