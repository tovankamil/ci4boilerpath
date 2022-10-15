<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'password_hash'];

    function getDataUser($id)
    {

    }


    public function connectDatabase()
	{
		return $db  = \Config\Database::connect();

	}

    function getDataOffice()
    {
        $db = $this->connectDatabase();

        $query = $db->query("select * from tfn_core_web_name");
        return $query->getResultArray();
    }

    function getPasswordLogin($id)
    {

        $db = $this->connectDatabase();
        // data password
        $query = $db->query("select password_hash from users where username='$id'");

        return $query->getResultArray();
    }

    function update_login_at($id)
    {

        $db = $this->connectDatabase();
        // data password
        $query = $db->query("update users set log_in='2022-10-14 22:51:58' where username='$id'");

        return $query->getResultArray();
    }

}
