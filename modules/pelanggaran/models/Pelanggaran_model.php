<?php

class Pelanggaran_model extends CI_Model
{
	
	function get_data($param = array())
	{
		if(!empty($param))
		{
			if(!empty($param['limit']))
			{
				if(!empty($param['offset']))
				{
					$this->db->limit($param['limit'], $param['offset']);
				}
				else
				{
					$this->db->limit($param['limit']);
				}
			}
			if(!empty($param['id_pelanggaran']))
			{
				$this->db->where('a.id_pelanggaran', $param['id_pelanggaran']);
			}			

			if(!empty($param['keyword']))
			{
				$this->db->like('nama', $param['keyword']);
			}
		}
		$this->db->from('tbl_pelanggaransiswa a');
		$this->db->join('tbl_subkategori b', 'a.subkategori = b.id_subkategori');
		$this->db->join('user_siswa c', 'a.nis = c.nis');
		$this->db->join('user d', 'c.user_id = d.user_id');
		$get = $this->db->get();
		return $get;
	}

	function get_data_row($id)
	{
		$this->db->where('id_pelanggaran', $id);
		$this->db->from('tbl_pelanggaransiswa');
		$query = $this->db->get();
		return $query->row();
	}

	function insert($data)
	{
		$this->db->insert('tbl_pelanggaransiswa', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function update($data, $id)
	{
		$this->db->where('id_subkategori', $id);
		$this->db->update('tbl_pelanggaransiswa', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function delete($id)
	{
		$this->db->where('id_pelanggaran', $id);
		$this->db->delete('tbl_pelanggaransiswa');
		return true;
	}
	
	function search($new_keyword)
	{
		$this->db->like('a.nama', $new_keyword);
		$this->db->select('
			a.*, 
			b.*, 
			c.nama as nama_sekolah,
			d.nama as nama_kelas,
			d.jenjang,
			e.nama as nama_jurusan,
		');
		$this->db->from('user a');
		$this->db->join('user_siswa b', 'a.user_id = b.user_id');
		$this->db->join('profil_sekolah c', 'c.sekolah_id = b.sekolah_id');
		$this->db->join('master_kelas d', 'd.kelas_id = b.kelas_id');
		$this->db->join('master_jurusan e', 'e.jurusan_id = d.jurusan_id');
		$get = $this->db->get();
		return $get;
	}
	
	function get_opt($addon = '', $id = '')
	{
		

		$result = array();
		if(!empty($addon))
		{
			$result['']	= $addon;
		}
		if(!empty($id))
		{
			$this->db->where('a.sekolah_id', $id);
		}
		$this->db->from('user_guru a');
		$this->db->join('user b', 'a.user_id = b.user_id');
		$query = $this->db->get();
		foreach($query->result() as $key => $c)
		{
			$result[$c->guru_id] = $c->nama;
		}
		return $result;
	}	

	
}
