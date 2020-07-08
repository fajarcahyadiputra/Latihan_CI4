<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_hadiah;


class Hadiah extends COntroller
{
	function __construct()
	{
		$this->hadiah = new M_hadiah(); //ubah ininya fir  kayak lu load model di ci3
	}
	public function index()
	{
		$data = [
			'title' => "Data Hadiah",
			'content' => "admin/data_hadiah",
			'hadiah' => $this->hadiah->getHadiah(),  //ke modal
		];

		echo view("admin/templet/wrapper", $data);  //ubah ininya fir untuk tampil viewnya
	}
	public function tambah_hadiah()
	{
		$pesan = [];

		if($_SERVER['REQUEST_METHOD'] === "POST"){

			$kode_hadiah = $this->request->getPost('kode_hadiah');  //ubah ininya fir untuk get data post
			$nama_hadiah = $this->request->getPost('nama_hadiah');  //ubah ininya fir untuk get data post
			$stok 		 = $this->request->getPost('stok');  //ubah ininya fir untuk get data post

			$data 		 = [
				'kode_hadiah' => $kode_hadiah,
				'nama_hadiah' => $nama_hadiah,
				'stok'		  => $stok,
				'tanggal_buat'=> date('Y-m-d'),
			];

			$tambah = $this->hadiah->tambahHadiah($data);  //ke modal

			if($tambah){
				$pesan['tambah'] = true;
			}else{
				$pesan['tambah'] = false;
			}

			echo json_encode($pesan);

		}else{
			echo json_encode($pesan['tambah'] = false);
		}
	}
	public function hapus_hadiah()
	{
		$pesan = [];
		$kode = $this->request->getPost('kode'); //ubah ininya fir untuk get data post
		$hapus = $this->hadiah->hapusHadiah(['kode_hadiah' => $kode]);
		if($hapus){
			$pesan['hapus'] = true;
		}else{
			$pesan['hapus'] = false;
		}

		echo json_encode($pesan);
	}
	public function tampil_data()
	{
		$kode =$this->request->getPost('kode'); //ubah ininya fir untuk get data post
		$where = ['kode_hadiah' => $kode];
		$data = $this->hadiah->getHadiah($where);  //ke modal
		echo json_encode($data);
	}
	public function edit_hadiah()
	{
		$pesan = [];

		if($_SERVER['REQUEST_METHOD'] === "POST"){

			$kode_hadiah = $this->request->getPost('kode_hadiah'); //ubah ininya fir untuk get data post
			$nama_hadiah = $this->request->getPost('nama_hadiah'); //ubah ininya fir untuk get data post
			$stok 		 = $this->request->getPost('stok'); //ubah ininya fir untuk get data post

			$where = ['kode_hadiah' => $this->request->getPost('kode_hadiah_lama')]; //ubah ininya fir untuk get data post

			$data 		 = [
				'kode_hadiah' => $kode_hadiah,
				'nama_hadiah' => $nama_hadiah,
				'stok'		  => $stok,
			];

			$edit = $this->hadiah->editHadiah($data, $where); //ke modal

			if($edit){
				$pesan['edit'] = true;
			}else{
				$pesan['edit'] = false;
			}

			echo json_encode($pesan);

		}else{
			echo json_encode($pesan['edit'] = false);
		}
	}

	//--------------------------------------------------------------------

}
