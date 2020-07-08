<?php

namespace App\Models;
use CodeIgniter\Model;

class M_hadiah extends Model
{
	protected $table = "tb_hadiah";

	public function getHadiah($where = null)
	{
		if($where === null){
			return $this->findAll();  //ini ubah seperti tampil data di ce 3 pake get(namatable)->result()
		}else{
			return $this->getWhere($where)->getRow(); //ini ubah seperti tampil data di ce 3 pake get_where(namatable, where)->row()
		}
	}
	public function tambahHadiah($data)
	{
		return $this->db->table($this->table)->insert($data); //ubah  kayak tambah data di ci3
	}
	public function hapusHadiah($where)
	{
		return $this->db->table($this->table)->delete($where); //ubah  kayak delete data di ci3
	}
	public function editHadiah($data, $where)
	{
		return $this->db->table($this->table)->update($data, $where); //ubah  kayak edit data di ci3
	}
}
