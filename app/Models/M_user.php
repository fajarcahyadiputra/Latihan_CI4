<?php

namespace App\Models;
use CodeIgniter\Model;

class M_user extends Model
{
	protected $table = "tb_user";

	public function getUser($where = null)
	{
		if($where === null){
			return $this->findAll();
		}else{
			return $this->getWhere($where)->getRow();
		}
	}
	public function tambah_user($data)
	{
		return $this->db->table($this->table)->insert($data);
	}
	public function hapus_user($where)
	{
		return $this->db->table($this->table)->delete($where);
	}
	public function edit_user($data, $where)
	{
		return $this->db->table($this->table)->update($data, $where);
	}
}