<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Admin_Images extends Model
{

    public function connectDatabase()
	{
		return $db  = \Config\Database::connect();

	}
    function allimages()
    {
        $db = $this->connectDatabase();
        $query = $db->query("select id,slug,judul,gambar,keterangan,tanggal,fotografer
         from images where status='0'  order by tanggal desc ");
        //$db->close();
        return $query->getResultArray();
    }
    function imagesById($id)
    {
        $db = $this->connectDatabase();
        $query = $db->query("select id,slug,judul,gambar,keterangan,tanggal,fotografer
         from images where status='0' and id ='$id'  order by tanggal desc limit 1 ");
        //$db->close();
        return $query->getResultArray();
    }

}

