<?php

class Subkategori_model extends CI_Model
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

			if(!empty($param['id_subkategori']))
			{
				$this->db->where('id_subkategori', $param['id_subkategori']);
			}			

			if(!empty($param['keyword']))
			{
				$this->db->like('deskripsi_pelanggaran', $param['keyword']);
			}

		}
		$this->db->order_by('id_subkategori','ASC');
		$this->db->from('tbl_subkategori');
		$this->db->join('tbl_kategori', 'tbl_subkategori.id_kategori = tbl_kategori.id_kategori');
		$get = $this->db->get();
		return $get;
	}

	function get_data_row($id)
	{
		$this->db->where('id_subkategori', $id);
		$this->db->from('tbl_subkategori');
		$query = $this->db->get();
		return $query->row();
	}

	function insert($data)
	{
		$this->db->insert('tbl_subkategori', $data);
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
		$this->db->update('tbl_subkategori', $data);
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
		$this->db->where('id_subkategori', $id);
		$this->db->delete('tbl_subkategori');
		return true;
	}

	function get_opt($addon = '', $param = array())
	{
		$result 		= array();

		$level_user 	= $this->session->userdata('login_level');
		$id_user 	 	= $this->session->userdata('login_uid');

		if(!empty($param))
		{
			if(!empty($param['kepala sekolah']))
			{
				$level_user = 'kepala sekolah';
				$id_user 	= $param['kepala sekolah'];
			}

			if(!empty($param['operator sekolah']))
			{
				$level_user = 'operator sekolah';
				$id_user 	= $param['operator sekolah'];
			}

			if(!empty($param['guru']))
			{
				$level_user = 'guru';
				$id_user 	= $param['guru'];
			}
		}

		if($level_user == 'kepala sekolah')
		{
			$this->db->where('user_kepala_sekolah.user_id', $id_user);
			$this->db->join('user_kepala_sekolah', 'user_kepala_sekolah.sekolah_id = profil_sekolah.sekolah_id');
		}
		elseif($level_user == 'operator sekolah')
		{
			$this->db->where('user_operator.user_id', $id_user);
			$this->db->join('user_operator', 'user_operator.sekolah_id = profil_sekolah.sekolah_id');
		}
		elseif($level_user == 'guru')
		{
			$this->db->where('user_guru.user_id', $id_user);
			$this->db->join('user_guru', 'user_guru.sekolah_id = profil_sekolah.sekolah_id');			
		}
		else
		{
			if(!empty($addon))
			{
				$result['']	= $addon;
			}
		}

		$this->db->order_by('nama');
		$this->db->from('profil_sekolah');
		$query = $this->db->get();

		foreach($query->result() as $key => $c)
		{
			$result[$c->sekolah_id] = $c->nama;
		}
		return $result;
	}	

	function insert_kepsek($param = array())
	{
		$this->db->insert('user_kepala_sekolah', $param);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function update_kepsek($param = array(), $sekolah_id)
	{
		$this->db->where('sekolah_id', $sekolah_id);
		$this->db->update('user_kepala_sekolah', $param);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}

	function update_user_kepsek($param = array(), $sekolah_id)
	{
		$sub_query = "
			(
				SELECT user_id
			 	FROM user_kepala_sekolah
			 	WHERE sekolah_id = '$sekolah_id'
			)
		";

		$this->db->where("user_id IN $sub_query");
		$this->db->update('user', $param);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}
}
