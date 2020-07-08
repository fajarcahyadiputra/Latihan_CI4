<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_user;

class User extends Controller
{
	function __construct()
	{
		$this->user = new M_user();
	}
	public function index()
	{
		$data = [
			'title' => "Data User",
			'content' => "admin/data_user",
			'user' => $this->user->getUser(),
		];

		echo view("admin/templet/wrapper", $data);
	}
	public function tambah_user()
	{
		$pesan = [];
		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$kode_user   = $this->request->getPost('kode_user');
			$nama_user   = $this->request->getPost('nama_user');
			$email   	 = $this->request->getPost('email');

			$data 		 = [
				'kode_user'		=> $kode_user,
				'nama_user'		=> $nama_user,
				'email'			=> $email,
				'status_aktif'	=> 'aktif',
			];

			$tambah = $this->user->tambah_user($data);

			if($tambah){
				$pesan['tambah'] = true;
			}else{
				$pesan['tambah'] = false;
			}

			echo json_encode($pesan);
		}else{
			echo json_encode($pesan);
		}

	}
	public function hapus_user()
	{
		$pesan = [];
		$kode = $this->request->getPost('kode');
		$where = ['kode_user' => $kode];
		$hapus = $this->user->hapus_user($where);
		if($hapus){
			$pesan['hapus'] = true;
		}else{
			$pesan['hapus'] = false;
		}

		echo json_encode($pesan);
	}
	public function tampil_user()
	{
		$kode = $this->request->getPost('kode');
		$where = ['kode_user' => $kode];
		$data = $this->user->getUser($where);
		echo json_encode($data);
	}
	public function edit_user()
	{
		$pesan = [];
		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$kode_user   = $this->request->getPost('kode_user');
			$nama_user   = $this->request->getPost('nama_user');
			$email   	 = $this->request->getPost('email');
			$status_aktif= $this->request->getPost('status_aktif');

			$where 		 = ['kode_user' => $this->request->getPost('kode_user_lama')];

			$data 		 = [
				'kode_user'		=> $kode_user,
				'nama_user'		=> $nama_user,
				'email'			=> $email,
				'status_aktif'	=> $status_aktif,
			];

			$edit = $this->user->edit_user($data, $where);

			if($edit){
				$pesan['edit'] = true;
			}else{
				$pesan['edit'] = false;
			}

			echo json_encode($pesan);
		}else{
			echo json_encode($pesan);
		}
	}
}