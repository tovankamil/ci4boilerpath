<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Admin_Kategori extends Model
{

    public function connectDatabase()
	{
		return $db  = \Config\Database::connect();

	}
    function kategori()
    {
        $db = $this->connectDatabase();

        $query = $db->query("select * from kategori order by id asc  ");
        //$db->close();
        return $query->getResultArray();
    }
   }

