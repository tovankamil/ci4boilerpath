<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Admin_Images;
use App\Controllers\Utils;
use App\Libraries\AllFunction;

class Admin_images extends Controller
{
	protected $helpers = ['form'];

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		$this->request = \Config\Services::request();


	}
	public function index()
	{
		$images = new Model_Admin_Images();
		$data['images'] = $images->allimages();
		echo view('admin/images',$data);
	}

	function input()
	{
		$AllFunction = new AllFunction();
		$Utils = new Utils();
		$validationRule = [
			'userfile' => [
				'label' => 'Image File',
				'rules' => 'uploaded[userfile]'
				. '|is_image[userfile]'
				. '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'

			],
		];

		if (!$this->validate($validationRule)) {
			$data = ['errors' => $this->validator->getErrors()];
			$messages ="Data tidak dapat dimasukkan";
			$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
		}
		//Get Data
		$judul = trim(addslashes($this->request->getPost('judul')));
		$keterangan = addslashes($this->request->getPost('keterangan'));
		$fotografer = addslashes($this->request->getPost('fotografer'));
		$fileName = date("YmdHis").''.round(microtime(true) * 1000);
		$img = $this->request->getFile('userfile');

		if (!$img->hasMoved()) {
			//$filepath = WRITEPATH . 'uploads' . $img->store();
			$ext = $img->getClientExtension();
			$img	->move('uploads', $fileName.'.'.$ext);
;

			#Input ke database
			$data = [
				'judul' => $judul,
				'keterangan'  => $keterangan,
				'tanggal'  => date("Y-m-d H:i:s"),
				'gambar' =>$fileName.'.'.$ext,
				'slug' => $Utils->slug($judul),
				'fotografer' => $fotografer
			];
			$db      = \Config\Database::connect();
			$builder = $db->table('images');
			$builder->insert($data);
			$messages = "Data berhasil dimasukkan";
			$AllFunction->flashmessagesdata('adminsuccessuupdatedata',
				$messages
			);
			return redirect()->to("/adminimages");
		}
		$messages = "Data tidak dapat dimasukkan";
		$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
		return redirect()->to("/adminimages");


	}
	function update($id = null)
	{
		$images = new Model_Admin_Images();
		$data['imagesbyid'] = $images->imagesById($id);
		$data['images'] = $images->allimages();
		echo view('admin/imagesupdate', $data);

	}

	function updateimages()
	{
		$AllFunction = new AllFunction();
		$Utils = new Utils();
		$db      = \Config\Database::connect();
		$builder = $db->table('images');
		$AllFunction = new AllFunction();

		$id = trim(addslashes($this->request->getPost('id')));
		$judul = trim(addslashes($this->request->getPost('judul')));
		$keterangan = addslashes($this->request->getPost('keterangan'));
		$fotografer = addslashes($this->request->getPost('fotografer'));
		$fileName = date("YmdHis") . '' . round(microtime(true) * 1000);
		$img = $this->request->getFile('userfile');
		$name = $img->getName();

		if($name!='')
		{
			$ext = $img->getClientExtension();
			$img->move('uploads', $fileName . '.' . $ext);
			$data = [
				'judul' => $judul,
				'keterangan'  => $keterangan,
				'tanggal'  => date("Y-m-d H:i:s"),
				'gambar' => $fileName . '.' . $ext,
				'slug' => $Utils->slug($judul),
				'fotografer' => $fotografer
			];
			$builder->where('id', $id);
			$builder->update($data);
			$messages = "Data Berhasil di update";
			$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
			return redirect()->to("/adminimages/update/$id");
		}

		else{
			$data = [
				'judul' => $judul,
				'keterangan'  => $keterangan,
				'tanggal'  => date("Y-m-d H:i:s"),
				'slug' => $Utils->slug($judul),
				'fotografer' => $fotografer
			];
			$builder->where('id', $id);
			$builder->update($data);
			$messages = "Data Berhasil di update";
			$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
			return redirect()->to("/adminimages/update/$id");
		}

	}


	function delete($id=null)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('images');
		$AllFunction = new AllFunction();

		$data = [
			'status' => 1
		];

		$builder->where('id', $id);
		$builder->update($data);
		$messages = "Data Berhasil dihapus";
		$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
		return redirect()->to("/adminimages");
	}



}
