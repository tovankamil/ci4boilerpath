<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Admin_Berita;
use App\Models\Model_Admin_Kategori;
use App\Controllers\Utils;
use App\Libraries\AllFunction;

class Admin_post extends Controller
{

	public function index()
	{
		$berita = new Model_Admin_Berita();
		$data['berita'] = $berita->allberita();
		 echo view('admin/post',$data);
	}
}
