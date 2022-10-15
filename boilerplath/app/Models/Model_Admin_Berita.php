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

        $query = $db->query("select id_berita,judul_seo,judul,gambar,isi,tanggal,peliput,dibaca,fokus_berita,running_text
         from berita where status='0'  order by tanggal desc limit 500 ");
        //$db->close();
        return $query->getResultArray();
    }
    function beritaById($id)
    {
        $db = $this->connectDatabase();

        $query = $db->query("select id_berita,id_kategori,judul_seo,judul,gambar,isi,tanggal,peliput,dibaca,fokus_berita,running_text,tag
         from berita where status='0' and id_berita ='$id'  order by tanggal desc limit 1 ");
        //$db->close();
        return $query->getResultArray();
    }

}

