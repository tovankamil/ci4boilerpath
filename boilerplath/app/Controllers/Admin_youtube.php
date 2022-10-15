<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Admin_Youtube;
use App\Controllers\Utils;
use App\Libraries\AllFunction;

class Admin_youtube extends Controller
{
	protected $helpers = ['form'];

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		$this->request = \Config\Services::request();


	}
	public function index()
	{
		$youtube = new Model_Admin_Youtube();
		$data['youtubes'] = $youtube->allyoutube();
		echo view('admin/youtube',$data);
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
		$link = addslashes($this->request->getPost('link'));
		$link = str_replace("watch?v=", "embed/", $link);
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
				'link' => $link
			];
			$db      = \Config\Database::connect();
			$builder = $db->table('youtube');
			$builder->insert($data);
			$messages = "Data berhasil dimasukkan";
			$AllFunction->flashmessagesdata('adminsuccessuupdatedata',
				$messages
			);
			return redirect()->to("/adminyoutube");
		}
		$messages = "Data tidak dapat dimasukkan";
		$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
		return redirect()->to("/adminyoutube");


	}
	function update($id = null)
	{
		$youtube = new Model_Admin_Youtube();
		$data['youtubebyids'] = $youtube->youtubeById($id);
		$data['youtubes'] = $youtube->allyoutube();
		echo view('admin/youtubeupdate', $data);

	}

	function updateyoutube()
	{
		$AllFunction = new AllFunction();
		$Utils = new Utils();
		$db      = \Config\Database::connect();
		$builder = $db->table('youtube');
		$AllFunction = new AllFunction();

		$id = trim(addslashes($this->request->getPost('id')));
		$judul = trim(addslashes($this->request->getPost('judul')));
		$keterangan = addslashes($this->request->getPost('keterangan'));
		$link = addslashes($this->request->getPost('link'));
		$link = str_replace("watch?v=", "embed/", $link);
		$fileName = date("YmdHis") . '' . round(microtime(true) * 1000);
		$img = $this->request->getFile('userfile');
		$name = $img->getName();

		if($name!='')
		{
			$ext = $img->getClientExtension();
			$img->move('uploads', 'youtube' .$fileName . '.' . $ext);
			$data = [
				'judul' => $judul,
				'keterangan'  => $keterangan,
				'tanggal'  => date("Y-m-d H:i:s"),
				'gambar' => 'youtube'.$fileName . '.' . $ext,
				'slug' => $Utils->slug($judul),
				'link' => $link
			];
			$builder->where('id', $id);
			$builder->update($data);
			$messages = "Data Berhasil di update";
			$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
			return redirect()->to("/adminyoutube/update/$id");
		}

		else{
			$data = [
				'judul' => $judul,
				'keterangan'  => $keterangan,
				'tanggal'  => date("Y-m-d H:i:s"),
				'slug' => $Utils->slug($judul),
				'link' => $link
			];
			$builder->where('id', $id);
			$builder->update($data);
			$messages = "Data Berhasil di update";
			$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
			return redirect()->to("/adminyoutube/update/$id");
		}

	}


	function delete($id=null)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('youtube');
		$AllFunction = new AllFunction();

		$data = [
			'status' => 1
		];

		$builder->where('id', $id);
		$builder->update($data);
		$messages = "Data Berhasil dihapus";
		$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
		return redirect()->to("/adminyoutube");
	}



}
