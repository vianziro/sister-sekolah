<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_guru extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->device_id 		= $this->input->post('device_id');
		if(empty($this->device_id))
		{
			$this->device_id = $this->input->get('device_id');
		}

		$this->load->model('login/login_model');
		$this->cek_device = $this->login_model->get_data_guru_device($this->device_id);
		if(empty($this->cek_device))
		{
			$respon = array(
				'status'	=> '201',
				'msg'		=> 'Gagal',
				'data'		=> 'Autentikasi Gagal.'
			);	
			echo json_encode($respon);
			exit;
		}

		$this->login_uid	= $this->cek_device->user_id;		
		$this->load->model('pengumuman_model');
		$this->load->model('manajemen_siswa/manajemen_siswa_model');
	}

	public function index()
	{
		$data_post = $this->input->post();
		$filter = array(
			// 'limit'		=> $limit,
			// 'offset'	=> $this->uri->segment($uri_segment),
			// 'keyword'	=> $param['keyword'],
			// 'sekolah'	=> $param['sekolah'],
			// 'kelas'		=> $param['kelas'],
			'guru'		=> $this->login_uid
		);

		$get_data = $this->pengumuman_model->get_data($filter)->result();
		pre($get_data);
		
	}

	public function submit($id = '')
	{
		$respon = array(
			'status'	=> '201',
			'msg'		=> 'Data gagal disimpan, silahkan ulangi lagi.',
			'data'		=> array()
		);	

		$data_post = $this->input->post();
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		if($this->form_validation->run() == false)
		{
			$respon = array(
				'status'	=> '201',
				'msg'		=> validation_errors(''),
				'data'		=> array(),
			);	
		}
		else
		{
			$list_kelas = json_decode($data_post['kelas']);		
			if(!empty($data_post['userfiles']))
			{
				$config['upload_path']      = './uploads/pengumuman/';
	            if (!is_dir($config['upload_path']))
	            {
	                mkdir($config['upload_path']);
	            }

				$file_name = $this->login_uid . date('YmdHis');
				$create_berkas = create_image($file_name, $data_post['userfiles'], $config['upload_path']);
				if(!empty($create_berkas))
				{
					$data_post['gambar'] = $config['upload_path'] . $file_name . '.jpg';
				}				
			}

			$data_post['user_id']	= $this->login_uid;
			$data_post['waktu']		= date('Y-m-d H:i:s');

			if(@$data_post['target_siswa'] == 'true') $data_post['target_siswa'] = 'Y';
			if(@$data_post['target_wali'] == 'true') $data_post['target_wali'] = 'Y';

			unset($data_post['kelas']);
			unset($data_post['device_id']);
			unset($data_post['userfiles']);

			if(empty($id))
			{
				$proses = $this->pengumuman_model->insert($data_post);
				if($proses)
				{
					$id = $this->db->insert_id();
					$respon = array(
						'status'	=> '200',
						'msg'		=> 'Data berhasil disimpan.',
						'data'		=> array()
					);	
				}
			}
			else
			{
				$proses = $this->pengumuman_model->update($data_post, $id);
				$respon = array(
					'status'	=> '200',
					'msg'		=> 'Data berhasil diperbaharui.',
					'data'		=> array()
				);	
			}

			if(!empty($id))
			{				
				$param_kelas 	= array();
				$param_user 	= array();
				$isi_notifikasi	= substr($data_post['judul'], 0, 250);

				foreach($list_kelas as $key => $c)
				{
					$param_kelas[]	= array(
						'pengumuman_id'	=> $id,
						'kelas_id'		=> $c->id
					);

					if($data_post['target_siswa'] == 'Y' || $data_post['target_wali'] == 'Y')
					{
						$filter = array('kelas' => $c->id); 
						$get_data_siswa = $this->manajemen_siswa_model->get_data($filter)->result();
						foreach($get_data_siswa as $kex => $x)
						{
							$param_user[] = array(
								'pengumuman_id'	=> $id,
								'user_id'		=> $x->user_id
							);

							if($data_post['target_siswa'] == 'Y')
							{
								if(!empty($x->fcm))
								{
									$this->fcm->insertNotifikasiUser($x->user_id, 'Pengumuman untuk Siswa', $isi_notifikasi, $x->fcm);
								}
							}

							if($data_post['target_wali'] == 'Y')
							{
								if(!empty($x->fcm_ortu))
								{
									$this->fcm->insertNotifikasiWali($x->user_id, 'Pengumuman untuk Wali Murid', $isi_notifikasi, $x->fcm_ortu);
								}
							}
						}				
					}
				}

				if(!empty($param_kelas))
				{
					$this->pengumuman_model->insert_kelas($param_kelas);
				}

				if(!empty($param_user))
				{
					$this->pengumuman_model->insert_user($param_user);
				}
			}
		}
		echo json_encode($respon);
		exit;
	}
}

?>