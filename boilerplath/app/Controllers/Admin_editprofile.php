<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Admin_Editprofile;
use App\Controllers\Utils;
use App\Libraries\AllFunction;

class Admin_editprofile extends Controller
{

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		$this->request = \Config\Services::request();
	}
	public function index()
	{
		helper(['form']);
		$model = new Model_Admin_Editprofile();
		$utils = new Utils();
		$username =  strtoupper(trim($utils->anti_injection(addslashes($this->request->getGet('username')))));
		$data['caridatamitra'] = $model->caridatamitra($username);

		echo view('admin/editprofilemitra', $data);
	}


	public function updateData()
	{
		// utils
		$utils = new Utils();
		$datasession = $utils->getAdminSession();
		// utils
		$AllFunction = new AllFunction();
		$datasession = $utils->getAdminSession();
		echo $datasession ;
		if ($datasession &&  trim(addslashes($datasession)) != '' ) {

			//connect to database
			$db = $AllFunction->connectDatabase();
			//connect to database

			if ( $this->request->getPost('password') != '') {
				$passwordBaru = $this->request->getPost('password');
				$options = [
					'cost' => 10,
				];
				$datapasswordbaru = password_hash($passwordBaru, PASSWORD_DEFAULT, $options);

				$db->simpleQuery("
				update tfn_admin_anggota set
				password ='$datapasswordbaru' ,password_hash='$passwordBaru'
				where username = '" . trim(addslashes($datasession)) . "'");
				$messages = "Data $datasession Berhasil Di Update";

				$AllFunction->flashmessagesdata('adminsuccessuupdatedata', $messages);
				$utils->setSession($data['notifikasidata']);

				return redirect()->to("/editprofile");
			}



				$messages = "Data $datasession gagal Di Update";

				$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
				$utils->setSession($data['notifikasidata']);

			return redirect()->to("/editprofile");
		}
	}
}
