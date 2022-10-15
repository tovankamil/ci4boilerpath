<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Admin_Berita;
use App\Models\Model_Admin_Kategori;
use App\Controllers\Utils;
use App\Libraries\AllFunction;

class Admin_berita extends Controller
{
	protected $helpers = ['form'];

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		$this->request = \Config\Services::request();


	}
	public function index()
	{
		$berita = new Model_Admin_Berita();
		$kategori = new Model_Admin_Kategori();
		$data['berita'] = $berita->allberita();
		$data['kategori'] = $kategori->kategori();
		echo view('admin/berita',$data);
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
		$isi = addslashes($this->request->getPost('isi'));
		$peliput = addslashes($this->request->getPost('peliput'));
		$tag = addslashes($this->request->getPost('tag'));
		$fokus = addslashes($this->request->getPost('fokus'));
		$peliput = addslashes($this->request->getPost('peliput'));
		$fileName = date("YmdHis").''.round(microtime(true) * 1000);
		$img = $this->request->getFile('userfile');

		if (!$img->hasMoved()) {
			//$filepath = WRITEPATH . 'uploads' . $img->store();
			$ext = $img->getClientExtension();
			$img	->move('uploads', $fileName.'.'.$ext);
;
			if($fokus==1)
			{
				$data = [
					'judul' => $judul,
					'fokus_berita'  => 'y',
					'tag'  => $tag,
					'isi'  => $isi,
					'tanggal'  => date("Y-m-d H:i:s"),
					'gambar' => $fileName . '.' . $ext,
					'judul_seo' => $Utils->slug($judul),
					'peliput' => $peliput
				];
			}
			if ($fokus == 2) {
				$data = [
					'judul' => $judul,
					'running_text'  => 'y',
					'tag'  => $tag,
					'isi'  => $isi,
					'tanggal'  => date("Y-m-d H:i:s"),
					'gambar' => $fileName . '.' . $ext,
					'judul_seo' => $Utils->slug($judul),
					'peliput' => $peliput
				];
			}
			#Input ke database

			$db      = \Config\Database::connect();
			$builder = $db->table('berita');
			$builder->insert($data);
			$messages = "Data berhasil dimasukkan";
			$AllFunction->flashmessagesdata('adminfaileduupdatedata',
				$messages
			);
			return redirect()->to("/adminberita");
		}
		$messages = "Data tidak dapat dimasukkan";
		$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
		return redirect()->to("/adminberita");


	}
	function update($id = null)
	{
		$berita = new Model_Admin_Berita();
		$kategori = new Model_Admin_Kategori();
		$data['kategori'] = $kategori->kategori();
		$data['beritabyid'] = $berita->beritaById($id);
		echo view('admin/beritaupdate', $data);

	}

	function updateberita()
	{
		$AllFunction = new AllFunction();
		$Utils = new Utils();
		$id = trim(addslashes($this->request->getPost('id')));
		$judul = trim(addslashes($this->request->getPost('judul')));
		$isi = addslashes($this->request->getPost('isi'));
		$tag = addslashes($this->request->getPost('tag'));
		$fokus = addslashes($this->request->getPost('fokus'));
		$peliput = addslashes($this->request->getPost('peliput'));
		$fileName = date("YmdHis") . '' . round(microtime(true) * 1000);
		$img = $this->request->getFile('userfile');

		$name = $img->getName();
		if ($name != '') {
			$ext = $img->getClientExtension();
			$img->move('uploads', $fileName . '.' . $ext);
			if ($fokus == 1) {
			$data =
				[
					'judul' => $judul,
					'isi'  => $isi,
					'fokus_berita'  => 'y',
					'tag'  => $tag,
					'tanggal'  => date("Y-m-d H:i:s"),
					'gambar' => $fileName . '.' . $ext,
					'judul_seo' => $Utils->slug($judul),
					'peliput' => $peliput
				];
			}
			if ($fokus == 2) {
				$data =
					[
						'judul' => $judul,
						'isi'  => $isi,
						'running_text'  => 'y',
					'tag'  => $tag,
						'tanggal'  => date("Y-m-d H:i:s"),
						'gambar' => $fileName . '.' . $ext,
						'judul_seo' => $Utils->slug($judul),
						'peliput' => $peliput
					];
				}
		} else {
			if ($fokus == 1) {
			$data =
				[
					'judul' => $judul,
					'isi'  => $isi,
					'fokus_berita'  => 'y',
					'tag'  => $tag,
					'tanggal'  => date("Y-m-d H:i:s"),
					'judul_seo' => $Utils->slug($judul),
					'peliput' => $peliput
				];
			}
			if ($fokus == 2) {
				$data = [
					'judul' => $judul,
					'isi'  => $isi,
					'running_text'  => 'y',
					'tag'  => $tag,
					'tanggal'  => date("Y-m-d H:i:s"),
					'judul_seo' => $Utils->slug($judul),
					'peliput' => $peliput
				];
			}
		}
		$db      = \Config\Database::connect();
		$builder = $db->table('berita');
		$AllFunction = new AllFunction();


		$builder->where('id_berita', $id);
		$builder->update($data);
		$messages = "Data Berhasil di update";
		$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
		return redirect()->to("/adminberita/update/$id");
		echo "$judul $isi $filename $img $peliput $img ";
	}


	function delete($id=null)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('berita');
		$AllFunction = new AllFunction();

		$data = [
			'status' => 1
		];

		$builder->where('id_berita', $id);
		$builder->update($data);
		$messages = "Data Berhasil dihapus";
		$AllFunction->flashmessagesdata('adminfaileduupdatedata', $messages);
		return redirect()->to("/adminpost");
	}




	public function updateData()
	{
		// utils
		$utils = new Utils();
		$datasession = $utils->getAdminSession();
		// utils
		$AllFunction = new AllFunction();
		$datasession = $utils->getAdminSession();
		$browser = $AllFunction->getBrowser($this->request);
		$os = $AllFunction->getOperatingSystem($this->request);

		if ($datasession &&  trim(addslashes($this->request->getPost('username'))) != '' ) {

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
				update tfn_anggota set
				password ='$passwordBaru' ,password_hash='$datapasswordbaru'
				where username = '" . trim(addslashes($this->request->getPost('username'))) . "'");
			}



			//Get Data
			$judul = trim(addslashes($this->request->getPost('judul')));
			$gambar = addslashes($this->request->getPost('gambar'));
			$isi = addslashes($this->request->getPost('isi'));
			$peliput = addslashes($this->request->getPost('peliput'));




			return redirect()->to("/adminberita");
		}
	}
}
