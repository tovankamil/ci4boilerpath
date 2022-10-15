<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Admin_Editprofile extends Model
{

    public function connectDatabase()
	{
		return $db  = \Config\Database::connect();

	}
    function caridatamitra($id)
    {
        $db = $this->connectDatabase();

        $query = $db->query("select *
         from tfn_admin_anggota where username='$id'
        order by id desc limit 1 ");
        //$db->close();
        return $query->getResultArray();
    }

}

