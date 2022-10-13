<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'password'];

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
        // data member
        $query = $db->query("select * from tfn_core_web_name");
        //$db->close();
        return $query->getResultArray();
    }

    function getPasswordLogin($id)
    {

        $db = $this->connectDatabase();
        // data password
        $query = $db->query("select password from users where username='$id'");

        //$db->close();
        return $query->getResultArray();
    }

    function KartuId()
    {
        $db = $this->connectDatabase();
        // data password
        $query = $db->query("select password from users where username='$id'");

        //$db->close();
        return $query->getResultArray();
    }
}
