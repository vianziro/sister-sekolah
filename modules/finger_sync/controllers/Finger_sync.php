<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finger_sync extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('finger_sync_model');
		$this->load->model('verifikasi_absensi/verifikasi_absensi_model');
	}

	function index($sekolah_id = '')
	{
		$data_post = file_get_contents('php://input');
		
		$respon = array('status' => 'Gagal');
		if(!empty($data_post) && !empty($sekolah_id))
		{
			$data_post = json_decode($data_post);
			foreach($data_post as $key => $c)
			{
				if(empty($c->USERID))
				{
					continue;
				}

				$get_user = $this->finger_sync_model->get_user($c->USERID, $sekolah_id)->row();
				if(empty($get_user))
				{
					continue;
				}

				$get_tanggal = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $c->CHECKTIME)));

				if($c->CHECKTYPE == 'I')
				{
					// $get_telat = 0;
					// $get_sesi  = 0;
					// $get_jam   = 0;
					$verifikasi_telat 	= $this->verifikasi_absensi_model->verifikasi_jam_masuk($get_tanggal, $get_user->sekolah_id);
					$get_jam 			= @$verifikasi_telat['jam_id'];
					$get_sesi 			= @$verifikasi_telat['sesi_id'];
					$get_telat  		= @$verifikasi_telat['telat'];
					if($verifikasi_telat['status'] == 201)
					{
						continue;
					}
					elseif($verifikasi_telat['status'] == 199)
					{
						$param_telat = array(
							'user_id'	=> $get_user->user_id,
							'waktu'		=> $get_tanggal,
							'total'		=> $get_telat
						);
						$this->verifikasi_absensi_model->insert_telat($param_telat);	
					}
					else
					{
						$param_absensi = array(
							'user_id'		=> $get_user->user_id,
							'kelas_id'		=> $get_user->kelas_id,
							'jam_id'		=> $get_jam,
							'sesi_id'		=> $get_sesi,
							'status'		=> 'hadir',
							'waktu'			=> $get_tanggal,
							'telat'			=> $get_telat,
							'keterangan'	=> ''
						);
						if($this->verifikasi_absensi_model->check_absensi($param_absensi))
						{
							$this->verifikasi_absensi_model->insert_absensi($param_absensi);													
						}
					}
				}
				elseif($c->CHECKTYPE == 'O')
				{
					$param_absensi = array(
						'user_id'		=> $get_user->user_id,
						'kelas_id'		=> $get_user->kelas_id,
						'status'		=> 'pulang',
						'waktu'			=> $get_tanggal,
						'keterangan'	=> ''
					);
					if($this->verifikasi_absensi_model->check_absensi($param_absensi))
					{
						$this->verifikasi_absensi_model->insert_absensi($param_absensi);													
					}
				}
			}
			$respon = array('status' => 'Sukses');
		}

		echo json_encode($respon);

		$myfile = fopen("logs/" . date('Ymdhis') . ".txt", "w");
		fwrite($myfile, print_r($data_post, true));
		fclose($myfile);
	}
}